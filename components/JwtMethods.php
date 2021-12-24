<?php 

namespace app\components;

use app\interfaces\ModelInterface;
use app\models\AuthUser;
use app\useCases\systemServices\GetObjectService;
use sizeg\jwt\Jwt;
use yii\web\BadRequestHttpException;

class JwtMethods {

    public static function getJwtToken(): array
    {
        $bearerToken = \Yii::$app->request->headers->get('authorization');

        $token = explode(" ", $bearerToken);

        return $token; 
    }

    public static function getAuthUserFromJwt(): ?ModelInterface
    {
        $token = static::getJwtToken();
        
        if (empty($token[1]) || $token[0] !== 'Bearer') {
          
            throw new BadRequestHttpException('Required Authentication');
        }
        
        $jwt = new Jwt;
        $parsed = $jwt->getParser()->parse((string) $token[1]);
        $id = $parsed->getClaim('uid');

        return GetObjectService::getObject('app\models\AuthUser', $id)->one();
    }

    public static function getCompanyIdFromJwt()
    {
        $authUser = static::getAuthUserFromJwt();

        if(empty($authUser) || empty($authUser->company_id)) {
          throw new BadRequestHttpException('Company not found');
        }

        return $authUser->company_id;
    } 

    public static function generateJwt(AuthUser $user)
    {
        $jwt = new \sizeg\jwt\Jwt;
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
    public static function generateRefreshToken(\app\models\AuthUser $user, \app\models\User $impersonator = null): \app\models\UserRefreshToken 
    {
      $refreshToken = \Yii::$app->security->generateRandomString(200);
      // TODO: Don't always regenerate - you could reuse existing one if user already has one with same IP and user agent
      $userRefreshToken = new \app\models\UserRefreshToken([
        'user_id' => (string) $user->id,
        'token' => $refreshToken,
        //'ip' => \Yii::$app->request->userIP,
        'ip' => '127.0.0.1',
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