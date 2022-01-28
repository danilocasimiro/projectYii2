<?php 

namespace app\useCases\observers;

use app\models\entities\interfaces\EntitiesInterface;
use app\services\emailServices\EmailInterface;
use app\useCases\observers\interfaces\LogObserverInterface;
use SplObserver;
use SplSubject;
use Yii;

class SendEmailObserver implements SplObserver, LogObserverInterface 
{
    public $name = 'SendEmailObserver';
    

    public function update(SplSubject $subject, EntitiesInterface $model=null, $params=null): void
    {
        $emailService = Yii::createObject(EmailInterface::class);

        $emailService->sendEmail($model, $params->modelClass);
    }

    public function compareName(SplObserver $observer): bool
    {
        return $this->name === $observer->name;
    }
}