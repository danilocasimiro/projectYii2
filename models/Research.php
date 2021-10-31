<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "researches".
 *
 * @property int $id
 * @property int $auth_user_id
 * @property string $title
 * @property string $description
 *
 * @property Questions[] $questions
 * @property AuthUsers $authUser
 */
class Research extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'researches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'title', 'description'], 'required'],
            [['auth_user_id'], 'integer'],
            [['title'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 60],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUsers::className(), 'targetAttribute' => ['auth_user_id' => 'id']],
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
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Questions::className(), ['researche_id' => 'id']);
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
