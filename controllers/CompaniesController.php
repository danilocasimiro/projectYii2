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
        $companies = null;
        
        if(isset(Yii::$app->request->post()['search']) && Yii::$app->request->post()['search'] === 'submit'){
            if(!empty(Yii::$app->request->post()['input'])){
                $companies = Company::find()->where(['LIKE', 'name', Yii::$app->request->post()['input']])->all();
            }else{
                $companies = Company::find()->all();
            }
            if($companies){
              //  Yii::$app->session->setFlash('success', "Busca realizada com sucesso!!!."); 
            }else{
              //  Yii::$app->session->setFlash('error', "Nada foi encontrado!!!."); 

            }
        }
       
        return $this->render('index', [
            'currentUser' => Yii::$app->user->identity,
            'companies' => $companies,
        ]);
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
