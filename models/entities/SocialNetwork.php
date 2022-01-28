<?php

namespace app\models\entities;

use Yii;

/**
 * This is the model class for table "social_networks".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string|null $website
 * @property string|null $github
 * @property string|null $twitter
 * @property string|null $instagram
 * @property string|null $facebook
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property AuthUser $authUser
 */
class SocialNetwork extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social_networks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'auth_user_id'], 'required'],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['website', 'github', 'twitter', 'instagram', 'facebook'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_user_id' => 'Auth User ID',
            'website' => 'Website',
            'github' => 'Github',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
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
}
