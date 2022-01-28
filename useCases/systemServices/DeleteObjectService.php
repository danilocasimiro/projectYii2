<?php

namespace app\useCases\systemServices;

use app\models\entities\interfaces\EntitiesInterface;
use yii\web\BadRequestHttpException;

class DeleteObjectService {

  public static function deleteObject(string $class, string $typeDelete, EntitiesInterface $model): string
  {
      if($typeDelete === 'soft') {

          return static::softDelete($model, $class);

      }

      return static::hardDelete($model, $class);

  }

  private static function hardDelete(EntitiesInterface $model, string $class): string
  {
      if(!$model->delete()) {
          throw new BadRequestHttpException('Não foi possível realizar a hard exclusão!!!');
      }

     return  "Object ".$model->id." hard deleted successfully";
  }

  private static function softDelete(EntitiesInterface $model, string $class): string
  {
      $model->deleted_at = date('Y-m-d H:m:s');

      if(!$model->save()){

        throw new BadRequestHttpException('Não foi possível realizar a soft exclusão!!!');
      }

      return "Object ".$model->id." soft deleted successfully";
  }
 
}