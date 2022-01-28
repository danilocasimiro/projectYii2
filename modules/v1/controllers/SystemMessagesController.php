<?php

namespace app\modules\v1\controllers;

use app\models\entities\SystemMessage;

class SystemMessagesController extends BaseController
{
    public $modelClass = SystemMessage::class;
    public $defaultTypeDelete = 'soft';
}
