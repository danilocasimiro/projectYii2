<?php

namespace app\controllers;

use Yii;
use app\models\AuthUser;
use app\models\Person;
use app\models\Phone;
use app\models\UserType;
use app\models\Address;
use app\models\AuthUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;

use yii\filters\AccessControl;
use yii\web\Response;

/**
 * AuthUsersController implements the CRUD actions for AuthUser model.
 */
class AuthUsersController extends Controller
{
    public $layout = 'sistema';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AuthUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthUser();
        $person = new Person();
        $phone = new Phone();
        $address = new Address();
      
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post()) && $phone->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
           
           $transaction = Yii::$app->db->beginTransaction();

           try  {
               if ($model->save()) {
                    $person->auth_user_id = $model->id;
                    $phone->auth_user_id = $model->id;
                    $address->auth_user_id = $model->id;
                    if($person->save() && $phone->save() && $address->save()){
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', "Usuário criado com sucesso!!!."); 

                    }else{
                        $transaction->rollBack();
                    }
                   return !Yii::$app->user->isGuest ? $this->redirect(['sistema/index']) : $this->redirect(['auth-users/login']);
               }
           } catch (Exception $e) {
               $transaction->rollBack();
           }

        }

        return $this->render('create', [
            'model' => $model,
            'person' => $person,
            'phone' => $phone,
            'address'=> $address,
            'currentUser' => Yii::$app->user->identity,
        ]);
        
    }

    /**
     * Updates an existing AuthUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = null)
    {

        $id = AuthUser::verifyAbility(Yii::$app->user, $id);
        
        $model = $this->findModel($id);
        $user = AuthUser::find()->where(['id' => $id])->one();

        $data = isset($model->person) ? $model->person : $model->company;

        if ($model->load(Yii::$app->request->post()) && $data->load(Yii::$app->request->post()) && $model->phone->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                if ($model->save() && $data->save() && $model->phone->save()) {
                    $transaction->commit();
                    return $this->redirect(['sistema/profile']);
                }else{
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        return $this->render('update', [
            'model' => $user,
            'person' => $user->person,
            'company' => $user->company,
            'phone' => $user->phone
        ]);
    }

    /**
     * Deletes an existing AuthUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id = null)
    {

        $user = AuthUser::findOne($id)->delete();

        if($user){
            Yii::$app->session->setFlash('success', "Usuário excluído com sucesso!!!."); 
            return (int)$id === Yii::$app->user->identity->id ? $this->redirect(['site/index']) : $this->redirect(['companies/index']);
        }else{
            Yii::$app->session->setFlash('error', "User not saved.");
            return $this->redirect(['sistema/index']);
        }
    }

    /**
     * Finds the AuthUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    
     /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', "Login realizado com sucesso!!!."); 

            return $this->redirect(['sistema/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

}
