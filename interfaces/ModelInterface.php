<?php 

namespace app\interfaces;

interface ModelInterface
{
  public function actionsAfterSave(): array;
  public function actionsAfterDelete(): array;
  public function actionsAfterUpdate(): array;
  public static function relations(): array;
  public static function hasRelation(string $relation): bool;
  public function fkAttribute(): string;
}