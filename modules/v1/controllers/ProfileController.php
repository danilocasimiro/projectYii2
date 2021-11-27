<?php

namespace app\modules\v1\controllers;

use app\models\AuthUser;

class ProfileController extends BaseController
{
    public $enableCsrfValidation = false;
    
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
