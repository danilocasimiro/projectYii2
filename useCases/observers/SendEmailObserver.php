<?php 

namespace app\useCases\observers;

use app\interfaces\LogObserverInterface;
use app\interfaces\ModelInterface;
use app\services\emailServices\EmailInterface;
use SplObserver;
use SplSubject;
use Yii;

class SendEmailObserver implements SplObserver, LogObserverInterface 
{
    public $name = 'SendEmailObserver';
    

    public function update(SplSubject $subject, ModelInterface $model=null, $params=null): void
    {
        $emailService = Yii::createObject(EmailInterface::class);

        $emailService->sendEmail($model, $params->modelClass);
    }

    public function compareName(SplObserver $observer): bool
    {
        return $this->name === $observer->name;
    }
}