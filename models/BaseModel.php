<?php

namespace app\models;

use app\interfaces\ModelInterface;

abstract class BaseModel extends \yii\db\ActiveRecord implements ModelInterface
{
    public function fields()
    {
        $attributes = $this->getAttributes();

        foreach($attributes as $attribute => $value) {
          $fields[$attribute] = $attribute;
        }
        
        $relations = $this->relationsName();

        foreach($relations as $relation => $value) {
          $fields[$relation] = $relation;
        }
        return $fields;
       
    }

    public function relationsName(): array
    {
      return [];
    }

    public function actionsAfterSave(): array
    {
        return [];
    }

    public function actionsAfterDelete(): array
    {
       return [];
    }

    public function actionsAfterUpdate(): array
    {
        return [];
    }
}