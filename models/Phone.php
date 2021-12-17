<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\interfaces\ModelInterface;
use Yii;

/**
 * This is the model class for table "phones".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $ddd
 * @property string $number
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property AuthUsers $authUser
 */
class Phone extends BaseModel implements ModelInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'ddd', 'number'], 'required'],
            [['ddd'], 'string', 'max' => 5],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['number'], 'string', 'max' => 15],
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
            'ddd' => Yii::t('app', 'DDD'),
            'number' => Yii::t('app', 'Number'),
        ];
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

    public function fkAttribute()
    {
        return 'phone_id';
    }
}
