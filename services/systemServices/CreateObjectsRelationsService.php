<?php

namespace app\services\systemServices;

use app\interfaces\ModelInterface;
use Yii;
use yii\web\BadRequestHttpException;

class CreateObjectsRelationsService {

  public static function createObjectsRelations(ModelInterface $model, array $params): void
    {
        $relations = $model->relationsName();

        if(!empty($relations) && !empty($model->fkAttribute())) {
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