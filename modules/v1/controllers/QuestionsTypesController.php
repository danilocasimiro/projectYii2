<?php

namespace app\modules\v1\controllers;

use app\models\QuestionType;

class QuestionsTypesController extends BaseController
{
    public $modelClass = QuestionType::class;
    public $defaultTypeDelete = 'hard';
}
