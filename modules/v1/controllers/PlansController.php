<?php

namespace app\modules\v1\controllers;

use app\models\Plan;

class PlansController extends BaseController
{
    public $modelClass = Plan::class;
    public $defaultTypeDelete = 'soft';
}
