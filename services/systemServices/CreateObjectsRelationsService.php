<?php

namespace app\services\systemServices;

use Yii;
use yii\web\BadRequestHttpException;

class CreateObjectsRelationsService {

  public static function createObjectsRelations(Object $model, array $params): void
    {
        $relations = $model->relations();

        if(!empty($relations)) {
            $transaction = Yii::$app->db->beginTransaction();

            $fkAttribute = $model->fkAttribute(); 

            foreach($relations as $relation => $class) {
                
                if(!empty($params[$relation])) {

                    $modelRelation = new $class;

                    $modelRelation->load($params[$relation], '');
                   
                    $modelRelation->$fkAttribute = $model->id;

                    if(!$modelRelation->save()) {

                        $transaction->rollBack();

                        throw new BadRequestHttpException(json_encode($model->getErrors()));
                    }
                }
            }

            $transaction->commit();
        }
    }
}