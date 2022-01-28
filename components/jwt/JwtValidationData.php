<?php

namespace app\components\jwt;

use sizeg\jwt\JwtValidationData as jwtValidate;

class JwtValidationData extends jwtValidate
{
    /**
     * @inheritdoc
     */
    public function init() {
		$jwtParams = \Yii::$app->params['jwt'];
		$this->validationData->setIssuer($jwtParams['issuer']);
		$this->validationData->setAudience($jwtParams['audience']);
		$this->validationData->setId($jwtParams['id']);

		parent::init();
	}
}  