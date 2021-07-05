<?php

namespace app\controllers;

use app\models\Type;
use Yii;

class TypesController extends \yii\web\Controller
{
    public $layout = 'sistema';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

      /**
     * Finds the Type model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Type the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Type::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
