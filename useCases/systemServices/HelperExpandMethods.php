<?php 

namespace app\useCases\systemServices;

use app\models\entities\interfaces\EntitiesInterface;
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
  
  public static function mergeObjectWithRelationsOnExpand(EntitiesInterface $model): array
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