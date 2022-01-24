<?php 

namespace app\models\entities\interfaces;

interface EntitiesInterface
{
  public function actionsAfterSave(): array;
  public function actionsAfterDelete(): array;
  public function actionsAfterUpdate(): array;
  public static function relations(): array;
  public static function hasRelation(string $relation): bool;
  public function fkAttribute(): string;
}