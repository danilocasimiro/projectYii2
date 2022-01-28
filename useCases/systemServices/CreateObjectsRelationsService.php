<?php

namespace app\useCases\systemServices;

use app\models\entities\interfaces\EntitiesInterface;
use Yii;
use yii\web\BadRequestHttpException;

class CreateObjectsRelationsService {

  public static function createObjectsRelations(EntitiesInterface $model, array $params): void
    {
        $relations = $model->relations();

        if(!empty($relations) && !empty($model->fkAttribute())) {
            $transaction = Yii::$app->db->beginTransaction();

            foreach($relations as $relation => $class) {

                if(!empty($params[$relation])) {
                    static::prepareObjectRelation($params[$relation], $class, $model); 
                }
            }

            $transaction->commit();
        }
    }

    private static function prepareObjectRelation(array $relationParams, string $class, EntitiesInterface $model): void
    {
        $arrayRelations = array_key_exists(0, $relationParams);

        if($arrayRelations) {
            foreach($relationParams as $relationParam) {
                static::saveObjectRelation($relationParam, $model, $class);
            }

            return;
        }

        static::saveObjectRelation($relationParams, $model, $class);
        
    }

    private static function saveObjectRelation(array $relationParams, EntitiesInterface $model, $class): void
    {
        $modelRelation = new $class;

        $fkAttribute = $model->fkAttribute(); 

        $modelRelation->load($relationParams, '');
        
        $modelRelation->$fkAttribute = $model->id;

        if(!$modelRelation->save()) {

            throw new BadRequestHttpException(json_encode($model->getErrors()));
        }

        static::createObjectsRelations($modelRelation, $relationParams);
    }
}