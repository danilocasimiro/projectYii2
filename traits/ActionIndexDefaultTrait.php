<?php

namespace app\traits;

use app\useCases\systemServices\GetObjectsService;
use app\useCases\systemServices\HelperExpandMethods;

trait ActionIndexDefaultTrait
{
  public function actionIndex(): array
  {
    $models = GetObjectsService::getObjects($this->modelClass)->all();

    if (empty($models)) {
      return [];
    }

    return HelperExpandMethods::mergeObjectsWithRelationsOnExpand($models);
  }
}
