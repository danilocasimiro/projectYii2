<?php

namespace app\modules\v1\controllers;

use app\models\AuthUser;

class AuthUsersController extends BaseController
{
	public $modelClass = AuthUser::class;
	public $defaultTypeDelete = 'hard';

	 /**
     * @inheritdoc
     */
    public function behaviors() {
			parent::behaviors();
			
			$behaviors['authenticator'] = [
					'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
					'except' => [
							'create'
					],
			];

		return $behaviors;
	}
}