<?php

namespace app\modules\v1\controllers;

use app\models\entities\Company;

class CompaniesController extends BaseController
{
    public $modelClass = Company::class;
    public $defaultTypeDelete = 'hard';
}
