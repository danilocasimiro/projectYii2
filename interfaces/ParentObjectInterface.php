<?php 

namespace app\interfaces;

interface ParentObjectInterface
{
  public function fkAttribute(): string;
  public function relationsName(): array;
}