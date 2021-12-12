<?php

namespace app\services\systemServices;

use app\components\JwtMethods;
use app\models\Log;
use yii\web\BadRequestHttpException;

class DeleteObjectService {

  public static function deleteObject(string $class, string $typeDelete, string $id): string
  {
      $model = $class::find()->where(['id' => $id])->one();

      if(empty($model)) {

        throw new BadRequestHttpException("Object ".$class." not found");
      }

      if($typeDelete === 'hard') {

        $result = $model->delete();

        $message = "Object ".$class." hard deleted successfully";

      } else {

        $model->deleted_at = date('Y-m-d H:m:s');

        $result = $model->save();

        $message = "Object ".$class." soft deleted successfully";
      } 

      if(!$result) {

        throw new BadRequestHttpException('Não foi possível realizar a exclusão!!!');
      }

      Log::addLogDelete($model, $class, $typeDelete);

      return $message;
  }

 
}