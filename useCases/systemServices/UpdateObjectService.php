<?php

namespace app\useCases\systemServices;

use app\models\entities\interfaces\EntitiesInterface;
use yii\web\BadRequestHttpException;

class UpdateObjectService {

  public static function updateObject(EntitiesInterface $model, array $bodyParams): EntitiesInterface 
  {
    $model->load($bodyParams, '');

    if(!$model->save()) {
        throw new BadRequestHttpException(json_encode($model->getErrors()));
    };

    return $model;
  }
}