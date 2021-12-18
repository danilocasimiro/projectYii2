<?php 

namespace app\interfaces;

use app\modules\v1\controllers\BaseController;
use SplObserver;

interface DoActionsInterface
{
  public function execute(?ModelInterface $model, BaseController $class): void;
  public function logObserverAlreadyAdd(SplObserver $observer): bool;
}