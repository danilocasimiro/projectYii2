<?php

namespace app\modules\v1\controllers;

use app\models\Research;
use Yii;

class ResearchesController extends \yii\web\Controller
{
    public $layout = 'sistema';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

      /**
     * Finds the Research model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Research the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Research::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
