<?php

namespace app\modules\v1\controllers;

use app\models\{AuthUser, Log, Person};
use Yii;

class AuthenticateController extends BaseController
{
    public $modelClass = Person::class;

    /**
     * @inheritdoc
     */
    public function behaviors() {
      parent::behaviors();
      
      $behaviors['authenticator'] = [
          'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
          'except' => [
              'login',
              'refresh-token',
              'options'
          ],
      ];

      $behaviors['corsFilter'] = [
        'class' => \yii\filters\Cors::class,
        'cors' => [
            'Origin' => ['*'],
            'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Access-Control-Request-Headers' => ['*'],
            'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Access-Control-Allow-Credentials' => null,
            'Access-Control-Max-Age' => 86400,
            'Access-Control-Expose-Headers' => []
        ]
    ];

    return $behaviors;
  }

  public function actionLogin(): array
  {
    $model = new \app\models\LoginForm();
    $params = \Yii::$app->request->getBodyParams();
    $model->load($params, '');
    
    if ($model->login()) {
      $user = AuthUser::findByEmail($model->email);

      $token = $this->generateJwt($user);

      $this->generateRefreshToken($user);

      Log::addLogLogin($user, $this->modelClass);

      return [
        'user' => $user,
        'person' => $user->person,
        'token' => (string) $token,
        'message' => 'Logado com sucesso',
        'code' => '200'
      ];
    } else {

      $message = $model->getErrors();
      return [ 
        'user' => '',
        'token' => '',
        'message' => $message['password'],
        'code' => '400'
      ];
    }
  }

  public function actionRefreshToken(): array
  {
    $refreshToken = \Yii::$app->request->cookies->getValue('refresh-token', false);

    if (!$refreshToken) {
      
      return new \yii\web\UnauthorizedHttpException('No refresh token found.');
    }

    $userRefreshToken = \app\models\UserRefreshToken::findOne(['token' => $refreshToken]);

    if (\Yii::$app->request->getMethod() == 'POST') {
      // Getting new JWT after it has expired
      if (!$userRefreshToken) {
        return new \yii\web\UnauthorizedHttpException('The refresh token no longer exists.');
      }

      $user = \app\models\AuthUser::find()  //adapt this to your needs
        ->where(['id' => $userRefreshToken->id])
        ->one();

      $token = $this->generateJwt($user);

      return [
        'status' => 'ok',
        'token' => (string) $token,
      ];

    } elseif (\Yii::$app->request->getMethod() == 'DELETE') {
      // Logging out
      if ($userRefreshToken && !$userRefreshToken->delete()) {
        return new \yii\web\ServerErrorHttpException('Failed to delete the refresh token.');
      }

      return ['status' => 'ok'];
    } else {
      return new \yii\web\UnauthorizedHttpException('The user is inactive.');
    }
  }

  private function generateJwt(AuthUser $user)
  {
    $jwt = \Yii::$app->jwt;
    $signer = $jwt->getSigner('HS256');
    $key = $jwt->getKey();
    $time = time();

    $jwtParams = \Yii::$app->params['jwt'];

    return $jwt->getBuilder()
      ->issuedBy($jwtParams['issuer'])
      ->permittedFor($jwtParams['audience'])
      ->identifiedBy($jwtParams['id'], true)
      ->issuedAt($time)
      ->expiresAt($time + $jwtParams['expire'])
      ->withClaim('uid', $user->id)
      ->getToken($signer, $key);
  }
  

  /**
   * @throws yii\base\Exception
   */
  private function generateRefreshToken(\app\models\AuthUser $user, \app\models\User $impersonator = null): \app\models\UserRefreshToken 
  {
    $refreshToken = \Yii::$app->security->generateRandomString(200);
    // TODO: Don't always regenerate - you could reuse existing one if user already has one with same IP and user agent
    $userRefreshToken = new \app\models\UserRefreshToken([
      'user_id' => (string) $user->id,
      'token' => $refreshToken,
      'ip' => \Yii::$app->request->userIP,
      'user_agent' => \Yii::$app->request->userAgent,
      'created_at' => gmdate('Y-m-d H:i:s'),
    ]);
    if (!$userRefreshToken->save()) {
      throw new \yii\web\ServerErrorHttpException('Failed to save the refresh token: '. $userRefreshToken->getErrorSummary(true));
    }

    // Send the refresh-token to the user in a HttpOnly cookie that Javascript can never read and that's limited by path
    \Yii::$app->response->cookies->add(new \yii\web\Cookie([
      'name' => 'refresh-token',
      'value' => $refreshToken,
      'httpOnly' => true,
      'sameSite' => 'none',
      'secure' => true,
      'path' => '/v1/auth/refresh-token',  //endpoint URI for renewing the JWT token using this refresh-token, or deleting refresh-token
    ]));

    return $userRefreshToken;
  }

}