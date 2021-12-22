<?php

namespace app\modules\v1\controllers;

use app\models\SystemMessage;

class SystemMessagesController extends BaseController
{
    public $modelClass = SystemMessage::class;
    public $defaultTypeDelete = 'soft';
}
