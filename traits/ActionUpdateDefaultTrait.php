<?php

namespace app\traits;

use app\models\entities\interfaces\EntitiesInterface;
use app\useCases\doActionsUseCases\AfterUpdateUseCase;
use app\useCases\systemServices\UpdateObjectService;
use Yii;

trait ActionUpdateDefaultTrait {
  
  public function actionUpdate(): EntitiesInterface
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