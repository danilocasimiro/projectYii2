<?php

namespace tests\unit\models;

use app\interfaces\ModelInterface;
use app\models\AuthUser;
use app\useCases\systemServices\{CreateBatchObjectsService, CreateObjectService, DeleteObjectService, UpdateObjectService};
use Codeception\Example;

class AuthUserTest extends \Codeception\Test\Unit
{
    
    //_before method is executed before each test (like setUp in PHPUnit)
    public function _before()
    {

    }

    //_after method is executed after each test (like tearDown in PHPUnit)
    public function _after()
    {

    }

    public function testFindAuthUserById()
    {
        expect_that($authUser = AuthUser::findIdentity('2a6571da26602a67be14ea8c5ab82349'));
        expect($authUser->email)->equals('admin@admin.com');
        expect_not(AuthUser::findIdentity(999));
    }

    public function testCreateAuthUser()
    {
        $params = [
            'role_id' => "343b1c4a3ea721b2d640fc8700db0f36",
            'email' => 'lelezin@hotmail.com',
            'password' => '123456',
            'type' => 'Employee'
        ];

        expect_that($authUser = CreateObjectService::createObject(AuthUser::class, $params)); 
        expect($authUser->email)->equals('lelezin@hotmail.com');
        expect($authUser->role_id)->equals('343b1c4a3ea721b2d640fc8700db0f36');
        expect($authUser->password)->equals(md5('123456'));
        expect($authUser->type === 'Employee');
        expect_not($authUser->id === null); 

    }

    public function testCreateCompleteAuthUser()
    {
        $params = [ 

            'role_id' => "343b1c4a3ea721b2d640fc8700db0f36",
            'email' => 'abidu@hotmail.com',
            'password' => '123456',
            'type' => 'Employee',
            'person' => [
                'name' => 'jose maria martins',
                'birthdate' => '2021-10-10',
                'genre' => 'male'
            ],
            "phone" => [
                "ddd" => "44",
                "number" => "32325252"
            ],
            "address" => [
                "street" => "rua cafe caturra",
                "number" => "327",
                "district" => "continental",
                "city" => "Londrina",
                "state" => "Parana",
                "country" => "Brasil",
                "zipcode" => "86081260"
            

        ]];

        expect_that($authUser = CreateObjectService::createObject(AuthUser::class, $params)); 
        expect($authUser->email)->equals('abidu@hotmail.com');
        expect($authUser->role_id)->equals('343b1c4a3ea721b2d640fc8700db0f36');
        expect($authUser->password)->equals(md5('123456'));
        expect($authUser->type === 'Employee');
        expect_not($authUser->id === null); 

        expect($authUser->person->name)->equals('jose maria martins');
        expect($authUser->person->birthdate)->equals('2021-10-10 00:00:00');
        expect($authUser->person->genre)->equals('male'); 
        expect_not($authUser->person->id === null);   
        
        expect($authUser->phone->ddd)->equals('44');
        expect($authUser->phone->number)->equals('32325252');
        expect_not($authUser->phone->id === null);

        expect($authUser->address->street)->equals('rua cafe caturra');
        expect($authUser->address->number)->equals('327');
        expect($authUser->address->district)->equals('continental');
        expect($authUser->address->city)->equals('Londrina');
        expect($authUser->address->state)->equals('Parana');
        expect($authUser->address->country)->equals('Brasil');
        expect($authUser->address->zipcode)->equals('86081260');
        expect_not($authUser->address->id === null);

    }

    /**
    * @dataProvider pageProvider
    */
    public function testCreateBatchAuthUser(array $authUser)
    {
        expect_that($authUsers = CreateBatchObjectsService::createBatchObjects(AuthUser::class, $authUser)); 
        static::assertCount(3, $authUsers);
    }

    public function testSoftDeleteAuthUser()
    {
        /**@var ModelInterface $authUser */
        expect_that($authUser = AuthUser::findIdentity('2a6571da26602a67be14ea8c5ab82349'));
        $id = $authUser->id;
        expect($authUser = DeleteObjectService::deleteObject(AuthUser::class, 'soft', $authUser))->equals("Object ".$id." soft deleted successfully"); 
    }

    public function testHardDeleteAuthUser()
    {
        /**@var ModelInterface $authUser */
        expect_that($authUser = AuthUser::findIdentity('2a6571da26602a67be14ea8c5ab82349'));
        $id = $authUser->id;
        expect($authUser = DeleteObjectService::deleteObject(AuthUser::class, 'hard', $authUser))->equals("Object ".$id." hard deleted successfully"); 

    }

    public function testUpdateAuthUser()
    {
        $params = [
            'email' => 'ana_luiza@filmagens.com',
            'password' => '567890',
            'type' => 'User'
        ];
        /**@var ModelInterface $authUser */
        expect_that($authUser = AuthUser::findIdentity('2a6571da26602a67be14ea8c5ab82349'));

        expect_that($authUser = UpdateObjectService::updateObject($authUser, $params));
        expect($authUser->email)->equals('ana_luiza@filmagens.com');
        //expect($authUser->password)->equals(md5('567890'));
        expect($authUser->type)->equals('User');
    }

    /**
     * @return array
     */
    public function pageProvider()
    {
        return 
        [
            [
                [ 
                    'objects' => [
                        [
                            'role_id' => "343b1c4a3ea721b2d640fc8700db0f36",
                            'email' => 'abidu@hotmail.com',
                            'password' => '123456',
                            'type' => 'Employee',
                            'person' => [
                                'name' => 'jose maria martins',
                                'birthdate' => '2021-10-10',
                                'genre' => 'male'
                            ],
                            "phone" => [
                                "ddd" => "44",
                                "number" => "32325252"
                            ],
                            "address" => [
                                "street" => "rua cafe caturra",
                                "number" => "327",
                                "district" => "continental",
                                "city" => "Londrina",
                                "state" => "Parana",
                                "country" => "Brasil",
                                "zipcode" => "86081260"
                            ]
                        ],
                        [
                            'role_id' => "343b1c4a3ea721b2d640fc8700db0f36",
                            'email' => 'marques@hotmail.com',
                            'password' => '123456',
                            'type' => 'Employee',
                            'person' => [
                                'name' => 'jose maria martins',
                                'birthdate' => '2021-10-10',
                                'genre' => 'male'
                            ],
                            "phone" => [
                                "ddd" => "44",
                                "number" => "32325252"
                            ],
                            "address" => [
                                "street" => "rua cafe caturra",
                                "number" => "327",
                                "district" => "continental",
                                "city" => "Londrina",
                                "state" => "Parana",
                                "country" => "Brasil",
                                "zipcode" => "86081260"
                            ]
                        ],
                        [
                            'role_id' => "343b1c4a3ea721b2d640fc8700db0f36",
                            'email' => 'ulion@hotmail.com',
                            'password' => '123456',
                            'type' => 'Employee',
                            'person' => [
                                'name' => 'jose maria martins',
                                'birthdate' => '2021-10-10',
                                'genre' => 'male'
                            ],
                            "phone" => [
                                "ddd" => "44",
                                "number" => "32325252"
                            ],
                            "address" => [
                                "street" => "rua cafe caturra",
                                "number" => "327",
                                "district" => "continental",
                                "city" => "Londrina",
                                "state" => "Parana",
                                "country" => "Brasil",
                                "zipcode" => "86081260"
                            ]
                        ],
                    ]
                ]
            ]
        ];
    }
}
