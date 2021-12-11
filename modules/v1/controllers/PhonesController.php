<?php

namespace app\modules\v1\controllers;

use app\models\Phone;

class PhonesController extends BaseController
{
    public $modelClass = Phone::class;
    public $defaultTypeDelete = 'hard';
}
