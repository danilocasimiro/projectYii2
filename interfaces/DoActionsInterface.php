<?php 

namespace app\interfaces;

use app\modules\v1\controllers\BaseController;
use SplObserver;

interface DoActionsInterface
{
  public function execute(?ModelInterface $model, BaseController $controllerParams): void;
  public function logObserverAlreadyAdd(SplObserver $observer): bool;
}