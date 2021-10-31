<?php

namespace app\modules\v1\controllers;

use app\models\Answer;
use Yii;

class AnswersController extends \yii\web\Controller
{    
    public function actionIndex()
    {
        return $this->render('index');
    }

      /**
     * Finds the Answer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Answer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Answer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
