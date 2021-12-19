<?php 

namespace app\helpers;

use app\interfaces\ModelInterface;
use Yii;

class HelperExpandMethods {

  public static function getExpandQuerie($class, &$query): void
  {
    $queryParams = Yii::$app->request->get();

    if(array_key_exists('expand', $queryParams)) {

      $relationsParent = explode(',', $queryParams['expand']);

      foreach($relationsParent as $relation) {
          
          if($class::hasRelation($relation)) {

              $query->joinWith($relation);
          };
      }
    }      
  }
  
  public static function mergeObjectWithRelationsOnExpand(ModelInterface $model): array
  {
      return array_merge((array) $model->getAttributes(), $model->getRelatedRecords());
  }

  public static function mergeObjectsWithRelationsOnExpand(array $models): array
  {
      foreach($models as $model) {
        $objects[] = static::mergeObjectWithRelationsOnExpand($model);
      }

      return $objects;
  }
}