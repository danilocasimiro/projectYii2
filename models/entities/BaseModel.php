<?php

namespace app\models\entities;

use app\models\entities\interfaces\EntitiesInterface;
use yii\db\ActiveRecord;

abstract class BaseModel extends \yii\db\ActiveRecord implements EntitiesInterface
{
    public function fields()
    {
        return ActiveRecord::fields();
       
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

    public static function relations(): array
    {
        return [];
    }

    public static function hasRelation(string $relation): bool
    {
        $relations = static::relations();

        return array_key_exists($relation, $relations);
    }

    public function fkAttribute(): string
    {
        return '';
    }
}