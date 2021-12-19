<?php

namespace app\services\systemServices;

use app\helpers\HelperExpandMethods;
use yii\db\ActiveQuery;
use yii\web\BadRequestHttpException;

class GetObjectService {

  public static function getObject(string $class, string $id): ActiveQuery
  {
    $query = $class::find()->where([$class::tableName().".id" => $id, $class::tableName().".deleted_at" => null]);

    HelperExpandMethods::getExpandQuerie($class, $query);

    return $query;
  }
}