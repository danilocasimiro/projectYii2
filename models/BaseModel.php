<?php

namespace app\models;

class BaseModel extends \yii\db\ActiveRecord {

  public function relations() 
  {
    return [];
  }

  public function fkAttribute() 
  {
    return '';
  }
}