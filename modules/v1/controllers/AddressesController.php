<?php

namespace app\modules\v1\controllers;

use app\models\Address;
use app\models\AuthUser;
use Yii;

class AddressesController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $layout = 'sistema';
    
    public function actionIndex()
    {
        return Address::find()->all();
    }

    public function actionUpdate($id = null)
    {
        $id = AuthUser::verifyAbility(Yii::$app->user, $id);
        
        $model = $this->findModel($id);
        $user = AuthUser::find()->where(['id' => $id])->one();

        if ((int)$id === $model->id && $model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                if ($model->save()) {
                    $transaction->commit();
                    return $model;
                }else{
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            
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