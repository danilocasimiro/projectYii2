<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\AuthUserLevel;
use app\modules\v1\controllers\BaseController;

class AuthUsersLevelsController extends BaseController
{
    public $modelClass = AuthUserLevel::class;
	public $defaultTypeDelete = 'hard';

}
