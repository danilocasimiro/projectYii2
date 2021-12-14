<?php 

namespace app\components;

use app\services\systemServices\GetObjectService;
use sizeg\jwt\Jwt;
use yii\web\BadRequestHttpException;

class JwtMethods {

  public static function getJwtToken(): array
  {
    $bearerToken = \Yii::$app->request->headers->get('authorization');

    $token = explode(" ", $bearerToken);
    return $token; 
  }

  public static function getAuthUserFromJwt(): object
  {
    $token = static::getJwtToken();
    
    if ($token[1] && $token[0] === 'Bearer') {
    
        $jwt = new Jwt;
        $parsed = $jwt->getParser()->parse((string) $token);
        $id = $parsed->getClaim('uid');

        return GetObjectService::getObject('app\models\AuthUser', $id);
    
      } else {
     
        throw new BadRequestHttpException('Required Authentication');

    }
  }

  public static function getCompanyIdFromJwt()
  {
      $authUser = static::getAuthUserFromJwt();

      if(!empty($authUser)) {
        throw new BadRequestHttpException('Company not found');
      }

      return $authUser->company_id;
  } 
}