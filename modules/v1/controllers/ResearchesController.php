<?php

namespace app\modules\v1\controllers;

use app\models\entities\Research;

class ResearchesController extends BaseController
{
    public $modelClass = Research::class;
    public $defaultTypeDelete = 'hard';
}
