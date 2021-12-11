<?php

namespace app\modules\v1\controllers;

use app\models\Person;

class PeopleController extends BaseController
{
    public $modelClass = Person::class;
    public $defaultTypeDelete = 'hard';
}
