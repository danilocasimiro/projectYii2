<?php

namespace app\services;

use Yii;
use yii\web\BadRequestHttpException;

class UpdateObjectService {

  public static function updateObject(string $class, string $id): object
  {
    $bodyParams = Yii::$app->request->getBodyParams();

    $model = $class::find()->where(['id' => $id])->one();

    if(empty($model)) {
        
        throw new BadRequestHttpException('Object '.ucfirst($class).' not found');
    }

    $model->load($bodyParams, '');

    if(!$model->save()) {
        throw new BadRequestHttpException(json_encode($model->getErrors()));
    };

   
    return $model;
  }
}