<?php 

namespace app\helpers;

use app\services\systemServices\GetObjectsService;
use Yii;

class HelperMethods {

  public static function incrementFriendlyId(string $class): int
  {
    $query = GetObjectsService::getObjects($class);
    
    $result = $query->max('friendly_id');

    if(!$result) {
      return 1;
    }

    return $result + 1;
  }
}