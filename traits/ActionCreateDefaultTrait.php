<?php

namespace app\traits;

use app\models\entities\interfaces\EntitiesInterface;
use app\useCases\doActionsUseCases\AfterCreateUseCase;
use app\useCases\systemServices\CreateObjectService;
use Yii;

trait ActionCreateDefaultTrait {
  
  public function actionCreate(): EntitiesInterface
  {
      $transaction = Yii::$app->db->beginTransaction();
      
      $model = CreateObjectService::createObject($this->modelClass, $this->bodyParams);

      $afterCreateUseCase = new AfterCreateUseCase();

      $afterCreateUseCase->execute($model, $this);

      $transaction->commit();

      return $model;
  }
}