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
        $type = UserType::find()->where(['id' => 4])->one();
      
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post()) && $phone->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
           // return $this->redirect(['view', 'id' => $model->id]);
           
            if($model->save()){
                $user = AuthUser::find()->where(['email' => $model->email])->one();

                $person->auth_user_id = $user->id;
                $phone->auth_user_id = $user->id;
                $address->auth_user_id = $user->id;
                if($person->save() && $phone->save() && $address->save()){
                    return $this->redirect(['auth-users/login']);
                }else{
                    var_dump($person->getErrors());
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
            'person' => $person,
            'type' => $type,
            'phone' => $phone,
            'address'=> $address
        ]);
        
    }

    /**
     * Updates an existing AuthUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AuthUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
            //return $this->goBack();
            return $this->redirect(['sistema/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

}
