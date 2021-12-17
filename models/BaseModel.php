<?php

namespace app\models;

abstract class BaseModel extends \yii\db\ActiveRecord{

    public function relations() 
    {
      return [];
    }

    public function fkAttribute() 
    {
      return '';
    }

    public function fields()
    {
        $attributes = $this->getAttributes();

        foreach($attributes as $attribute => $value) {
          $fields[$attribute] = $attribute;
        }
        
        $relations = $this->relations();

        foreach($relations as $relation => $value) {
          $fields[$relation] = $relation;
        }
        return $fields;
       
    }
}