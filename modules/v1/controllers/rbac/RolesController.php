<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\Role;
use app\modules\v1\controllers\BaseController;

class RolesController extends BaseController
{
    public $modelClass = Role::class;
	public $defaultTypeDelete = 'hard';


}
