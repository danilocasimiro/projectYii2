<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $name
 * @property string $foundation
 * @property string $cnpj
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property AuthUser $authUser
 * @property AuthUser $authUserCompany
 */
class Company extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'name', 'foundation', 'cnpj'], 'required'],
            [['foundation'], 'safe'],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 60],
            [['cnpj'], 'string', 'max' => 18],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'auth_user_id' => Yii::t('app', 'Auth User ID'),
            'name' => Yii::t('app', 'Fantasy name'),
            'foundation' => Yii::t('app', 'Foundation'),
            'cnpj' => Yii::t('app', 'CNPJ'),
        ];
    }

    public function getFoundation()
    {
       return isset($this->foundation) ? Yii::$app->formatter->format($this->foundation, 'date') : '';
    }

    /**
     * Gets query for [[AuthUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUser()
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }

    public function getAuthUserCompany()
    {
        return $this->hasMany(AuthUser::class, ['company_id' => 'id']);
    }

    public function fkAttribute()
    {
        return 'company_id';
    }
}
