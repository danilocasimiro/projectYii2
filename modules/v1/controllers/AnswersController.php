<?php

namespace app\modules\v1\controllers;

use app\models\entities\Answer;

class AnswersController extends BaseController
{    
    public $modelClass = Answer::class;
    public $defaultTypeDelete = 'hard';
}
