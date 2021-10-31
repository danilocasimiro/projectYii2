<?php

namespace app\modules\v1\controllers;

use app\models\Question;
use Yii;

class QuestionsController extends \yii\web\Controller
{
    public $layout = 'sistema';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

      /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
