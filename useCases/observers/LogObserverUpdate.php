<?php 

namespace app\useCases\observers;

use app\models\entities\Log;
use app\useCases\observers\interfaces\LogObserverInterface;
use SplObserver;
use SplSubject;

class LogObserverUpdate implements SplObserver, LogObserverInterface 
{
    private $name = 'LogObserverUpdate';

    public function update(SplSubject $subject, $model=null, $changedAttributes=null, $params=null): void
    {
        Log::addLogUpdate($model, $params->modelClass, $changedAttributes);
    }

    public function compareName(SplObserver $observer): bool
    {
        return $this->name === $observer->name;
    }
}