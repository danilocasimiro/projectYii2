<?php

namespace app\traits;

use app\useCases\doActionsUseCases\AfterCreateUseCase;
use app\useCases\systemServices\CreateBatchObjectsService;
use Yii;

trait ActionCreateBatchDefaultTrait
{
  public function actionCreateBatch(): array
  {
    $transaction = Yii::$app->db->beginTransaction();

    $models = CreateBatchObjectsService::createBatchObjects($this->modelClass, $this->bodyParams);

    $afterCreateUseCase = new AfterCreateUseCase;

    foreach ($models as $model) {

      $afterCreateUseCase->execute($model, $this);
    }

    $transaction->commit();

    return $models;
  }
}
