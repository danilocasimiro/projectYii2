<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\Permission;
use app\modules\v1\controllers\BaseController;

class PermissionsController extends BaseController
{
    public $modelClass = Permission::class;
	public $defaultTypeDelete = 'hard';

}
