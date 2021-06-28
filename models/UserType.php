<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_types".
 *
 * @property int $id
 * @property string $type
 *
 * @property AuthUser[] $authUsers
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * Gets query for [[AuthUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUsers()
    {
        return $this->hasMany(AuthUsers::className(), ['user_type_id' => 'id']);
    }
}
