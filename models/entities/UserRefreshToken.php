<?php

namespace app\models\entities;

use yii\db\{ActiveQuery, ActiveRecord};

/**
 * This is the model class for table "users_refresh_tokens".
 *
 * @property string $id
 * @property string $user_id
 * @property string $token
 * @property string $ip
 * @property string|null $user_agent
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property AuthUser $user
 */
class UserRefreshToken extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_refresh_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' =>md5(uniqid(rand(), true))],
            [['id', 'user_id', 'token', 'ip'], 'required'],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'user_id'], 'string', 'max' => 32],
            [['token', 'user_agent'], 'string', 'max' => 200],
            [['ip'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'ip' => 'Ip',
            'user_agent' => 'User Agent',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(AuthUser::class, ['id' => 'user_id']);
    }
}
