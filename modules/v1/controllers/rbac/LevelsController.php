<?php

namespace app\modules\v1\controllers\rbac;

use app\models\rbac\Level;
use app\modules\v1\controllers\BaseController;

class LevelsController extends BaseController
{
    public $modelClass = Level::class;
	public $defaultTypeDelete = 'hard';

}
