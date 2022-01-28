<?php 

namespace app\components\jwt;

use app\models\entities\AuthUser;
use app\models\entities\interfaces\EntitiesInterface;
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

    public static function getAuthUserFromJwt(): ?EntitiesInterface
    {
        $token = static::getJwtToken();
        
        if (empty($token[1]) || $token[0] !== 'Bearer') {
          
            throw new BadRequestHttpException('Required Authentication');
        }
        
        $jwt = new Jwt;
        $parsed = $jwt->getParser()->parse((string) $token[1]);
        $id = $parsed->getClaim('uid');

        return GetObjectService::getObject(AuthUser::class, $id)->one();
    }

    public static function getCompanyIdFromJwt()
    {
        $authUser = static::getAuthUserFromJwt();

        if(empty($authUser) || empty($authUser->company_id)) {
          throw new BadRequestHttpException('Company not found');
        }

        return $authUser->company_id;
    } 
}