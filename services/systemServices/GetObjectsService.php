<?php

namespace app\services\systemServices;

use Yii;
use yii\db\ActiveQuery;

class GetObjectsService {

  public static function getObjects(string $class): ActiveQuery
  {
    $query =  $class::find()->where(['deleted_at' => null]);
    static::getExtraQueries($class, $query);
    
    return $query;
  }

  private static function getExtraQueries($class, &$query)
  {
    $queryParams = Yii::$app->request->get();

    $model = new $class;

    $attributes = $model->getAttributes();

    if(!empty($queryParams)) {
      
      foreach($queryParams as $key => $value) {
        
        if(array_key_exists($key, $attributes)) {
          
          $query->where([
            'like', $key,  "%".$value."%", false
          ]);
        }
      }
    } 
  }
}