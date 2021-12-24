<?php

namespace app\modules\v1\controllers;

use app\components\JwtMethods;
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

      return $model->login();
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

      $token = JwtMethods::generateJwt($user);

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

 
}