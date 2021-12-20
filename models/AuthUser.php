<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\models\rbac\Role;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "auth_users".
 *
 * @property string $id
 * @property string role_id
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $photo
 * @property string $access_token
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
    private $actionsAfterSave = [];
    private $actionsAfterDelete = [];
    private $actionsAfterUpdate = [];
    
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
            [['email', 'password', 'role_id'], 'required'],
            [['email', 'auth_key', 'access_token'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                $this->access_token = \Yii::$app->security->generateRandomString();
                $this->password = md5($this->password);
            }
            
            return true;
        }
        return false;
    }

    public function actionsAfterSave(): array
    {
        $this->actionsAfterSave[] = LogObserverCreate::class;
        
        return $this->actionsAfterSave;
    }

    public function actionsAfterDelete(): array
    {
        $this->actionsAfterDelete[] = LogObserverDelete::class;
        
        return $this->actionsAfterDelete;
    }

    public function actionsAfterUpdate(): array
    {
        $this->actionsAfterUpdate[] = LogObserverUpdate::class;
        
        return $this->actionsAfterUpdate;
    }

    public static function relations(): array
    {
        return [
            'company' => Company::class,
            'phone' => Phone::class,
            'person' => Person::class,
            'address' => Address::class,
            'role' => Role::class,
            'companyUser' => CompanyUser::class

        ];
    }

    public function getPerson(): ActiveQuery
    {
        return $this->hasOne(Person::class, ['auth_user_id' => 'id']);
    }

    public function getPhone(): ActiveQuery
    {
        return $this->hasOne(Phone::class, ['auth_user_id' => 'id']);
    }

    public function getAddress(): ActiveQuery
    {
        return $this->hasOne(Address::class, ['auth_user_id' => 'id']);
    }

    public function getRole(): ActiveQuery
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    public function getCompany(): ActiveQuery
    {
        return $this->hasOne(Company::class, ['auth_user_id' => 'id']);
    }

    public function getCompanyUser(): ActiveQuery
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function fkAttribute(): string
    {
        return 'auth_user_id';
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

    public function isPerson()
    {
        return $this->person ? $this->person : $this->company;
    }
}
