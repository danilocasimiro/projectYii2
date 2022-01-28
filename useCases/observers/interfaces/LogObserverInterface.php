<?php 

namespace app\useCases\observers\interfaces;

use SplObserver;

interface LogObserverInterface
{
  public function compareName(SplObserver $observer): bool;
}