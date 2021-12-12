<?php

namespace app\models;

use app\helpers\HelperMethods;
use Yii;

/**
 * This is the model class for table "questions_types".
 *
 * @property string $id
 * @property string $text
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property Questions[] $questions
 */
class QuestionType extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['text'], 'required'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['id'], 'string', 'max' => 32],
            [['text'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['question_type_id' => 'id']);
    }

    public function fkAttribute()
    {
        return 'question_type_id';
    }
}
