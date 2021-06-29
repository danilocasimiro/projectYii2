<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phones".
 *
 * @property int $id
 * @property int $auth_user_id
 * @property string $ddd
 * @property string $number
 *
 * @property AuthUsers $authUser
 */
class Phone extends \yii\db\ActiveRecord
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
            [['auth_user_id', 'ddd', 'number'], 'required'],
            [['auth_user_id'], 'integer'],
            [['ddd'], 'string', 'max' => 5],
            [['number'], 'string', 'max' => 15],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::className(), 'targetAttribute' => ['auth_user_id' => 'id']],
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
        return $this->hasOne(AuthUsers::className(), ['id' => 'auth_user_id']);
    }
}
