<?php

namespace app\modules\v1\controllers;

use app\models\entities\PlanItem;

class PlansItemsController extends BaseController
{
    public $modelClass = PlanItem::class;
    public $defaultTypeDelete = 'soft';
}
