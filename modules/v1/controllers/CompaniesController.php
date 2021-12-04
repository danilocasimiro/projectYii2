<?php

namespace app\modules\v1\controllers;

use app\models\AuthUser;
use app\models\Company;
use app\models\Phone;
use app\models\Address;
use Exception;
use Yii;

class CompaniesController extends BaseController
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $getParams = Yii::$app->request->get();

        if(!empty($getParams['search'])){
          
            return Company::find()->where(['LIKE', 'name', $getParams['search']])->all();
        }
        
        return Company::find()->all();
    }

    public function actionOptions()
    {
      return true;
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
      
           $transaction = Yii::$app->db->beginTransaction();

           try  {
               if ($model->save()) {
                    $company->auth_user_id = $model->id;
                    $phone->auth_user_id = $model->id;
                    $address->auth_user_id = $model->id;
                    if($company->save() && $phone->save() && $address->save()){
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', "Empresa criada com sucesso!!!."); 

                    }else{
                        $transaction->rollBack();
                        Yii::$app->session->setFlash('error', "Erro ao criar empresa!!!."); 

                    }
                    return $this->redirect(['companies/create']);
               }
           } catch (Exception $e) {
               $transaction->rollBack();
               Yii::$app->session->setFlash('error', "Erro ao criar empresa!!!."); 
               return $this->redirect(['companies/create']);
           }
        }

        return $this->render('create', [
            'currentUser' => Yii::$app->user->identity,
            'model' => $model,
            'company' => $company,
            'phone' => $phone,
            'address'=> $address
        ]);
        
    }

    public function actionUpdate()
    {
        $company = Company::findOne(1);

        if ($company->load(Yii::$app->request->post()) && $company->authUser->load(Yii::$app->request->post()) && $company->authUser->address->load(Yii::$app->request->post()) && $company->authUser->phone->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                if ($company->save() && $company->authUser->address->save() && $company->authUser->save() && $company->authUser->phone->save()) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', "Dados editados com sucesso!!!."); 

                    return $this->redirect(['companies/update']);
                }else{
                    Yii::$app->session->setFlash('error', "Erro ao editar dados!!!."); 

                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        return $this->render('update', [
            'model' => $company->authUser,
            'company' => $company,
            'phone' => $company->authUser->phone,
            'address'=> $company->authUser->address
        ]);
    }


}
