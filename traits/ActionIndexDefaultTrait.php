<?php

namespace app\traits;

use app\helpers\HelperExpandMethods;
use app\useCases\systemServices\GetObjectsService;

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
