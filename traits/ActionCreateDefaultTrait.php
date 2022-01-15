<?php

namespace app\traits;

use app\interfaces\ModelInterface;
use app\useCases\doActionsUseCases\AfterCreateUseCase;
use app\useCases\systemServices\CreateObjectService;
use Yii;

trait ActionCreateDefaultTrait {
  
  public function actionCreate(): ModelInterface
  {
      $transaction = Yii::$app->db->beginTransaction();
      
      $model = CreateObjectService::createObject($this->modelClass, $this->bodyParams);

      $afterCreateUseCase = new AfterCreateUseCase();

      $afterCreateUseCase->execute($model, $this);

      $transaction->commit();

      return $model;
  }
}