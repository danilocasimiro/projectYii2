<?php

namespace app\models;

use app\helpers\HelperMethods;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "auth_users".
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $photo
 * @property string $access_token
 * @property string $type
 * @property string $friendly_id
 * @property string $company_id
 * @property string $created_at
 * @property string $deleted_at
 * @property Person $person
 * @property Phone $phone
 * @property Address $adress
 * @property Company $company
 */
class AuthUser extends BaseModel implements IdentityInterface
{
    public const TYPE_ADMIN = 'Admin';
    public const TYPE_COMPANY = 'Empresa';
    public const TYPE_EMPLOYEE = 'Colaborador';
    public const TYPE_USER = 'Usuário';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['email', 'password'], 'required'],
            [['email', 'auth_key', 'access_token'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            ['type', 'in', 'range' => [self::TYPE_ADMIN, self::TYPE_COMPANY, self::TYPE_EMPLOYEE, self::TYPE_USER]],
            [['company_id', 'id'], 'string', 'max' => 32],
            [['password', 'photo'], 'string', 'max' => 60],
            [['access_token', 'auth_key'], 'default', 'value' => md5(uniqid(rand(), true))],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'photo' => Yii::t('app', 'Photo'),
            'password' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'access_token' => Yii::t('app', 'Acess Token'),
        ];
    }

    public function fields()
    {
        return [
            'id' => 'id',
            'email' => 'email',
            'photo' => 'photo',
            'type' => 'type',
            'person' => 'person',
            'company_id' => 'company_id',
            'company' => 'company',
            'address' => 'address',
            'phone' => 'phone',
            'deleted_at' => 'deleted_at'
        ];
    }

    public function isPerson()
    {
        return $this->person ? $this->person : $this->company;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                $this->access_token = \Yii::$app->security->generateRandomString();
                $this->password = md5($this->password);
                $current_user = !Yii::$app->user->isGuest && Yii::$app->user->identity->type;                
                if($current_user){
                    switch (Yii::$app->user->identity->type) {
                        case static::TYPE_ADMIN:
                            $this->type = static::TYPE_ADMIN;
                            break;
                        case static::TYPE_COMPANY:
                            $this->type = static::TYPE_COMPANY;
                            $this->company_id = Yii::$app->user->identity->company->id;
                            break;
                        default:
                            $this->type = static::TYPE_USER;
                    }
                }else {
                    $this->type = static::TYPE_USER;
                }
            }
            
            return true;
        }
        return false;
    }

    public function getName()
    {
        return $this->company ? $this->company->name : $this->person->name;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     * @param \Lcobucci\JWT\Token $token
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = AuthUser::find()->all();
        foreach ($users as $user) {
            if ((string) $user->id === (string) $token->getClaim('uid')) {
                return new static($user);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

     /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
       return static::findOne(['email' => $email]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public function relations()
    {
        return [
            'person' => Person::class,
            'phone' => Phone::class,
            'address' => Address::class,
            'company' => Company::class,
            'companyUser' => Company::class
            
        ];
    }

    public function getPerson()
    {
        return $this->hasOne(Person::class, ['auth_user_id' => 'id']);
    }

    public function getPhone()
    {
        return $this->hasOne(Phone::class, ['auth_user_id' => 'id']);
    }

    public function getAddress()
    {
        return $this->hasOne(Address::class, ['auth_user_id' => 'id']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::class, ['auth_user_id' => 'id']);
    }

    public function getCompanyUser()
    {
        return $this->hasOne(Company::class, ['company_id' => 'id']);
    }

    public function fkAttribute()
    {
        return 'auth_user_id';
    }
}
