<?php

namespace app\modules\v1;

/**
 * api module definition class
 */
class V1Module extends \yii\base\Module
{
    /**
     * {@inheritDoc}
     */
    public $controllerNamespace = 'app\modules\v1\controllers';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        parent::init();

        // $this->modules = [
        //     'financials' => [
        //         'class' => \app\modules\v1\modules\financials\Module::class,
        //     ],
        // ];

        // custom initialization code goes here
    }
}