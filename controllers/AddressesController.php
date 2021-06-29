<?php

namespace app\controllers;

use app\models\Address;
use app\models\AuthUser;
use Yii;

class AddressesController extends \yii\web\Controller
{
    public $layout = 'sistema';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate($id = null)
    {
        if($id != null && AuthUser::verifyAbility(Yii::$app->user->identity)){
            return $id;
        }else{
            $id = Yii::$app->user->identity->address->id;
        }
        
        $model = $this->findModel($id);
        $user = AuthUser::find()->where(['id' => $id])->one();

        if ((int)$id === $model->id && $model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['sistema/profile']);
        }

        return $this->render('update', [
            'model' => $user,
            'address' => $user->address,
        ]);
    }

      /**
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
