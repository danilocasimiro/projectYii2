<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\services\systemServices\CreateObjectService;
use Yii;

/**
 * This is the model class for table "researches".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $friendly_id
 * @property string $title
 * @property string $description
 *
 * @property Questions[] $questions
 * @property AuthUsers $authUser
 */
class Research extends BaseModel
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
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'title', 'description'], 'required'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['title'], 'string', 'max' => 40],
            [['auth_user_id', 'id'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 60],
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
        return $this->hasMany(Question::class, ['research_id' => 'id']);
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
        return 'research_id';
    }
}
