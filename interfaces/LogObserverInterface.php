<?php 

namespace app\interfaces;

use SplObserver;

interface LogObserverInterface
{
  public function compareName(SplObserver $observer): bool;
}