<?php

namespace app\services\systemServices;

use app\models\Log;
use Yii;
use yii\web\BadRequestHttpException;

class UpdateObjectService {

  public static function updateObject(string $class, string $id): object
  {
    $bodyParams = Yii::$app->request->getBodyParams();

    $model = $class::find()->where(['id' => $id, 'deleted_at' => null])->one();

    if(empty($model)) {
        
        throw new BadRequestHttpException('Object '.ucfirst($class).' not found');
    }
    $oldModel = $model->getAttributes();

    $model->load($bodyParams, '');

    if(!$model->save()) {
        throw new BadRequestHttpException(json_encode($model->getErrors()));
    };

    Log::addLogUpdate($oldModel, $class, $bodyParams);
    return $model;
  }
}