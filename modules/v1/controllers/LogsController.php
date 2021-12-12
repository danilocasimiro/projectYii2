<?php

namespace app\modules\v1\controllers;

use app\models\Log;

class LogsController extends BaseController
{
    public $modelClass = Log::class;
    public $defaultTypeDelete = 'soft';
}
