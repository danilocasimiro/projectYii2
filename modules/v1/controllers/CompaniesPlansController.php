<?php

namespace app\modules\v1\controllers;

use app\models\entities\CompanyPlan;

class CompaniesPlansController extends BaseController
{
    public $modelClass = CompanyPlan::class;
    public $defaultTypeDelete = 'soft';
}
