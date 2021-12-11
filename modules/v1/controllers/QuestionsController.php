<?php

namespace app\modules\v1\controllers;

use app\models\Question;

class QuestionsController extends BaseController
{
    public $modelClass = Question::class;
    public $defaultTypeDelete = 'hard';
}
