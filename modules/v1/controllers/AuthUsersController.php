<?php

namespace app\modules\v1\controllers;

use app\models\Address;
use app\models\AuthUser;
use app\models\Person;
use app\models\Phone;
use Yii;

class AuthUsersController extends BaseController
{
  public $enableCsrfValidation = false;
  /**
   * @inheritdoc
   */
  public function behaviors() {
    $behaviors = parent::behaviors();

    unset($behaviors['authenticator']);

    $behaviors['authenticator'] = [
      'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
      'except' => [
        'login',
        'refresh-token',
				'options',
				'create'
      ],
    ];

    return $behaviors;
	}

	public function actionIndex()
	{
		return AuthUser::find()->all();
	}

	public function actionOptions()
	{
		return true;
	}

	public function actionCreate() 
	{
		$params = Yii::$app->request->getBodyParams();
		$data = $params['data'];
		$model = new AuthUser;
		$person = new Person;
		$address = new Address;
		$phone = new Phone;
		$model->email = $data['email'];
		$model->password = $data['password'];
		$person->name = $data['name'];
		$person->birthday = $data['birthdate'];
		$person->genre = $data['genre'];
		$address->street = $data['address'];
		$address->number = $data['number'];
		$address->district = $data['district'];
		$address->city = $data['city'];
		$address->state = $data['state'];
		$address->country = $data['country'];
		$address->zipcode = $data['zip_code'];
		$phone->ddd = $data['ddd'];
		$phone->number = $data['phone_number'];
		
		if($model->save()) {
			$person->auth_user_id = $model->id;
			$address->auth_user_id = $model->id;
			$phone->auth_user_id = $model->id;

			if(!$person->save() || !$address->save() || !$phone->save()) {
				return [
					$person->getErrors(),
					$address->getErrors()
				];
			}

		} else {

			return $model->getErrors();
		}
		
		return $model;

	}

	public function actionDelete($id)
	{
		$authUser = AuthUser::findOne($id);
		$authUser->delete();
	}
}