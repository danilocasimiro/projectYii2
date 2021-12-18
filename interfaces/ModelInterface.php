<?php 

namespace app\interfaces;

interface ModelInterface
{
  public function actionsAfterSave(): array;
  public function actionsAfterDelete(): array;
  public function actionsAfterUpdate(): array;
}