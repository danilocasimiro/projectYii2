<?php

namespace app\useCases\doActionsUseCases;

use app\models\entities\interfaces\EntitiesInterface;
use app\modules\v1\controllers\BaseController;
use app\useCases\doActionsUseCases\interfaces\DoActionsInterface;
use SplObserver;
use SplSubject;
use yii\base\Model;

class AfterDeleteUseCase extends Model implements DoActionsInterface, SplSubject
{
    /**$var SplObserver[] */
    private $observers = [];

    public function execute(?EntitiesInterface $model, BaseController $params, string $typeDelete=null): void
    {
        $actions = $model->actionsAfterDelete();

        if(!empty($actions)) {

            foreach($actions as $action) {
                $this->attach(new $action);
            }

            $this->notify($model, $params, $typeDelete);
        }
    }

    public function attach(SplObserver $observer): void
    {
        if(!$this->logObserverAlreadyAdd($observer)) {
            $this->observers[] = $observer;
        }
    }


    public function notify(EntitiesInterface $model= null, $params= null, $typeDelete=null): void
    {
        foreach ($this->observers as $value) {
            $value->update($this, $model, $params, $typeDelete);
        }
    }

    public function detach(SplObserver $observer): void
    {

    }

    public function logObserverAlreadyAdd(SplObserver $observer): bool
    {
        foreach($this->observers as $observerObject) {
            
            if($observerObject->compareName($observer) === true) {
                return true;
            } 
        }

        return false;
    }
}