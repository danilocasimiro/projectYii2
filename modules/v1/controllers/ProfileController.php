<?php

namespace app\modules\v1\controllers;

use app\models\AuthUser;

class ProfileController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    
     /**
     * @inheritdoc
     */
    public function behaviors() {
      $behaviors = parent::behaviors();

      unset($behaviors['authenticator']);

      $behaviors['authenticator'] = [
        'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
        'except' => [
         'index',
         'view',
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
    public function actionView($id)
    {
      $user = AuthUser::findOne($id);
  
      return $user;
      
    }

    public function actionIndex()
    {
      echo 'dasdas';
    }

    public function actionOptions()
    {
      return true;
    }

}
