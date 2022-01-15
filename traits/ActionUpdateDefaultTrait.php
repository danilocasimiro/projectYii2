<?php

namespace app\traits;

use app\interfaces\ModelInterface;
use app\useCases\doActionsUseCases\AfterUpdateUseCase;
use app\useCases\systemServices\UpdateObjectService;
use Yii;

trait ActionUpdateDefaultTrait {
  
  public function actionUpdate(): ModelInterface
  {        
      $oldModelAttributes = $this->getObject->getAttributes();

      $transaction = Yii::$app->db->beginTransaction();

      $model = UpdateObjectService::updateObject($this->getObject, $this->bodyParams);

      $afterUpdateUseCase = new AfterUpdateUseCase();

      $afterUpdateUseCase->execute($model, $this, $oldModelAttributes);

      $transaction->commit();

      return $model;
  }
}