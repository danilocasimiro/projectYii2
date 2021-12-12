<?php 

namespace app\components;

use app\models\AuthUser;
use app\services\systemServices\GetObjectService;
use sizeg\jwt\Jwt;
use yii\web\BadRequestHttpException;

class JwtMethods {

  public static function getJwtToken(): string
  {
    $bearerToken = \Yii::$app->request->headers->get('authorization');

    $token = explode(" ", $bearerToken);
    return $token[1]; 
  }

  public static function getAuthUserFromJwt(): object
  {
    $token = static::getJwtToken();
    
    if ($token) {
    
        $jwt = new Jwt;
        $parsed = $jwt->getParser()->parse((string) $token);
        $id = $parsed->getClaim('uid');

        return GetObjectService::getObject('app\models\AuthUser', $id);
    
      } else {
     
        throw new BadRequestHttpException('Required Authentication');

    }
  }
}