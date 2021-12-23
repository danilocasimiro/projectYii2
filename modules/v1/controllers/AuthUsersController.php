<?php

namespace app\modules\v1\controllers;

use app\models\AuthUser;

class AuthUsersController extends BaseController
{
	public $modelClass = AuthUser::class;
	public $defaultTypeDelete = 'soft';

	 /**
     * @inheritdoc
     */
    public function behaviors() {
			parent::behaviors();
			
			$behaviors['authenticator'] = [
					'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
					'except' => [
							'create',
							'options'
					],
			];
			$behaviors['corsFilter'] = [
				'class' => \yii\filters\Cors::class,
				'cors' => [
						'Origin' => ['*'],
						'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
						'Access-Control-Request-Headers' => ['*'],
						'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
						'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
						'Access-Control-Allow-Credentials' => null,
						'Access-Control-Max-Age' => 86400,
						'Access-Control-Expose-Headers' => []
				]
		];

		return $behaviors;
	}
}