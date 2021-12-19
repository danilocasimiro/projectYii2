<?php

namespace app\modules\v1\controllers;

use app\models\CompanyPlan;

class CompaniesPlansController extends BaseController
{
    public $modelClass = CompanyPlan::class;
    public $defaultTypeDelete = 'soft';
}
