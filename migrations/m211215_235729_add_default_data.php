<?php

use app\models\AuthUser;
use yii\db\Migration;

/**
 * Class m211215_235729_add_default_data
 */
class m211215_235729_add_default_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $system_messages_emails = [
            ['id'=>'a68f90e39b72bd6e5b792e6d46977eb2', 'subject'=> 'Cadastro no sistema', 'message' => 'Parabéns receiver_name, você acaba de se cadastrar no sistema com o email receiver_email !!!',                  'type' => 'email', 'friendly_id' => '1'],
            ['id'=>'c6a0f1a9b56c0b4c27043a63bf49d2d0', 'subject'=> 'Recuperar senha',     'message' => 'Olá receiver_name, clique no link a seguir para trocar a sua senha, lembrando que seu email é receiver_email.', 'type' => 'email', 'friendly_id' => '2'],
            ['id'=>'fc5aff6a21a1f68e61bca99d4064fcf0', 'subject'=> 'Exclusão da conta',   'message' => 'Olá receiver_name, sua conta com o email receiver_email foi excluida com sucesso!!!',                           'type' => 'email', 'friendly_id' => '3'],
            ['id'=>'0e74aee953f468530384b0764242733f', 'subject'=> 'Aniversário',         'message' => 'Pararabéns receiver_name, pelo seu aniversário!!!',                                                             'type' => 'email', 'friendly_id' => '4'],
        ];

        $system_messages_logs = [
            ['id'=>'85108729b0f7c0d050954a48552f7e96', 'subject'=> 'Info',       'message' => 'O usuário current_user_email realizou login no sistema.',                  'type' => 'log', 'friendly_id' => '5'],
            ['id'=>'6fef4fc93ad486f88a90318e1ae2be65', 'subject'=> 'Danger',     'message' => 'Ocorreu o seguinte erro. ',                                                'type' => 'log', 'friendly_id' => '6'],
            ['id'=>'378bf9cf1d7b56c52e2e484f69c209cd', 'subject'=> 'Warning',    'message' => 'O usuário current_user_email realizou a seguinte alteração no sistema.',   'type' => 'log', 'friendly_id' => '7'],
            ['id'=>'322c7a7c07295ca931dcbb2acd4cfec1', 'subject'=> 'Success',    'message' => 'O usuário current_user_email adicionou o seguinte item ao sistema.',       'type' => 'log', 'friendly_id' => '8'],
            ['id'=>'f2a4531dee2a1b4a92c2c145bbabe0a6', 'subject'=> 'Success',    'message' => 'O usuário current_user_email excluiu o seguinte item do sistema.',         'type' => 'log', 'friendly_id' => '9'],
            ['id'=>'6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'subject'=> 'Success',    'message' => 'Envio de email enviado com sucesso para receiver_email.',                  'type' => 'log', 'friendly_id' => '10'],
            ['id'=>'12e086066892a311b752673a28583d3f', 'subject'=> 'Danger',     'message' => 'Erro ao enviar email para receiver_email.',                                'type' => 'log', 'friendly_id' => '11'],

        ];

        $roles = [
            ['id'=>'b2ca678b4c936f905fb82f2733f5297f', 'name'=> 'admin',    'friendly_id' => '1'],
            ['id'=>'437599f1ea3514f8969f161a6606ce18', 'name'=> 'company',  'friendly_id' => '2'],
            ['id'=>'343b1c4a3ea721b2d640fc8700db0f36', 'name'=> 'employee', 'friendly_id' => '3'],
            ['id'=>'02a05c6e278d3e19afaca4f3f7cf47d9', 'name'=> 'user',     'friendly_id' => '4'],
        ];
       
        $auth_users = [
            ['id'=>'2a6571da26602a67be14ea8c5ab82349', 'email'=> 'admin@admin.com',                                  'role_id' => 'b2ca678b4c936f905fb82f2733f5297f', 'type' => 'Admin', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '1'],
            ['id'=>'35c8b9bbccd623ebcd584b236903cf65', 'email'=> 'administracao@gaelehenryfilmagensme.com.br',       'role_id' => '437599f1ea3514f8969f161a6606ce18', 'type' => 'Company', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '2'],
            ['id'=>'1890e00d6ee44fd1d33b2fc643e2b7e8', 'email'=> 'maria@hotmail.com',                                'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9', 'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '3'],
            ['id'=>'515f94fe65c3cc0f3bbe05ea6b34f219', 'email'=> 'financeiro@andersonebeneditajoalherialtda.com.br', 'role_id' => '437599f1ea3514f8969f161a6606ce18', 'type' => 'Company', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '4'],
            ['id'=>'800c6ec313d47564f889c758a98f00d8', 'email'=> 'contato@sophieeyasminalimentosme.com.br',          'role_id' => '437599f1ea3514f8969f161a6606ce18', 'type' => 'Company', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '5'],
        ];
       
        $company = [
            ['id'=>'bdf6e74bf877e731093ed2dbeb2979f0', 'auth_user_id'=> '35c8b9bbccd623ebcd584b236903cf65', 'name' =>'Gael e Henry filmagens',             'foundation' => '1998/12/05', 'cnpj' => '66.825.844/0001-80', 'friendly_id' => '1'],
            ['id'=>'c00e71d1594cf57a55b0d6a3416cf555', 'auth_user_id'=> '515f94fe65c3cc0f3bbe05ea6b34f219', 'name' =>'Anderson e Benedita Joalheria Ltda', 'foundation' => '2005/11/15', 'cnpj' => '11.741.679/0001-96', 'friendly_id' => '2'],
            ['id'=>'9b62efa1a31d51566996be1646445fb9', 'auth_user_id'=> '800c6ec313d47564f889c758a98f00d8', 'name' =>'Sophie e Yasmin Alimentos ME',       'foundation' => '2004/02/25', 'cnpj' => '67.032.758/0001-82', 'friendly_id' => '3'],
        ];
        
        $auth_user_company = [
            ['id'=>'1f9ea80fefc61f650067ec3f341ea227', 'email'=> 'gael@filmagens.com',       'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0', 'friendly_id' => '6'],
            ['id'=>'897236205e2d01f430ac8076f78abe1a', 'email'=> 'jose@filmagens.com',       'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0', 'friendly_id' => '7'],
            ['id'=>'f2e927e48d6833b5d392ba644f5a750b', 'email'=> 'maria@filmagens.com',      'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0', 'friendly_id' => '8'],
            ['id'=>'007e02ceaf6cfda74d5b7d231c915143', 'email'=> 'ana@filmagens.com',        'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0', 'friendly_id' => '9'],
            ['id'=>'c109bf5509d2887a880f5b7da4197d52', 'email'=> 'clodoaldo@filmagens.com',  'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0', 'friendly_id' => '10'],
            
            ['id'=>'0b688ea8acead3de7106dd915e32ac37', 'email'=> 'augusto@joalheria.com',    'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555', 'friendly_id' => '11'],
            ['id'=>'a60d29b7e7b6665763a7fd10393e37ba', 'email'=> 'sophie@joalheria.com',     'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555', 'friendly_id' => '12'],
            ['id'=>'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'email'=> 'yasmin@joalheria.com',     'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555', 'friendly_id' => '13'],
            ['id'=>'cd51c1b996fce8efc404091db83e02af', 'email'=> 'helena@joalheria.com',     'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555', 'friendly_id' => '14'],

            ['id'=>'6d10e1f081a5621844916d361eb995c2', 'email'=> 'rodrigo@Alimentos.com',    'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '15'],
            ['id'=>'a60e888c42a57b615a48b3029b991231', 'email'=> 'josefa@Alimentos.com',     'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '16'],
            ['id'=>'2b2a8880fe12e93c751cc50fe0031868', 'email'=> 'pedro@Alimentos.com',      'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '17'],
            ['id'=>'d4f6064ff6ad6cafbad64d98cfee611e', 'email'=> 'claudio@Alimentos.com',    'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '18'],
            ['id'=>'623f5dd324577eb7b4df87f0d8ceffda', 'email'=> 'matheus@Alimentos.com',    'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '19'],
            ['id'=>'803db9ef98eb9a013f049cee16c31166', 'email'=> 'igor@Alimentos.com',       'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '20'],
            ['id'=>'9328874a0cac6034ad5608463c0cfac2', 'email'=> 'lara@Alimentos.com',       'role_id' => '343b1c4a3ea721b2d640fc8700db0f36', 'type' => 'Employee', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => '9b62efa1a31d51566996be1646445fb9', 'friendly_id' => '21'],
        ];
       
        $common_users = [
            ['id'=>'0f75899958ce8c22144bec8f12761504', 'email'=> 'eliasbrandao@gmail.com',      'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '22'],
            ['id'=>'7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'email'=> 'tania_rosangela@gmail.com',   'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '23'],
            ['id'=>'a9496cbef6cbcb20a6efc251f80469df', 'email'=> 'renata_dos_santos@gmail.com', 'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '24'],
            ['id'=>'9eb951b304769272bd87bb72e4c5cfd8', 'email'=> 'lavinia@gmail.com',           'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '25'],
            ['id'=>'599c011241c045b0b7e55dfe7d6693a8', 'email'=> 'brendamonique@gmail.com',     'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '26'],
            ['id'=>'32b269312326573ef3f2d7bf586a7bcf', 'email'=> 'alamandaesilva@gmail.com',    'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '27'],
            ['id'=>'c12e01f2a13ff5587e1e9e4aedb8242d', 'email'=> 'issaquiasmendonsa@gmail.com', 'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '28'],
            ['id'=>'b5241b4630506e90ecf9d060c28b92c3', 'email'=> 'barrosesilva@gmail.com',      'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '29'],
            ['id'=>'437b48cb25502822baa7e252ea1213c9', 'email'=> 'aparecidosantos@gmail.com',   'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '30'],
            ['id'=>'fd8fc985019572a9be30158853b82856', 'email'=> 'portomalu@gmail.com',         'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '31'],
            ['id'=>'551f18baed9001a464f5933b9b348046', 'email'=> 'dereckcantone@gmail.com',     'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '32'],
            ['id'=>'9a3ca8506b81873645a4d4435df393df', 'email'=> 'humbertosantos@gmail.com',    'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '33'],
            ['id'=>'37ffdb2ade7430762ea471dc3ad6400a', 'email'=> 'avrilcampinas@gmail.com',     'role_id' => '02a05c6e278d3e19afaca4f3f7cf47d9',  'type' => 'User', 'password' => md5('123456'), 'photo' => null, 'auth_key' => \Yii::$app->security->generateRandomString(), 'access_token' => \Yii::$app->security->generateRandomString(), 'company_id' => null, 'friendly_id' => '34'],

        ];
       
        $people = [
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2a6571da26602a67be14ea8c5ab82349', 'name' =>'Admin Sistema',        'birthdate' => '1981/10/10', 'genre' => 'male',   'friendly_id' => '1'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1890e00d6ee44fd1d33b2fc643e2b7e8', 'name' =>'Maria debei',          'birthdate' => '1998/10/19', 'genre' => 'female', 'friendly_id' => '2'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1f9ea80fefc61f650067ec3f341ea227', 'name' =>'Gael Silva',           'birthdate' => '2001/12/09', 'genre' => 'male',   'friendly_id' => '3'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '897236205e2d01f430ac8076f78abe1a', 'name' =>'Jose Maria',           'birthdate' => '2002/04/30', 'genre' => 'male',   'friendly_id' => '4'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'f2e927e48d6833b5d392ba644f5a750b', 'name' =>'Maria Jose',           'birthdate' => '2007/07/27', 'genre' => 'female', 'friendly_id' => '5'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '007e02ceaf6cfda74d5b7d231c915143', 'name' =>'Ana Silva',            'birthdate' => '2008/06/02', 'genre' => 'female', 'friendly_id' => '6'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c109bf5509d2887a880f5b7da4197d52', 'name' =>'Clodoaldo Fagundes',   'birthdate' => '1997/02/25', 'genre' => 'male',   'friendly_id' => '7'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0b688ea8acead3de7106dd915e32ac37', 'name' =>'Augusto gonçalves',    'birthdate' => '1979/11/14', 'genre' => 'male',   'friendly_id' => '8'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60d29b7e7b6665763a7fd10393e37ba', 'name' =>'Sophie Lara',          'birthdate' => '1982/06/30', 'genre' => 'female', 'friendly_id' => '9'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'name' =>'Yasmin Sophie',        'birthdate' => '1994/10/21', 'genre' => 'female', 'friendly_id' => '10'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cd51c1b996fce8efc404091db83e02af', 'name' =>'Helena maria',         'birthdate' => '1995/12/14', 'genre' => 'female', 'friendly_id' => '11'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '6d10e1f081a5621844916d361eb995c2', 'name' =>'Rodrigo Helena',       'birthdate' => '1987/07/06', 'genre' => 'male',   'friendly_id' => '12'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60e888c42a57b615a48b3029b991231', 'name' =>'Josefa Rodrigo',       'birthdate' => '1983/05/31', 'genre' => 'female', 'friendly_id' => '13'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2b2a8880fe12e93c751cc50fe0031868', 'name' =>'Pedro Josefa',         'birthdate' => '2000/01/09', 'genre' => 'male',   'friendly_id' => '14'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'd4f6064ff6ad6cafbad64d98cfee611e', 'name' =>'Claudio Pedro',        'birthdate' => '2005/03/02', 'genre' => 'male',   'friendly_id' => '15'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '623f5dd324577eb7b4df87f0d8ceffda', 'name' =>'Matheus Claudio',      'birthdate' => '1998/04/17', 'genre' => 'male',   'friendly_id' => '16'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '803db9ef98eb9a013f049cee16c31166', 'name' =>'Igor Matheus',         'birthdate' => '2003/09/19', 'genre' => 'male',   'friendly_id' => '17'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9328874a0cac6034ad5608463c0cfac2', 'name' =>'Lara Igor',            'birthdate' => '2006/01/23', 'genre' => 'female', 'friendly_id' => '18'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0f75899958ce8c22144bec8f12761504', 'name' =>'Elias brandao',        'birthdate' => '2001/01/25', 'genre' => 'male',   'friendly_id' => '19'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'name' =>'Tania rosangela',      'birthdate' => '1998/06/19', 'genre' => 'female', 'friendly_id' => '20'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a9496cbef6cbcb20a6efc251f80469df', 'name' =>'Renata dos santos',    'birthdate' => '1997/08/17', 'genre' => 'female', 'friendly_id' => '21'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9eb951b304769272bd87bb72e4c5cfd8', 'name' =>'Lavinia pereira',      'birthdate' => '2002/10/26', 'genre' => 'female', 'friendly_id' => '22'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '599c011241c045b0b7e55dfe7d6693a8', 'name' =>'Brenda monique',       'birthdate' => '2007/12/30', 'genre' => 'female', 'friendly_id' => '23'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '32b269312326573ef3f2d7bf586a7bcf', 'name' =>'Alameda Silva',        'birthdate' => '1979/10/14', 'genre' => 'female', 'friendly_id' => '24'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c12e01f2a13ff5587e1e9e4aedb8242d', 'name' =>'Isaquias mendonsa',    'birthdate' => '1989/03/11', 'genre' => 'male',   'friendly_id' => '25'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'b5241b4630506e90ecf9d060c28b92c3', 'name' =>'Barros silva',         'birthdate' => '1983/04/22', 'genre' => 'male',   'friendly_id' => '26'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '437b48cb25502822baa7e252ea1213c9', 'name' =>'Aparecido dos santos', 'birthdate' => '1969/07/31', 'genre' => 'male',   'friendly_id' => '27'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'fd8fc985019572a9be30158853b82856', 'name' =>'Malu porto',           'birthdate' => '1999/06/19', 'genre' => 'female', 'friendly_id' => '28'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '551f18baed9001a464f5933b9b348046', 'name' =>'Dereck cantone',       'birthdate' => '2001/01/02', 'genre' => 'male',   'friendly_id' => '29'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9a3ca8506b81873645a4d4435df393df', 'name' =>'Humberto santos',      'birthdate' => '2007/02/08', 'genre' => 'male',   'friendly_id' => '30'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '37ffdb2ade7430762ea471dc3ad6400a', 'name' =>'Avril campinas',       'birthdate' => '1979/12/09', 'genre' => 'female', 'friendly_id' => '31'],

        ];
        
        $phones = [
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2a6571da26602a67be14ea8c5ab82349', 'ddd' => '43', 'number' =>'991478547', 'friendly_id' => '1'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '35c8b9bbccd623ebcd584b236903cf65', 'ddd' => '43', 'number' =>'33258744',  'friendly_id' => '2'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1890e00d6ee44fd1d33b2fc643e2b7e8', 'ddd' => '43', 'number' =>'988751789', 'friendly_id' => '3'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '515f94fe65c3cc0f3bbe05ea6b34f219', 'ddd' => '43', 'number' =>'999587463', 'friendly_id' => '4'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '800c6ec313d47564f889c758a98f00d8', 'ddd' => '43', 'number' =>'991478547', 'friendly_id' => '5'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1f9ea80fefc61f650067ec3f341ea227', 'ddd' => '43', 'number' =>'33258744',  'friendly_id' => '6'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '897236205e2d01f430ac8076f78abe1a', 'ddd' => '43', 'number' =>'33259876',  'friendly_id' => '7'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'f2e927e48d6833b5d392ba644f5a750b', 'ddd' => '43', 'number' =>'395879985', 'friendly_id' => '8'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '007e02ceaf6cfda74d5b7d231c915143', 'ddd' => '43', 'number' =>'991478547', 'friendly_id' => '9'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c109bf5509d2887a880f5b7da4197d52', 'ddd' => '43', 'number' =>'33258744',  'friendly_id' => '10'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0b688ea8acead3de7106dd915e32ac37', 'ddd' => '43', 'number' =>'32148957',  'friendly_id' => '11'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60d29b7e7b6665763a7fd10393e37ba', 'ddd' => '43', 'number' =>'32195789',  'friendly_id' => '12'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'ddd' => '43', 'number' =>'33258794',  'friendly_id' => '13'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cd51c1b996fce8efc404091db83e02af', 'ddd' => '43', 'number' =>'994187526', 'friendly_id' => '14'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '6d10e1f081a5621844916d361eb995c2', 'ddd' => '43', 'number' =>'997510366', 'friendly_id' => '15'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60e888c42a57b615a48b3029b991231', 'ddd' => '43', 'number' =>'984258964', 'friendly_id' => '16'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2b2a8880fe12e93c751cc50fe0031868', 'ddd' => '43', 'number' =>'991487526', 'friendly_id' => '17'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'd4f6064ff6ad6cafbad64d98cfee611e', 'ddd' => '43', 'number' =>'995876235', 'friendly_id' => '18'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '623f5dd324577eb7b4df87f0d8ceffda', 'ddd' => '43', 'number' =>'984258794', 'friendly_id' => '19'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '803db9ef98eb9a013f049cee16c31166', 'ddd' => '43', 'number' =>'984752167', 'friendly_id' => '20'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9328874a0cac6034ad5608463c0cfac2', 'ddd' => '43', 'number' =>'999587156', 'friendly_id' => '21'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0f75899958ce8c22144bec8f12761504', 'ddd' => '43', 'number' =>'33258144',  'friendly_id' => '22'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'ddd' => '43', 'number' =>'32569841',  'friendly_id' => '23'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a9496cbef6cbcb20a6efc251f80469df', 'ddd' => '43', 'number' =>'99874125',  'friendly_id' => '24'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9eb951b304769272bd87bb72e4c5cfd8', 'ddd' => '43', 'number' =>'999587156', 'friendly_id' => '25'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '599c011241c045b0b7e55dfe7d6693a8', 'ddd' => '43', 'number' =>'996587412', 'friendly_id' => '26'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '32b269312326573ef3f2d7bf586a7bcf', 'ddd' => '43', 'number' =>'32326588',  'friendly_id' => '27'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c12e01f2a13ff5587e1e9e4aedb8242d', 'ddd' => '43', 'number' =>'984215896', 'friendly_id' => '28'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'b5241b4630506e90ecf9d060c28b92c3', 'ddd' => '43', 'number' =>'99994578',  'friendly_id' => '29'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '437b48cb25502822baa7e252ea1213c9', 'ddd' => '43', 'number' =>'984258963', 'friendly_id' => '30'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'fd8fc985019572a9be30158853b82856', 'ddd' => '43', 'number' =>'33259865',  'friendly_id' => '31'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '551f18baed9001a464f5933b9b348046', 'ddd' => '43', 'number' =>'33333578',  'friendly_id' => '32'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9a3ca8506b81873645a4d4435df393df', 'ddd' => '43', 'number' =>'991478787', 'friendly_id' => '33'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '37ffdb2ade7430762ea471dc3ad6400a', 'ddd' => '43', 'number' =>'33269854',  'friendly_id' => '34'],
        ];
        $addresses = [
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '2a6571da26602a67be14ea8c5ab82349', 'street' => 'Travessa Miranda e Castro',                 'number' => '487', 'district' => 'Santana',                     'city' => 'Porto Alegre',    'state' => 'RS', 'country' => 'BR', 'zipcode' => '90040-280', 'friendly_id' => '1'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '515f94fe65c3cc0f3bbe05ea6b34f219', 'street' => 'Rua Macavauba',                             'number' => '190', 'district' => 'Centro da Serra',             'city' => 'Serra',           'state' => 'ES', 'country' => 'BR', 'zipcode' => '29179-312', 'friendly_id' => '2'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '35c8b9bbccd623ebcd584b236903cf65', 'street' => 'Rua Ex-Combatente José Conceição da Silva', 'number' => '493', 'district' => 'Lagoa Azul',                  'city' => 'Natal',           'state' => 'RN', 'country' => 'BR', 'zipcode' => '59129-476', 'friendly_id' => '3'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '1890e00d6ee44fd1d33b2fc643e2b7e8', 'street' => 'Rua da Salina',                             'number' => '876', 'district' => 'Sacavém',                     'city' => 'São Luís',        'state' => 'MA', 'country' => 'BR', 'zipcode' => '65041-310', 'friendly_id' => '4'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '800c6ec313d47564f889c758a98f00d8', 'street' => 'Travessa Severina Lima da Silva',           'number' => '405', 'district' => 'Planalto de Monteserra The',  'city' => 'Parnaíba',        'state' => 'PI', 'country' => 'BR', 'zipcode' => '64207-370', 'friendly_id' => '5'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '1f9ea80fefc61f650067ec3f341ea227', 'street' => 'Rua Ismael Pereira',                        'number' => '1125','district' => 'Jardim América',              'city' => 'Arapongas',       'state' => 'PP', 'country' => 'BR', 'zipcode' => '58749-328', 'friendly_id' => '6'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '897236205e2d01f430ac8076f78abe1a', 'street' => 'Rua Roberto Ribeiro',                       'number' => '56',  'district' => 'Jardim Apucarana',            'city' => 'Curitiba',        'state' => 'SE', 'country' => 'BR', 'zipcode' => '20158-874', 'friendly_id' => '7'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'f2e927e48d6833b5d392ba644f5a750b', 'street' => 'Avenida São Jorge',                         'number' => '198', 'district' => 'Setor Central',               'city' => 'Rondonópolis',    'state' => 'AM', 'country' => 'BR', 'zipcode' => '30265-541', 'friendly_id' => '8'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '007e02ceaf6cfda74d5b7d231c915143', 'street' => 'Rua Angelim',                               'number' => '670', 'district' => 'Cruzeiro (Icoaraci)',         'city' => 'Arapiraca',       'state' => 'ES', 'country' => 'BR', 'zipcode' => '25879-021', 'friendly_id' => '9'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'c109bf5509d2887a880f5b7da4197d52', 'street' => 'Praça Doutor Gilson Viana, s/n',            'number' => '328', 'district' => 'Jardim Interlagos',           'city' => 'Boa Vista',       'state' => 'PR', 'country' => 'BR', 'zipcode' => '15987-000', 'friendly_id' => '10'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '0b688ea8acead3de7106dd915e32ac37', 'street' => 'Rua Rei Márcio',                            'number' => '69',  'district' => 'Parque Estrela Dalva XVI',    'city' => 'Maricá',          'state' => 'TO', 'country' => 'BR', 'zipcode' => '11201-478', 'friendly_id' => '11'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a60d29b7e7b6665763a7fd10393e37ba', 'street' => 'Avenida Bahia',                             'number' => '1250','district' => 'Santos Dumont',               'city' => 'Cambé',           'state' => 'RR', 'country' => 'BR', 'zipcode' => '69874-156', 'friendly_id' => '12'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'street' => 'Rua 7',                                     'number' => '10',  'district' => 'Nova Marabá',                 'city' => 'Natal',           'state' => 'RN', 'country' => 'BR', 'zipcode' => '98745-312', 'friendly_id' => '13'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'cd51c1b996fce8efc404091db83e02af', 'street' => 'Rua Américo Brasiliense',                   'number' => '1987','district' => 'Jardins',                     'city' => 'Londrina',        'state' => 'SC', 'country' => 'BR', 'zipcode' => '32587-358', 'friendly_id' => '14'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '6d10e1f081a5621844916d361eb995c2', 'street' => 'Avenida Coremas',                           'number' => '547', 'district' => 'Boa Vista',                   'city' => 'Ibipora',         'state' => 'RO', 'country' => 'BR', 'zipcode' => '68741-897', 'friendly_id' => '15'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a60e888c42a57b615a48b3029b991231', 'street' => 'Rua Thomás Feltes Engel',                   'number' => '752', 'district' => 'Setor Res. Campos Elísios',   'city' => 'Ourinhos',        'state' => 'ES', 'country' => 'BR', 'zipcode' => '47895-220', 'friendly_id' => '16'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '2b2a8880fe12e93c751cc50fe0031868', 'street' => 'Rua Margarida',                             'number' => '357', 'district' => 'Jardim Caravelas',            'city' => 'Patos',           'state' => 'RS', 'country' => 'BR', 'zipcode' => '69872-377', 'friendly_id' => '17'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'd4f6064ff6ad6cafbad64d98cfee611e', 'street' => 'Rua Otávio Pitaluga',                       'number' => '196', 'district' => 'Quintas',                     'city' => 'Aracruz',         'state' => 'SP', 'country' => 'BR', 'zipcode' => '85103-897', 'friendly_id' => '18'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '623f5dd324577eb7b4df87f0d8ceffda', 'street' => 'Rua do Guarumbi',                           'number' => '174', 'district' => 'Jordanópolis',                'city' => 'Cacoal',          'state' => 'PI', 'country' => 'BR', 'zipcode' => '14758-025', 'friendly_id' => '19'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '803db9ef98eb9a013f049cee16c31166', 'street' => 'Rua Primeiro de Maio',                      'number' => '258', 'district' => 'Balneário Copacabana',        'city' => 'Saltinho',        'state' => 'TO', 'country' => 'BR', 'zipcode' => '35871-059', 'friendly_id' => '20'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9328874a0cac6034ad5608463c0cfac2', 'street' => 'Travessa Manoel Ferreira',                  'number' => '719', 'district' => 'Jardim Amanda II',            'city' => 'Prudentopolis',   'state' => 'SP', 'country' => 'BR', 'zipcode' => '01547-114', 'friendly_id' => '21'], 
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '0f75899958ce8c22144bec8f12761504', 'street' => 'rua cafe caturra',                          'number' => '12',  'district' => 'Ana terra',                   'city' => 'Prudentopolis',   'state' => 'SP', 'country' => 'BR', 'zipcode' => '12587-021', 'friendly_id' => '22'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'street' => 'rua amado noivo',                           'number' => '14',  'district' => 'Maravilha',                   'city' => 'Prudentopolis',   'state' => 'PR', 'country' => 'BR', 'zipcode' => '25986-120', 'friendly_id' => '23'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a9496cbef6cbcb20a6efc251f80469df', 'street' => 'avenida da liberdade',                      'number' => '159', 'district' => 'Sao jorge',                   'city' => 'Prudentopolis',   'state' => 'PI', 'country' => 'BR', 'zipcode' => '35124-259', 'friendly_id' => '24'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9eb951b304769272bd87bb72e4c5cfd8', 'street' => 'rua dois irmaos',                           'number' => '248', 'district' => 'Maria cecilia',               'city' => 'Prudentopolis',   'state' => 'MA', 'country' => 'BR', 'zipcode' => '45896-350', 'friendly_id' => '25'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '599c011241c045b0b7e55dfe7d6693a8', 'street' => 'avenida faria lima',                        'number' => '359', 'district' => 'Interlagos',                  'city' => 'Prudentopolis',   'state' => 'SP', 'country' => 'BR', 'zipcode' => '57851-147', 'friendly_id' => '26'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '32b269312326573ef3f2d7bf586a7bcf', 'street' => 'alameda pe vermelho',                       'number' => '277', 'district' => 'Tocantins',                   'city' => 'Prudentopolis',   'state' => 'TO', 'country' => 'BR', 'zipcode' => '67895-568', 'friendly_id' => '27'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'c12e01f2a13ff5587e1e9e4aedb8242d', 'street' => 'rua das orquideas',                         'number' => '369', 'district' => 'Parigot de souza',            'city' => 'Prudentopolis',   'state' => 'PP', 'country' => 'BR', 'zipcode' => '71230-445', 'friendly_id' => '28'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'b5241b4630506e90ecf9d060c28b92c3', 'street' => 'avenida pedro carrasco alduan',             'number' => '985', 'district' => 'Julio verner',                'city' => 'Prudentopolis',   'state' => 'AM', 'country' => 'BR', 'zipcode' => '81459-601', 'friendly_id' => '29'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '437b48cb25502822baa7e252ea1213c9', 'street' => 'rua dos eletricistas',                      'number' => '997', 'district' => 'Abrataq',                     'city' => 'Prudentopolis',   'state' => 'PR', 'country' => 'BR', 'zipcode' => '95623-009', 'friendly_id' => '30'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'fd8fc985019572a9be30158853b82856', 'street' => 'rua paulo gustavo',                         'number' => '517', 'district' => 'Maria celina',                'city' => 'Prudentopolis',   'state' => 'AM', 'country' => 'BR', 'zipcode' => '09865-900', 'friendly_id' => '31'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '551f18baed9001a464f5933b9b348046', 'street' => 'avenida maringa',                           'number' => '147', 'district' => 'Residencial do cafe',         'city' => 'Prudentopolis',   'state' => 'SC', 'country' => 'BR', 'zipcode' => '25623-789', 'friendly_id' => '32'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9a3ca8506b81873645a4d4435df393df', 'street' => 'rua dos tucanos',                           'number' => '69',  'district' => 'Parque das industrias',       'city' => 'Prudentopolis',   'state' => 'RO', 'country' => 'BR', 'zipcode' => '47910-987', 'friendly_id' => '33'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '37ffdb2ade7430762ea471dc3ad6400a', 'street' => 'alameda faria lima',                        'number' => '30',  'district' => 'Emirados arabes',             'city' => 'Prudentopolis',   'state' => 'RR', 'country' => 'BR', 'zipcode' => '68952-658', 'friendly_id' => '34'],

        ];

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('system_messages',  ['id', 'subject', 'message', 'type', 'friendly_id'], $system_messages_emails)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('system_messages',  ['id', 'subject', 'message', 'type', 'friendly_id'], $system_messages_logs)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('roles',  ['id', 'name', 'friendly_id'], $roles)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users',  ['id', 'email', 'role_id', 'type', 'password', 'photo', 'auth_key', 'access_token', 'company_id', 'friendly_id'], $auth_users)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('companies', ['id', 'auth_user_id', 'name', 'foundation', 'cnpj', 'friendly_id'], $company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['id', 'email', 'role_id', 'type', 'password', 'photo', 'auth_key', 'access_token', 'company_id', 'friendly_id'], $auth_user_company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['id', 'email', 'role_id', 'type', 'password', 'photo', 'auth_key', 'access_token', 'company_id', 'friendly_id'], $common_users)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('people', ['id', 'auth_user_id', 'name', 'birthdate', 'genre', 'friendly_id'], $people)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('phones', ['id', 'auth_user_id', 'ddd', 'number', 'friendly_id'], $phones)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('addresses', ['id', 'auth_user_id', 'street', 'number', 'district', 'city', 'state', 'country', 'zipcode', 'friendly_id'], $addresses)
        ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return true;
    }

   
}
