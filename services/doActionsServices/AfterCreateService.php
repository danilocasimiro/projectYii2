<?php

namespace app\services\doActionsServices;

use app\interfaces\{DoActionsInterface, ModelInterface};
use app\modules\v1\controllers\BaseController;
use SplObserver;
use SplSubject;
use yii\base\Model;

class AfterCreateService extends Model implements DoActionsInterface, SplSubject
{
    /**$var SplObserver[] */
    private $observers = [];

    public function execute(?ModelInterface $model, BaseController $params): void
    {
        $actions = $model->actionsAfterSave();

        if(!empty($actions)) {

            foreach($actions as $action) {
                $this->attach(new $action);
            }

            $this->notify($model, $params);
        }
    }

    public function attach(SplObserver $observer): void
    {
        if(!$this->logObserverAlreadyAdd($observer)) {
            $this->observers[] = $observer;
        }
    }

    public function notify(ModelInterface $model= null, $params= null): void
    {
        foreach ($this->observers as $value) {
            $value->update($this, $model, $params);
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