<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_users".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $photo
 * @property string $acessToken
 * @property int $user_type_id
 * @property Person $person
 * @property UserType $user_type
 * @property Phone $phone
 * @property Address $adress
 * @property Company $company
 * @property Company $company_id
 */
class AuthUser extends ActiveRecord implements IdentityInterface
{
    /**
     * @var UploadedFile
     */
    public $fotoCliente;

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
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['email', 'password'], 'required'],
            [['email', 'authKey', 'acessToken'], 'string', 'max' => 45],
            [['email'], 'email'],
            ['fotoCliente', 'file', 'extensions' => 'jpg, png'],
            [['password', 'photo'], 'string', 'max' => 60],
            [['acessToken', 'authKey'], 'default', 'value' => '7c4a8d09ca3762af61e59520943dc26494f8941b'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::class, 'targetAttribute' => ['user_type_id' => 'id']],

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
            'fotoCliente' => 'Foto de Perfil',
            'photo' => Yii::t('app', 'Photo'),
            'password' => Yii::t('app', 'Password'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'acessToken' => Yii::t('app', 'Acess Token'),
        ];
    }

    public static function verifyAbility($user, $id)
    {
        if($id !== null && !$user->isGuest && ($user->identity->userType->type === 'admin' 
        || $user->identity->userType->type === 'own_company')){
            return $id;
        }else{
            return $user->id;
        }
    }

    public function isPerson()
    {
        return $this->person ? $this->person : $this->company;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
                $this->acessToken = \Yii::$app->security->generateRandomString();
                $current_user = !Yii::$app->user->isGuest && Yii::$app->user->identity->userType->type;                
                if($current_user){
                    switch (Yii::$app->user->identity->userType->type) {
                        case 'Admin':
                            $this->user_type_id = 2;
                            break;
                        case 'Empresa':
                            $this->user_type_id = 3;
                            $this->company_id = Yii::$app->user->identity->company->id;
                            break;
                        default:
                            $this->user_type_id = 4;
                    }
                }else {
                    $this->user_type_id = 4;
                }
            }
            $this->password = md5($this->password);
            
            return true;
        }
        return false;
    }

    public function getPhoto()
    {
        if($this->photo === null){
            return Yii::getAlias('/files/default.jpg');
        }else{
           return Yii::getAlias('/files/').  $this->photo;
        }
    }

    public static function getName()
    {
        return Yii::$app->user->identity->person ? Yii::$app->user->identity->person->name : Yii::$app->user->identity->company->name;
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
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
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

    public function getPerson()
    {
        return $this->hasOne(Person::class, ['auth_user_id' => 'id']);
    }

    public function getUserType()
    {
        return $this->hasOne(UserType::class, ['id' => 'user_type_id']);
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
}
