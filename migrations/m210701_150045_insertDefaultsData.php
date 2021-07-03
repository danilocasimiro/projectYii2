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
            ['email'=> 'admin@admin.com',                                  'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 1, 'company_id' => null],
            ['email'=> 'administracao@gaelehenryfilmagensme.com.br',       'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 2, 'company_id' => null],
            ['email'=> 'maria@hotmail.com',                                'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'financeiro@andersonebeneditajoalherialtda.com.br', 'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 2, 'company_id' => null],
            ['email'=> 'contato@sophieeyasminalimentosme.com.br',          'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 2, 'company_id' => null],
        ];

        $company = [
            ['auth_user_id'=> 2, 'name' =>'Gael e Henry filmagens',             'foundation' => '1998/12/05', 'cnpj' => '66.825.844/0001-80'],
            ['auth_user_id'=> 4, 'name' =>'Anderson e Benedita Joalheria Ltda', 'foundation' => '2005/11/15', 'cnpj' => '11.741.679/0001-96'],
            ['auth_user_id'=> 5, 'name' =>'Sophie e Yasmin Alimentos ME',       'foundation' => '2004/02/25', 'cnpj' => '67.032.758/0001-82'],
        ];

        $auth_user_company = [
            ['email'=> 'gael@filmagens.com',       'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
            ['email'=> 'jose@filmagens.com',       'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
            ['email'=> 'maria@filmagens.com',      'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
            ['email'=> 'ana@filmagens.com',        'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
            ['email'=> 'clodoaldo@filmagens.com',  'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 1],
            
            ['email'=> 'augusto@joalheria.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 2],
            ['email'=> 'sophie@joalheria.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 2],
            ['email'=> 'yasmin@joalheria.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 2],
            ['email'=> 'helena@joalheria.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 2],

            ['email'=> 'rodrigo@Alimentos.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'josefa@Alimentos.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'pedro@Alimentos.com',      'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'claudio@Alimentos.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'matheus@Alimentos.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'igor@Alimentos.com',       'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
            ['email'=> 'lara@Alimentos.com',       'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 3, 'company_id' => 3],
        ];

        $common_users = [
            ['email'=> 'eliasbrandao@gmail.com',      'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'tania_rosangela@gmail.com',   'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'renata_dos_santos@gmail.com', 'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'lavinia@gmail.com',           'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'brendamonique@gmail.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'alamandaesilva@gmail.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'issaquiasmendonsa@gmail.com', 'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'barrosesilva@gmail.com',      'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'aparecidosantos@gmail.com',   'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'portomalu@gmail.com',         'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'dereckcantone@gmail.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'humbertosantos@gmail.com',    'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],
            ['email'=> 'avrilcampinas@gmail.com',     'password' => sha1('123456'), 'photo' => null, 'authKey' => \Yii::$app->security->generateRandomString(), 'acessToken' => \Yii::$app->security->generateRandomString(), 'user_type_id' => 4, 'company_id' => null],

        ];

        $people = [
            ['auth_user_id'=> 1, 'name' =>'Admin Sistema',       'birthday' => '1981/10/10', 'sex' => 'M'],
            ['auth_user_id'=> 3, 'name' =>'Maria debei',         'birthday' => '1998/10/19', 'sex' => 'F'],
            ['auth_user_id'=> 6, 'name' =>'Gael Silva',          'birthday' => '2001/12/09', 'sex' => 'M'],
            ['auth_user_id'=> 7, 'name' =>'Jose Maria',          'birthday' => '2002/04/30', 'sex' => 'M'],
            ['auth_user_id'=> 8, 'name' =>'Maria Jose',          'birthday' => '2007/07/27', 'sex' => 'F'],
            ['auth_user_id'=> 9, 'name' =>'Ana Silva',           'birthday' => '2008/06/02', 'sex' => 'F'],
            ['auth_user_id'=> 10, 'name' =>'Clodoaldo Fagundes', 'birthday' => '1997/02/25', 'sex' => 'M'],
            ['auth_user_id'=> 11, 'name' =>'Augusto gonçalves',  'birthday' => '1979/11/14', 'sex' => 'M'],
            ['auth_user_id'=> 12, 'name' =>'Sophie Lara',        'birthday' => '1982/06/30', 'sex' => 'F'],
            ['auth_user_id'=> 13, 'name' =>'Yasmin Sophie',      'birthday' => '1994/10/21', 'sex' => 'F'],
            ['auth_user_id'=> 14, 'name' =>'Helena maria',       'birthday' => '1995/12/14', 'sex' => 'F'],
            ['auth_user_id'=> 15, 'name' =>'Rodrigo Helena',     'birthday' => '1987/07/06', 'sex' => 'M'],
            ['auth_user_id'=> 16, 'name' =>'Josefa Rodrigo',     'birthday' => '1983/05/31', 'sex' => 'F'],
            ['auth_user_id'=> 17, 'name' =>'Pedro Josefa',       'birthday' => '2000/01/09', 'sex' => 'M'],
            ['auth_user_id'=> 18, 'name' =>'Claudio Pedro',      'birthday' => '2005/03/02', 'sex' => 'M'],
            ['auth_user_id'=> 19, 'name' =>'Matheus Claudio',    'birthday' => '1998/04/17', 'sex' => 'M'],
            ['auth_user_id'=> 20, 'name' =>'Igor Matheus',       'birthday' => '2003/09/19', 'sex' => 'M'],
            ['auth_user_id'=> 21, 'name' =>'Lara Igor',          'birthday' => '2006/01/23', 'sex' => 'F'],
            ['auth_user_id'=> 22, 'name' =>'Elias brandao',        'birthday' => '2001/01/25', 'sex' => 'M'],
            ['auth_user_id'=> 23, 'name' =>'Tania rosangela',      'birthday' => '1998/06/19', 'sex' => 'F'],
            ['auth_user_id'=> 24, 'name' =>'Renata dos santos',    'birthday' => '1997/08/17', 'sex' => 'F'],
            ['auth_user_id'=> 25, 'name' =>'Lavinia pereira',      'birthday' => '2002/10/26', 'sex' => 'F'],
            ['auth_user_id'=> 26, 'name' =>'Brenda monique',       'birthday' => '2007/12/30', 'sex' => 'F'],
            ['auth_user_id'=> 27, 'name' =>'Alameda Silva',        'birthday' => '1979/10/14', 'sex' => 'F'],
            ['auth_user_id'=> 28, 'name' =>'Isaquias mendonsa',    'birthday' => '1989/03/11', 'sex' => 'M'],
            ['auth_user_id'=> 29, 'name' =>'Barros silva',         'birthday' => '1983/04/22', 'sex' => 'M'],
            ['auth_user_id'=> 30, 'name' =>'Aparecido dos santos', 'birthday' => '1969/07/31', 'sex' => 'M'],
            ['auth_user_id'=> 31, 'name' =>'Malu porto',           'birthday' => '1999/06/19', 'sex' => 'F'],
            ['auth_user_id'=> 32, 'name' =>'Dereck cantone',       'birthday' => '2001/01/02', 'sex' => 'M'],
            ['auth_user_id'=> 33, 'name' =>'Humberto santos',      'birthday' => '2007/02/08', 'sex' => 'M'],
            ['auth_user_id'=> 34, 'name' =>'Avril campinas',       'birthday' => '1979/12/09', 'sex' => 'F'],

        ];

        $phones = [
            ['auth_user_id'=> 1, 'ddd' => '43', 'number' =>'991478547'],
            ['auth_user_id'=> 2, 'ddd' => '43', 'number' =>'33258744'],
            ['auth_user_id'=> 3, 'ddd' => '43', 'number' =>'988751789'],
            ['auth_user_id'=> 4, 'ddd' => '43', 'number' =>'999587463'],
            ['auth_user_id'=> 5, 'ddd' => '43', 'number' =>'991478547'],
            ['auth_user_id'=> 6, 'ddd' => '43', 'number' =>'33258744'],
            ['auth_user_id'=> 7, 'ddd' => '43', 'number' =>'33259876'],
            ['auth_user_id'=> 8, 'ddd' => '43', 'number' =>'395879985'],
            ['auth_user_id'=> 9, 'ddd' => '43', 'number' =>'991478547'],
            ['auth_user_id'=> 10,'ddd' => '43', 'number' =>'33258744'],
            ['auth_user_id'=> 11,'ddd' => '43', 'number' =>'32148957'],
            ['auth_user_id'=> 12,'ddd' => '43', 'number' =>'32195789'],
            ['auth_user_id'=> 13,'ddd' => '43', 'number' =>'33258794'],
            ['auth_user_id'=> 14,'ddd' => '43', 'number' =>'994187526'],
            ['auth_user_id'=> 15,'ddd' => '43', 'number' =>'997510366'],
            ['auth_user_id'=> 16,'ddd' => '43', 'number' =>'984258964'],
            ['auth_user_id'=> 17,'ddd' => '43', 'number' =>'991487526'],
            ['auth_user_id'=> 18,'ddd' => '43', 'number' =>'995876235'],
            ['auth_user_id'=> 19,'ddd' => '43', 'number' =>'984258794'],
            ['auth_user_id'=> 20,'ddd' => '43', 'number' =>'984752167'],
            ['auth_user_id'=> 21,'ddd' => '43', 'number' =>'999587156'],
            ['auth_user_id'=> 22,'ddd' => '43', 'number' =>'33258144'],
            ['auth_user_id'=> 23,'ddd' => '43', 'number' =>'32569841'],
            ['auth_user_id'=> 24,'ddd' => '43', 'number' =>'99874125'],
            ['auth_user_id'=> 25,'ddd' => '43', 'number' =>'999587156'],
            ['auth_user_id'=> 26,'ddd' => '43', 'number' =>'996587412'],
            ['auth_user_id'=> 27,'ddd' => '43', 'number' =>'32326588'],
            ['auth_user_id'=> 28,'ddd' => '43', 'number' =>'984215896'],
            ['auth_user_id'=> 29,'ddd' => '43', 'number' =>'99994578'],
            ['auth_user_id'=> 30,'ddd' => '43', 'number' =>'984258963'],
            ['auth_user_id'=> 31,'ddd' => '43', 'number' =>'33259865'],
            ['auth_user_id'=> 32,'ddd' => '43', 'number' =>'33333578'],
            ['auth_user_id'=> 33,'ddd' => '43', 'number' =>'991478787'],
            ['auth_user_id'=> 34,'ddd' => '43', 'number' =>'33269854'],
        ];

        $addresses = [
            ['auth_user_id' => 1, 'street' => 'Travessa Miranda e Castro',                 'number' => '487', 'district' => 'Santana',                    'city' => 'Porto Alegre', 'state' => 'RS', 'country' => 'BR', 'zipcode' => '90040-280'],
            ['auth_user_id' => 4, 'street' => 'Rua Macavauba',                             'number' => '190', 'district' => 'Centro da Serra',            'city' => 'Serra',        'state' => 'ES', 'country' => 'BR', 'zipcode' => '29179-312'],
            ['auth_user_id' => 2, 'street' => 'Rua Ex-Combatente José Conceição da Silva', 'number' => '493', 'district' => 'Lagoa Azul',                 'city' => 'Natal',        'state' => 'RN', 'country' => 'BR', 'zipcode' => '59129-476'],
            ['auth_user_id' => 3, 'street' => 'Rua da Salina',                             'number' => '876', 'district' => 'Sacavém',                    'city' => 'São Luís',     'state' => 'MA', 'country' => 'BR', 'zipcode' => '65041-310'],

            ['auth_user_id' => 5, 'street' => 'Travessa Severina Lima da Silva',           'number' => '405', 'district' => 'Planalto de Monteserra The', 'city' => 'Parnaíba',     'state' => 'PI', 'country' => 'BR', 'zipcode' => '64207-370'],
            ['auth_user_id' => 6, 'street' => 'Rua Ismael Pereira',                        'number' => '1125','district' => 'Jardim América',             'city' => 'Arapongas',    'state' => 'PP', 'country' => 'BR', 'zipcode' => '58749-328'],
            ['auth_user_id' => 7, 'street' => 'Rua Roberto Ribeiro',                       'number' => '56',  'district' => 'Jardim Apucarana',           'city' => 'Curitiba',     'state' => 'SE', 'country' => 'BR', 'zipcode' => '20158-874'],
            ['auth_user_id' => 8, 'street' => 'Avenida São Jorge',                         'number' => '198', 'district' => 'Setor Central',              'city' => 'Rondonópolis', 'state' => 'AM', 'country' => 'BR', 'zipcode' => '30265-541'],
            ['auth_user_id' => 9, 'street' => 'Rua Angelim',                               'number' => '670', 'district' => 'Cruzeiro (Icoaraci)',        'city' => 'Arapiraca',    'state' => 'ES', 'country' => 'BR', 'zipcode' => '25879-021'],
            ['auth_user_id' => 10, 'street' => 'Praça Doutor Gilson Viana, s/n',           'number' => '328', 'district' => 'Jardim Interlagos',          'city' => 'Boa Vista',    'state' => 'PR', 'country' => 'BR', 'zipcode' => '15987-000'],
            ['auth_user_id' => 11, 'street' => 'Rua Rei Márcio',                           'number' => '69',  'district' => 'Parque Estrela Dalva XVI',   'city' => 'Maricá',       'state' => 'TO', 'country' => 'BR', 'zipcode' => '11201-478'],
            ['auth_user_id' => 12, 'street' => 'Avenida Bahia',                            'number' => '1250','district' => 'Santos Dumont',              'city' => 'Cambé',        'state' => 'RR', 'country' => 'BR', 'zipcode' => '69874-156'],
            ['auth_user_id' => 13, 'street' => 'Rua 7',                                    'number' => '10',  'district' => 'Nova Marabá',                'city' => 'Natal',        'state' => 'RN', 'country' => 'BR', 'zipcode' => '98745-312'],
            ['auth_user_id' => 14, 'street' => 'Rua Américo Brasiliense',                  'number' => '1987','district' => 'Jardins',                    'city' => 'Londrina',     'state' => 'SC', 'country' => 'BR', 'zipcode' => '32587-358'],
            ['auth_user_id' => 15, 'street' => 'Avenida Coremas',                          'number' => '547', 'district' => 'Boa Vista',                  'city' => 'Ibipora',      'state' => 'RO', 'country' => 'BR', 'zipcode' => '68741-897'],
            ['auth_user_id' => 16, 'street' => 'Rua Thomás Feltes Engel',                  'number' => '752', 'district' => 'Setor Res. Campos Elísios',  'city' => 'Ourinhos',     'state' => 'ES', 'country' => 'BR', 'zipcode' => '47895-220'],
            ['auth_user_id' => 17, 'street' => 'Rua Margarida',                            'number' => '357', 'district' => 'Jardim Caravelas',           'city' => 'Patos',        'state' => 'RS', 'country' => 'BR', 'zipcode' => '69872-377'],
            ['auth_user_id' => 18, 'street' => 'Rua Otávio Pitaluga',                      'number' => '196', 'district' => 'Quintas',                    'city' => 'Aracruz',      'state' => 'SP', 'country' => 'BR', 'zipcode' => '85103-897'],
            ['auth_user_id' => 19, 'street' => 'Rua do Guarumbi',                          'number' => '174', 'district' => 'Jordanópolis',               'city' => 'Cacoal',       'state' => 'PI', 'country' => 'BR', 'zipcode' => '14758-025'],
            ['auth_user_id' => 20, 'street' => 'Rua Primeiro de Maio',                     'number' => '258', 'district' => 'Balneário Copacabana',       'city' => 'Saltinho',     'state' => 'TO', 'country' => 'BR', 'zipcode' => '35871-059'],
            ['auth_user_id' => 21, 'street' => 'Travessa Manoel Ferreira',                 'number' => '719', 'district' => 'Jardim Amanda II',           'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '01547-114'],
        
            ['auth_user_id' => 22, 'street' => 'rua cafe caturra',             'number' => '12',  'district' => 'Ana terra',             'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '12587-021'],
            ['auth_user_id' => 23, 'street' => 'rua amado noivo',              'number' => '14',  'district' => 'Maravilha',             'city' => 'Prudentopolis','state' => 'PR', 'country' => 'BR', 'zipcode' => '25986-120'],
            ['auth_user_id' => 24, 'street' => 'avenida da liberdade',         'number' => '159', 'district' => 'Sao jorge',             'city' => 'Prudentopolis','state' => 'PI', 'country' => 'BR', 'zipcode' => '35124-259'],
            ['auth_user_id' => 25, 'street' => 'rua dois irmaos',              'number' => '248', 'district' => 'Maria cecilia',         'city' => 'Prudentopolis','state' => 'MA', 'country' => 'BR', 'zipcode' => '45896-350'],
            ['auth_user_id' => 26, 'street' => 'avenida faria lima',           'number' => '359', 'district' => 'Interlagos',            'city' => 'Prudentopolis','state' => 'SP', 'country' => 'BR', 'zipcode' => '57851-147'],
            ['auth_user_id' => 27, 'street' => 'alameda pe vermelho',          'number' => '277', 'district' => 'Tocantins',             'city' => 'Prudentopolis','state' => 'TO', 'country' => 'BR', 'zipcode' => '67895-568'],
            ['auth_user_id' => 28, 'street' => 'rua das orquideas',            'number' => '369', 'district' => 'Parigot de souza',      'city' => 'Prudentopolis','state' => 'PP', 'country' => 'BR', 'zipcode' => '71230-445'],
            ['auth_user_id' => 29, 'street' => 'avenida pedro carrasco alduan','number' => '985', 'district' => 'Julio verner',          'city' => 'Prudentopolis','state' => 'AM', 'country' => 'BR', 'zipcode' => '81459-601'],
            ['auth_user_id' => 30, 'street' => 'rua dos eletricistas',         'number' => '997', 'district' => 'Abrataq',               'city' => 'Prudentopolis','state' => 'PR', 'country' => 'BR', 'zipcode' => '95623-009'],
            ['auth_user_id' => 31, 'street' => 'rua paulo gustavo',            'number' => '517', 'district' => 'Maria celina',          'city' => 'Prudentopolis','state' => 'AM', 'country' => 'BR', 'zipcode' => '09865-900'],
            ['auth_user_id' => 32, 'street' => 'avenida maringa',              'number' => '147', 'district' => 'Residencial do cafe',   'city' => 'Prudentopolis','state' => 'SC', 'country' => 'BR', 'zipcode' => '25623-789'],
            ['auth_user_id' => 33, 'street' => 'rua dos tucanos',              'number' => '69',  'district' => 'Parque das industrias', 'city' => 'Prudentopolis','state' => 'RO', 'country' => 'BR', 'zipcode' => '47910-987'],
            ['auth_user_id' => 34, 'street' => 'alameda faria lima',           'number' => '30',  'district' => 'Emirados arabes',       'city' => 'Prudentopolis','state' => 'RR', 'country' => 'BR', 'zipcode' => '68952-658'],

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
        ->batchInsert('auth_users', ['email', 'password', 'photo', 'authKey', 'acessToken', 'user_type_id', 'company_id'], $common_users)
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
