<?php 

namespace app\useCases\observers;

use app\models\entities\Log;
use app\useCases\observers\interfaces\LogObserverInterface;
use SplObserver;
use SplSubject;

class  LogObserverDelete implements SplObserver, LogObserverInterface
{
    private $name = 'LogObserverDelete';

    public function update(SplSubject $subject, $model=null, $params=null, $typeDelete=null): void
    {
        Log::addLogDelete($model, $params->modelClass, $typeDelete);   
    }

    public function compareName(SplObserver $observer): bool
    {
        return $this->name === $observer->name;
    }
}