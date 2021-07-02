<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AuthUser;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * AuthUsersController implements the CRUD actions for AuthUser model.
 */
class SistemaController extends Controller
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
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
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
        $model = AuthUser::findOne(Yii::$app->user->identity->id);
        return $this->render('index', [
            'currentUser' => Yii::$app->user->identity,
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        $post = Yii::$app->getRequest()->post();
        $id = Yii::$app->request->get('id') !== null ? Yii::$app->request->get('id') : Yii::$app->user->identity->id;
        
        $model = AuthUser::find()->where(['id' => $id])->one();
 
        if($model->load($post) && $model->validate()){
            $model->fotoCliente = UploadedFile::getInstance($model, 'fotoCliente');
            if($model->fotoCliente === null) return $this->render('profile', ['model'=>$model]);
            $model->photo = $model->fotoCliente->name;
            $model->save();
            
            $uploadPath = Yii::getAlias('@webroot/files');
            $model->fotoCliente->saveAs($uploadPath . '/' . $model->fotoCliente->name);
        }
        return $this->render('profile', [ 
            'model'=>$model->isPerson(),
            'currentUser'=> Yii::$app->user->identity,
        ]);
    }


    /**
     * Displays a single AuthUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   
}
