<?php 

namespace app\useCases\observers;

use app\models\entities\Log;
use app\useCases\observers\interfaces\LogObserverInterface;
use SplObserver;
use SplSubject;

class LogObserverCreate implements SplObserver, LogObserverInterface 
{
    private $name = 'LogObserverCreate';

    public function update(SplSubject $subject, $model=null, $params=null): void
    {
        Log::addLogCreate($model, $params->modelClass);
    }

    public function compareName(SplObserver $observer): bool
    {
        return $this->name === $observer->name;
    }
}