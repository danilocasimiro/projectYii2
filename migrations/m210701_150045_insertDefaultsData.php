<?php

use yii\db\Migration;

/**
 * Class m210701_150045_insertDefaultsData
 */
class m210701_150045_insertDefaultsData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth_users = [
            ['email'=> 'admin@admin.com',                            'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 1, 'company_id' => null],
            ['email'=> 'administracao@gaelehenryfilmagensme.com.br', 'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 2, 'company_id' => null],
            ['email'=> 'maria@hotmail.com.com',                      'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
        ];

        $company = [
            ['auth_user_id'=> 2, 'name' =>'Gael e Henry filmagens', 'foundation' => '1998/12/05', 'cnpj' => '66.825.844/0001-80'],

        ];

        $auth_user_company = [
            ['email'=> 'gael@filmagens.com',                         'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
        ];

        $people = [
            ['auth_user_id'=> 1, 'name' =>'Admin Sistema',          'birthday' => '1981/04/10', 'sex' => 'M'],
            ['auth_user_id'=> 4, 'name' =>'Gael Silva',             'birthday' => '2001/01/09', 'sex' => 'M'],
            ['auth_user_id'=> 3, 'name' =>'Maria josé',             'birthday' => '2002/05/25', 'sex' => 'F'],
        ];

        $phones = [
            ['auth_user_id'=> 1, 'ddd' => '43', 'number' =>'991478547'],
            ['auth_user_id'=> 4,  'ddd' => '43', 'number' =>'33258744'],
            ['auth_user_id'=> 2, 'ddd' => '43', 'number' =>'988751789'],
            ['auth_user_id'=> 3, 'ddd' => '43', 'number' =>'999587463'],
        ];

        $addresses = [
            ['auth_user_id' => 1, 'street' => 'Travessa Miranda e Castro',                 'number' => '487', 'district' => 'Santana',         'city' => 'Porto Alegre', 'state' => 'RS', 'country' => 'BR', 'zipcode' => '90040-280'],
            ['auth_user_id' => 4, 'street' => 'Rua Macavauba',                             'number' => '190', 'district' => 'Centro da Serra', 'city' => 'Serra',        'state' => 'ES', 'country' => 'BR', 'zipcode' => '29179-312'],
            ['auth_user_id' => 2, 'street' => 'Rua Ex-Combatente José Conceição da Silva', 'number' => '493', 'district' => 'Lagoa Azul',      'city' => 'Natal',        'state' => 'RN', 'country' => 'BR', 'zipcode' => '59129-476'],
            ['auth_user_id' => 3, 'street' => 'Rua da Salina',                             'number' => '876', 'district' => 'Sacavém',         'city' => 'São Luís',     'state' => 'MA', 'country' => 'BR', 'zipcode' => '65041-310'],
        ];
        
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $auth_users)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('companies', ['auth_user_id', 'name', 'foundation', 'cnpj'], $company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $auth_user_company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('people', ['auth_user_id', 'name', 'birthday', 'sex'], $people)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('phones', ['auth_user_id', 'ddd', 'number'], $phones)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('addresses', ['auth_user_id', 'street', 'number', 'district', 'city', 'state', 'country', 'zipcode'], $addresses)
        ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210701_150045_insertDefaultsData cannot be reverted.\n";

        return false;
    }

   
}
