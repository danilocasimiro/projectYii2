<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\Authorization;
use app\modules\v1\controllers\BaseController;

class AuthorizationsController extends BaseController
{    
    public $modelClass = Authorization::class;
    public $defaultTypeDelete = 'hard';
}
