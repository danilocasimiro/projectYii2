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
 * @property string $acessToken
 * @property int $user_type_id
 * @property Person $person
 * @property UserType $user_type
 * @property Phone $phone
 * @property Address $adress
 */
class AuthUser extends ActiveRecord implements IdentityInterface
{
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
            [['email', 'password'], 'required'],
            [['email', 'authKey', 'acessToken'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['password'], 'string', 'max' => 60],
            [['acessToken', 'authKey'], 'default', 'value' => '7c4a8d09ca3762af61e59520943dc26494f8941b'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],

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
            'password' => Yii::t('app', 'Password'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'acessToken' => Yii::t('app', 'Acess Token'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
                $this->acessToken = \Yii::$app->security->generateRandomString();
                $this->password = sha1($this->password);
                $this->user_type_id = 4;
            }
            return true;
        }
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

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
        return $this->password === sha1($password);
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
}
