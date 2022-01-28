<?php

namespace app\useCases\systemServices;

use Yii;
use yii\db\ActiveQuery;

class GetObjectsService
{

  public static function getObjects(string $class): ActiveQuery
  {
    $query =  $class::find()->where([$class::tableName() . ".deleted_at" => null]);

    HelperExpandMethods::getExpandQuerie($class, $query);

    static::getExtraQueries($query);

    return $query;
  }

  private static function getExtraQueries($query)
  {
    $queryParams = Yii::$app->request->get();

    if (!empty($queryParams)) {

      $query = static::queryFilter($queryParams, $query);

      $query = static::queryFilterLike($queryParams, $query);

      return $query;
    }
  }

  private static function queryFilter($queryParams, $query)
  {
    if (!empty($queryParams['filter'])) {

      $filter = $queryParams['filter'];

      foreach ($filter as $key => $value) {

        $query->andWhere([$key =>  $value]);
      }
    }

    return $query;
  }

  private static function queryFilterLike($queryParams, $query)
  {
    if (!empty($queryParams['filterLike'])) {

      $filter = $queryParams['filterLike'];

      foreach ($filter as $key => $value) {

        $query->andWhere(['like', $key,  "%" . $value . "%", false]);
      }
    }

    return $query;
  }
}
