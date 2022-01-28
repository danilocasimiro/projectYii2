<?php

namespace app\modules\v1\controllers;

use app\models\entities\UserQuestionAnswer;

class UsersQuestionsAnswersController extends BaseController
{
    public $modelClass = UserQuestionAnswer::class;
    public $defaultTypeDelete = 'hard';

}
