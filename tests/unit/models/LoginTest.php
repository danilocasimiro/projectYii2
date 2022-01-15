<?php

namespace tests\unit\models;

use app\models\LoginForm;

class LoginTest extends \Codeception\Test\Unit
{
    public function testLogin()
    {
        $params = [
          'email' => 'admin@admin.com',
          'password' => '123456'
        ];

        $model = new LoginForm();
        $model->load($params, '');
        expect_that($currentUser = $model->login());
        static::assertTrue($currentUser);

       // expect_not(AuthUser::findIdentity(999));
    }
}
