<?php 

namespace app\useCases\doActionsUseCases\interfaces;

use app\models\entities\interfaces\EntitiesInterface;
use app\modules\v1\controllers\BaseController;
use SplObserver;

interface DoActionsInterface
{
  public function execute(?EntitiesInterface $model, BaseController $controllerParams): void;
  public function logObserverAlreadyAdd(SplObserver $observer): bool;
}