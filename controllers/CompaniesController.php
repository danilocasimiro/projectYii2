<?php

namespace app\controllers;

use app\models\AuthUser;
use app\models\Company;
use app\models\Phone;
use app\models\Address;
use app\models\UserType;
use Yii;

class CompaniesController extends \yii\web\Controller
{
    public $layout = 'sistema';

    public function actionIndex()
    {
        return $this->render('index');
    }

     /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthUser();
        $company = new Company();
        $phone = new Phone();
        $address = new Address();
      
        if ($model->load(Yii::$app->request->post()) && $company->load(Yii::$app->request->post()) && $phone->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
           // return $this->redirect(['view', 'id' => $model->id]);
           
            if($model->save()){
                $user = AuthUser::find()->where(['email' => $model->email])->one();

                $company->auth_user_id = $user->id;
                $phone->auth_user_id = $user->id;
                $address->auth_user_id = $user->id;
                if($company->save() && $phone->save() && $address->save()){
                    return $this->redirect(['companies/create']);
                }else{
                    var_dump($company->getErrors());
                    var_dump($phone->getErrors());
                    var_dump($address->getErrors());
                exit;
                }
            }else{
                var_dump($model->getErrors());
                exit;
            }
        }

        return $this->render('create', [
            'model' => $model,
            'company' => $company,
            'phone' => $phone,
            'address'=> $address
        ]);
        
    }


}
