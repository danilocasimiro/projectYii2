<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\RolePermission;
use app\modules\v1\controllers\BaseController;

class RolesPermissionsController extends BaseController
{
    public $modelClass = RolePermission::class;
	public $defaultTypeDelete = 'hard';


}
