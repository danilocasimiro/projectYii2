<?php

namespace app\traits;

use app\useCases\doActionsUseCases\AfterDeleteUseCase;
use app\useCases\systemServices\DeleteObjectService;
use Yii;

trait ActionDeleteDefaultTrait
{

  public function actionDelete(): string
  {
    $transaction = Yii::$app->db->beginTransaction();

    $typeDelete = !empty($this->bodyParams['typeDelete']) ? $this->bodyParams['typeDelete'] : $this->defaultTypeDelete;

    $afterDeleteUseCase = new AfterDeleteUseCase();

    $afterDeleteUseCase->execute($this->getObject, $this, $typeDelete);

    $response = DeleteObjectService::deleteObject($this->modelClass, $typeDelete, $this->getObject);

    if ($response) {
      $transaction->commit();

      return $response;
    }
  }
}
