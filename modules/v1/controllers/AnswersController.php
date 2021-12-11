<?php

namespace app\modules\v1\controllers;

use app\models\Answer;

class AnswersController extends BaseController
{    
    public $modelClass = Answer::class;
    public $defaultTypeDelete = 'hard';
}
