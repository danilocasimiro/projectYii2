<?php

namespace app\useCases\systemServices;

use app\helpers\HelperExpandMethods;
use yii\db\ActiveQuery;

class GetObjectsService {

  public static function getObjects(string $class): ActiveQuery
  {
    $query =  $class::find()->where([$class::tableName().".deleted_at" => null]);

    HelperExpandMethods::getExpandQuerie($class, $query);
    
    return $query;
  }
}