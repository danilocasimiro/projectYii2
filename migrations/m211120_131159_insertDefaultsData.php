<?php

use yii\db\Migration;

/**
 * Class m211120_131159_insertDefaultsData
 */
class m211120_131159_insertDefaultsData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       
        $auth_users = [
            ['id'=>'2a6571da26602a67be14ea8c5ab82349', 'email'=> 'admin@admin.com',                                  'password' => md5('123465'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '89defae676abd3e3a42b41df17c40096', 'company_id' => null],
            ['id'=>'35c8b9bbccd623ebcd584b236903cf65', 'email'=> 'administracao@gaelehenryfilmagensme.com.br',       'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '63373b41cf913e9f9b3226b4a0452737', 'company_id' => null],
            ['id'=>'1890e00d6ee44fd1d33b2fc643e2b7e8', 'email'=> 'maria@hotmail.com',                                'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'515f94fe65c3cc0f3bbe05ea6b34f219', 'email'=> 'financeiro@andersonebeneditajoalherialtda.com.br', 'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '63373b41cf913e9f9b3226b4a0452737', 'company_id' => null],
            ['id'=>'800c6ec313d47564f889c758a98f00d8', 'email'=> 'contato@sophieeyasminalimentosme.com.br',          'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '63373b41cf913e9f9b3226b4a0452737', 'company_id' => null],
        ];
       
        $company = [
            ['id'=>'bdf6e74bf877e731093ed2dbeb2979f0', 'auth_user_id'=> '35c8b9bbccd623ebcd584b236903cf65', 'name' =>'Gael e Henry filmagens',             'foundation' => '1998/12/05', 'cnpj' => '66.825.844/0001-80'],
            ['id'=>'c00e71d1594cf57a55b0d6a3416cf555', 'auth_user_id'=> '515f94fe65c3cc0f3bbe05ea6b34f219', 'name' =>'Anderson e Benedita Joalheria Ltda', 'foundation' => '2005/11/15', 'cnpj' => '11.741.679/0001-96'],
            ['id'=>'9b62efa1a31d51566996be1646445fb9', 'auth_user_id'=> '800c6ec313d47564f889c758a98f00d8', 'name' =>'Sophie e Yasmin Alimentos ME',       'foundation' => '2004/02/25', 'cnpj' => '67.032.758/0001-82'],
        ];
        
        $auth_user_company = [
            ['id'=>'1f9ea80fefc61f650067ec3f341ea227', 'email'=> 'gael@filmagens.com',       'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0'],
            ['id'=>'897236205e2d01f430ac8076f78abe1a', 'email'=> 'jose@filmagens.com',       'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0'],
            ['id'=>'f2e927e48d6833b5d392ba644f5a750b', 'email'=> 'maria@filmagens.com',      'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0'],
            ['id'=>'007e02ceaf6cfda74d5b7d231c915143', 'email'=> 'ana@filmagens.com',        'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0'],
            ['id'=>'c109bf5509d2887a880f5b7da4197d52', 'email'=> 'clodoaldo@filmagens.com',  'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'bdf6e74bf877e731093ed2dbeb2979f0'],
            
            ['id'=>'0b688ea8acead3de7106dd915e32ac37', 'email'=> 'augusto@joalheria.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555'],
            ['id'=>'a60d29b7e7b6665763a7fd10393e37ba', 'email'=> 'sophie@joalheria.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555'],
            ['id'=>'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'email'=> 'yasmin@joalheria.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555'],
            ['id'=>'cd51c1b996fce8efc404091db83e02af', 'email'=> 'helena@joalheria.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => 'c00e71d1594cf57a55b0d6a3416cf555'],

            ['id'=>'6d10e1f081a5621844916d361eb995c2', 'email'=> 'rodrigo@Alimentos.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'a60e888c42a57b615a48b3029b991231', 'email'=> 'josefa@Alimentos.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'2b2a8880fe12e93c751cc50fe0031868', 'email'=> 'pedro@Alimentos.com',      'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'d4f6064ff6ad6cafbad64d98cfee611e', 'email'=> 'claudio@Alimentos.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'623f5dd324577eb7b4df87f0d8ceffda', 'email'=> 'matheus@Alimentos.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'803db9ef98eb9a013f049cee16c31166', 'email'=> 'igor@Alimentos.com',       'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
            ['id'=>'9328874a0cac6034ad5608463c0cfac2', 'email'=> 'lara@Alimentos.com',       'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'company_id' => '9b62efa1a31d51566996be1646445fb9'],
        ];
       
        $common_users = [
            ['id'=>'0f75899958ce8c22144bec8f12761504', 'email'=> 'eliasbrandao@gmail.com',      'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'email'=> 'tania_rosangela@gmail.com',   'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'a9496cbef6cbcb20a6efc251f80469df', 'email'=> 'renata_dos_santos@gmail.com', 'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'9eb951b304769272bd87bb72e4c5cfd8', 'email'=> 'lavinia@gmail.com',           'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'599c011241c045b0b7e55dfe7d6693a8', 'email'=> 'brendamonique@gmail.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'32b269312326573ef3f2d7bf586a7bcf', 'email'=> 'alamandaesilva@gmail.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'c12e01f2a13ff5587e1e9e4aedb8242d', 'email'=> 'issaquiasmendonsa@gmail.com', 'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'b5241b4630506e90ecf9d060c28b92c3', 'email'=> 'barrosesilva@gmail.com',      'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'437b48cb25502822baa7e252ea1213c9', 'email'=> 'aparecidosantos@gmail.com',   'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'fd8fc985019572a9be30158853b82856', 'email'=> 'portomalu@gmail.com',         'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'551f18baed9001a464f5933b9b348046', 'email'=> 'dereckcantone@gmail.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'9a3ca8506b81873645a4d4435df393df', 'email'=> 'humbertosantos@gmail.com',    'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],
            ['id'=>'37ffdb2ade7430762ea471dc3ad6400a', 'email'=> 'avrilcampinas@gmail.com',     'password' => md5('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => '265c94f442d2d396f232d589da655532', 'company_id' => null],

        ];
       
        $people = [
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2a6571da26602a67be14ea8c5ab82349', 'name' =>'Admin Sistema',       'birthday' => '1981/10/10', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1890e00d6ee44fd1d33b2fc643e2b7e8', 'name' =>'Maria debei',         'birthday' => '1998/10/19', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1f9ea80fefc61f650067ec3f341ea227', 'name' =>'Gael Silva',          'birthday' => '2001/12/09', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '897236205e2d01f430ac8076f78abe1a', 'name' =>'Jose Maria',          'birthday' => '2002/04/30', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'f2e927e48d6833b5d392ba644f5a750b', 'name' =>'Maria Jose',          'birthday' => '2007/07/27', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '007e02ceaf6cfda74d5b7d231c915143', 'name' =>'Ana Silva',           'birthday' => '2008/06/02', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c109bf5509d2887a880f5b7da4197d52', 'name' =>'Clodoaldo Fagundes', 'birthday' => '1997/02/25', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0b688ea8acead3de7106dd915e32ac37', 'name' =>'Augusto gonçalves',  'birthday' => '1979/11/14', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60d29b7e7b6665763a7fd10393e37ba', 'name' =>'Sophie Lara',        'birthday' => '1982/06/30', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'name' =>'Yasmin Sophie',      'birthday' => '1994/10/21', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cd51c1b996fce8efc404091db83e02af', 'name' =>'Helena maria',       'birthday' => '1995/12/14', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '6d10e1f081a5621844916d361eb995c2', 'name' =>'Rodrigo Helena',     'birthday' => '1987/07/06', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60e888c42a57b615a48b3029b991231', 'name' =>'Josefa Rodrigo',     'birthday' => '1983/05/31', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2b2a8880fe12e93c751cc50fe0031868', 'name' =>'Pedro Josefa',       'birthday' => '2000/01/09', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'd4f6064ff6ad6cafbad64d98cfee611e', 'name' =>'Claudio Pedro',      'birthday' => '2005/03/02', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '623f5dd324577eb7b4df87f0d8ceffda', 'name' =>'Matheus Claudio',    'birthday' => '1998/04/17', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '803db9ef98eb9a013f049cee16c31166', 'name' =>'Igor Matheus',       'birthday' => '2003/09/19', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9328874a0cac6034ad5608463c0cfac2', 'name' =>'Lara Igor',          'birthday' => '2006/01/23', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0f75899958ce8c22144bec8f12761504', 'name' =>'Elias brandao',        'birthday' => '2001/01/25', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'name' =>'Tania rosangela',      'birthday' => '1998/06/19', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a9496cbef6cbcb20a6efc251f80469df', 'name' =>'Renata dos santos',    'birthday' => '1997/08/17', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9eb951b304769272bd87bb72e4c5cfd8', 'name' =>'Lavinia pereira',      'birthday' => '2002/10/26', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '599c011241c045b0b7e55dfe7d6693a8', 'name' =>'Brenda monique',       'birthday' => '2007/12/30', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '32b269312326573ef3f2d7bf586a7bcf', 'name' =>'Alameda Silva',        'birthday' => '1979/10/14', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c12e01f2a13ff5587e1e9e4aedb8242d', 'name' =>'Isaquias mendonsa',    'birthday' => '1989/03/11', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'b5241b4630506e90ecf9d060c28b92c3', 'name' =>'Barros silva',         'birthday' => '1983/04/22', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '437b48cb25502822baa7e252ea1213c9', 'name' =>'Aparecido dos santos', 'birthday' => '1969/07/31', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'fd8fc985019572a9be30158853b82856', 'name' =>'Malu porto',           'birthday' => '1999/06/19', 'genre' => 'F'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '551f18baed9001a464f5933b9b348046', 'name' =>'Dereck cantone',       'birthday' => '2001/01/02', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9a3ca8506b81873645a4d4435df393df', 'name' =>'Humberto santos',      'birthday' => '2007/02/08', 'genre' => 'M'],
            ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '37ffdb2ade7430762ea471dc3ad6400a', 'name' =>'Avril campinas',       'birthday' => '1979/12/09', 'genre' => 'F'],

        ];
        
        $phones = [
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2a6571da26602a67be14ea8c5ab82349', 'ddd' => '43', 'number' =>'991478547'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '35c8b9bbccd623ebcd584b236903cf65', 'ddd' => '43', 'number' =>'33258744'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1890e00d6ee44fd1d33b2fc643e2b7e8', 'ddd' => '43', 'number' =>'988751789'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '515f94fe65c3cc0f3bbe05ea6b34f219', 'ddd' => '43', 'number' =>'999587463'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '800c6ec313d47564f889c758a98f00d8', 'ddd' => '43', 'number' =>'991478547'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '1f9ea80fefc61f650067ec3f341ea227', 'ddd' => '43', 'number' =>'33258744'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '897236205e2d01f430ac8076f78abe1a', 'ddd' => '43', 'number' =>'33259876'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'f2e927e48d6833b5d392ba644f5a750b', 'ddd' => '43', 'number' =>'395879985'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '007e02ceaf6cfda74d5b7d231c915143', 'ddd' => '43', 'number' =>'991478547'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c109bf5509d2887a880f5b7da4197d52','ddd' => '43', 'number' =>'33258744'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0b688ea8acead3de7106dd915e32ac37','ddd' => '43', 'number' =>'32148957'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60d29b7e7b6665763a7fd10393e37ba','ddd' => '43', 'number' =>'32195789'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cb8a59b7de9ddfee17ddb6ae8b2110bd','ddd' => '43', 'number' =>'33258794'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'cd51c1b996fce8efc404091db83e02af','ddd' => '43', 'number' =>'994187526'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '6d10e1f081a5621844916d361eb995c2','ddd' => '43', 'number' =>'997510366'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a60e888c42a57b615a48b3029b991231','ddd' => '43', 'number' =>'984258964'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '2b2a8880fe12e93c751cc50fe0031868','ddd' => '43', 'number' =>'991487526'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'd4f6064ff6ad6cafbad64d98cfee611e','ddd' => '43', 'number' =>'995876235'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '623f5dd324577eb7b4df87f0d8ceffda','ddd' => '43', 'number' =>'984258794'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '803db9ef98eb9a013f049cee16c31166','ddd' => '43', 'number' =>'984752167'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9328874a0cac6034ad5608463c0cfac2','ddd' => '43', 'number' =>'999587156'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '0f75899958ce8c22144bec8f12761504','ddd' => '43', 'number' =>'33258144'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '7ac6ea2f50a9cdf3b5b3d0539d323b4c','ddd' => '43', 'number' =>'32569841'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'a9496cbef6cbcb20a6efc251f80469df','ddd' => '43', 'number' =>'99874125'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9eb951b304769272bd87bb72e4c5cfd8','ddd' => '43', 'number' =>'999587156'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '599c011241c045b0b7e55dfe7d6693a8','ddd' => '43', 'number' =>'996587412'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '32b269312326573ef3f2d7bf586a7bcf','ddd' => '43', 'number' =>'32326588'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'c12e01f2a13ff5587e1e9e4aedb8242d','ddd' => '43', 'number' =>'984215896'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'b5241b4630506e90ecf9d060c28b92c3','ddd' => '43', 'number' =>'99994578'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '437b48cb25502822baa7e252ea1213c9','ddd' => '43', 'number' =>'984258963'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> 'fd8fc985019572a9be30158853b82856','ddd' => '43', 'number' =>'33259865'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '551f18baed9001a464f5933b9b348046','ddd' => '43', 'number' =>'33333578'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '9a3ca8506b81873645a4d4435df393df','ddd' => '43', 'number' =>'991478787'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id'=> '37ffdb2ade7430762ea471dc3ad6400a','ddd' => '43', 'number' =>'33269854'],
        ];
        $addresses = [
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '2a6571da26602a67be14ea8c5ab82349', 'street' => 'Travessa Miranda e Castro',                 'number' => '487', 'district' => 'Santana',                    'city' => 'Porto Alegre', 'state' => 'RS', 'country' => 'BR', 'zipcode' => '90040-280'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '515f94fe65c3cc0f3bbe05ea6b34f219', 'street' => 'Rua Macavauba',                             'number' => '190', 'district' => 'Centro da Serra',            'city' => 'Serra',        'state' => 'ES', 'country' => 'BR', 'zipcode' => '29179-312'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '35c8b9bbccd623ebcd584b236903cf65', 'street' => 'Rua Ex-Combatente José Conceição da Silva', 'number' => '493', 'district' => 'Lagoa Azul',                 'city' => 'Natal',        'state' => 'RN', 'country' => 'BR', 'zipcode' => '59129-476'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '1890e00d6ee44fd1d33b2fc643e2b7e8', 'street' => 'Rua da Salina',                             'number' => '876', 'district' => 'Sacavém',                    'city' => 'São Luís',     'state' => 'MA', 'country' => 'BR', 'zipcode' => '65041-310'],

             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '800c6ec313d47564f889c758a98f00d8', 'street' => 'Travessa Severina Lima da Silva',           'number' => '405', 'district' => 'Planalto de Monteserra The', 'city' => 'Parnaíba',     'state' => 'PI', 'country' => 'BR', 'zipcode' => '64207-370'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '1f9ea80fefc61f650067ec3f341ea227', 'street' => 'Rua Ismael Pereira',                        'number' => '1125','district' => 'Jardim América',             'city' => 'Arapongas',    'state' => 'PP', 'country' => 'BR', 'zipcode' => '58749-328'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '897236205e2d01f430ac8076f78abe1a', 'street' => 'Rua Roberto Ribeiro',                       'number' => '56',  'district' => 'Jardim Apucarana',           'city' => 'Curitiba',     'state' => 'SE', 'country' => 'BR', 'zipcode' => '20158-874'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'f2e927e48d6833b5d392ba644f5a750b', 'street' => 'Avenida São Jorge',                         'number' => '198', 'district' => 'Setor Central',              'city' => 'Rondonópolis', 'state' => 'AM', 'country' => 'BR', 'zipcode' => '30265-541'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '007e02ceaf6cfda74d5b7d231c915143', 'street' => 'Rua Angelim',                               'number' => '670', 'district' => 'Cruzeiro (Icoaraci)',        'city' => 'Arapiraca',    'state' => 'ES', 'country' => 'BR', 'zipcode' => '25879-021'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'c109bf5509d2887a880f5b7da4197d52', 'street' => 'Praça Doutor Gilson Viana, s/n',           'number' => '328', 'district' => 'Jardim Interlagos',          'city' => 'Boa Vista',    'state' => 'PR', 'country' => 'BR', 'zipcode' => '15987-000'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '0b688ea8acead3de7106dd915e32ac37', 'street' => 'Rua Rei Márcio',                           'number' => '69',  'district' => 'Parque Estrela Dalva XVI',   'city' => 'Maricá',       'state' => 'TO', 'country' => 'BR', 'zipcode' => '11201-478'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a60d29b7e7b6665763a7fd10393e37ba', 'street' => 'Avenida Bahia',                            'number' => '1250','district' => 'Santos Dumont',              'city' => 'Cambé',        'state' => 'RR', 'country' => 'BR', 'zipcode' => '69874-156'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'cb8a59b7de9ddfee17ddb6ae8b2110bd', 'street' => 'Rua 7',                                    'number' => '10',  'district' => 'Nova Marabá',                'city' => 'Natal',        'state' => 'RN', 'country' => 'BR', 'zipcode' => '98745-312'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'cd51c1b996fce8efc404091db83e02af', 'street' => 'Rua Américo Brasiliense',                  'number' => '1987','district' => 'Jardins',                    'city' => 'Londrina',     'state' => 'SC', 'country' => 'BR', 'zipcode' => '32587-358'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '6d10e1f081a5621844916d361eb995c2', 'street' => 'Avenida Coremas',                          'number' => '547', 'district' => 'Boa Vista',                  'city' => 'Ibipora',      'state' => 'RO', 'country' => 'BR', 'zipcode' => '68741-897'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a60e888c42a57b615a48b3029b991231', 'street' => 'Rua Thomás Feltes Engel',                  'number' => '752', 'district' => 'Setor Res. Campos Elísios',  'city' => 'Ourinhos',     'state' => 'ES', 'country' => 'BR', 'zipcode' => '47895-220'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '2b2a8880fe12e93c751cc50fe0031868', 'street' => 'Rua Margarida',                            'number' => '357', 'district' => 'Jardim Caravelas',           'city' => 'Patos',        'state' => 'RS', 'country' => 'BR', 'zipcode' => '69872-377'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'd4f6064ff6ad6cafbad64d98cfee611e', 'street' => 'Rua Otávio Pitaluga',                      'number' => '196', 'district' => 'Quintas',                    'city' => 'Aracruz',      'state' => 'SP', 'country' => 'BR', 'zipcode' => '85103-897'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '623f5dd324577eb7b4df87f0d8ceffda', 'street' => 'Rua do Guarumbi',                          'number' => '174', 'district' => 'Jordanópolis',               'city' => 'Cacoal',       'state' => 'PI', 'country' => 'BR', 'zipcode' => '14758-025'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '803db9ef98eb9a013f049cee16c31166', 'street' => 'Rua Primeiro de Maio',                     'number' => '258', 'district' => 'Balneário Copacabana',       'city' => 'Saltinho',     'state' => 'TO', 'country' => 'BR', 'zipcode' => '35871-059'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9328874a0cac6034ad5608463c0cfac2', 'street' => 'Travessa Manoel Ferreira',                 'number' => '719', 'district' => 'Jardim Amanda II',           'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '01547-114'],
        
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '0f75899958ce8c22144bec8f12761504', 'street' => 'rua cafe caturra',             'number' => '12',  'district' => 'Ana terra',             'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '12587-021'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '7ac6ea2f50a9cdf3b5b3d0539d323b4c', 'street' => 'rua amado noivo',              'number' => '14',  'district' => 'Maravilha',             'city' => 'Prudentopolis','state' => 'PR', 'country' => 'BR', 'zipcode' => '25986-120'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'a9496cbef6cbcb20a6efc251f80469df', 'street' => 'avenida da liberdade',         'number' => '159', 'district' => 'Sao jorge',             'city' => 'Prudentopolis','state' => 'PI', 'country' => 'BR', 'zipcode' => '35124-259'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9eb951b304769272bd87bb72e4c5cfd8', 'street' => 'rua dois irmaos',              'number' => '248', 'district' => 'Maria cecilia',         'city' => 'Prudentopolis','state' => 'MA', 'country' => 'BR', 'zipcode' => '45896-350'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '599c011241c045b0b7e55dfe7d6693a8', 'street' => 'avenida faria lima',           'number' => '359', 'district' => 'Interlagos',            'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '57851-147'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '32b269312326573ef3f2d7bf586a7bcf', 'street' => 'alameda pe vermelho',          'number' => '277', 'district' => 'Tocantins',             'city' => 'Prudentopolis','state' => 'TO', 'country' => 'BR', 'zipcode' => '67895-568'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'c12e01f2a13ff5587e1e9e4aedb8242d', 'street' => 'rua das orquideas',            'number' => '369', 'district' => 'Parigot de souza',      'city' => 'Prudentopolis','state' => 'PP', 'country' => 'BR', 'zipcode' => '71230-445'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'b5241b4630506e90ecf9d060c28b92c3', 'street' => 'avenida pedro carrasco alduan','number' => '985', 'district' => 'Julio verner',          'city' => 'Prudentopolis','state' => 'AM', 'country' => 'BR', 'zipcode' => '81459-601'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '437b48cb25502822baa7e252ea1213c9', 'street' => 'rua dos eletricistas',         'number' => '997', 'district' => 'Abrataq',               'city' => 'Prudentopolis','state' => 'PR', 'country' => 'BR', 'zipcode' => '95623-009'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => 'fd8fc985019572a9be30158853b82856', 'street' => 'rua paulo gustavo',            'number' => '517', 'district' => 'Maria celina',          'city' => 'Prudentopolis','state' => 'AM', 'country' => 'BR', 'zipcode' => '09865-900'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '551f18baed9001a464f5933b9b348046', 'street' => 'avenida maringa',              'number' => '147', 'district' => 'Residencial do cafe',   'city' => 'Prudentopolis','state' => 'SC', 'country' => 'BR', 'zipcode' => '25623-789'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '9a3ca8506b81873645a4d4435df393df', 'street' => 'rua dos tucanos',              'number' => '69',  'district' => 'Parque das industrias', 'city' => 'Prudentopolis','state' => 'RO', 'country' => 'BR', 'zipcode' => '47910-987'],
             ['id'=>md5(uniqid(rand(), true)), 'auth_user_id' => '37ffdb2ade7430762ea471dc3ad6400a', 'street' => 'alameda faria lima',           'number' => '30',  'district' => 'Emirados arabes',       'city' => 'Prudentopolis','state' => 'RR', 'country' => 'BR', 'zipcode' => '68952-658'],

        ];

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users',  ['id', 'email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $auth_users)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('companies', ['id', 'auth_user_id', 'name', 'foundation', 'cnpj'], $company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['id', 'email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $auth_user_company)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('auth_users', ['id', 'email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $common_users)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('people', ['id', 'auth_user_id', 'name', 'birthday', 'genre'], $people)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('phones', ['id', 'auth_user_id', 'ddd', 'number'], $phones)
        ->execute();

        \Yii::$app->db
        ->createCommand()
        ->batchInsert('addresses', ['id', 'auth_user_id', 'street', 'number', 'district', 'city', 'state', 'country', 'zipcode'], $addresses)
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