<?php

namespace app\modules\v1\controllers;

use app\models\Company;
use Yii;

class EmployeesController extends \yii\web\Controller
{
    public $layout = 'sistema';

    public function actionIndex($id)
    {
       
        $company = Company::findOne($id);
  
        return $this->render('index', [
            'currentUser' => Yii::$app->user->identity,
            'company'=> $company,
        ]);
    }

}
