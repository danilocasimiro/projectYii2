<?php

namespace app\models;

use app\helpers\HelperMethods;
use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property string $id
 * @property string $research_id
 * @property string $question_type_id
 * @property string $friendly_id
 * @property string $text
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property Answer[] $answers
 * @property Research $research
 * @property QuestionType $type
 */
class Question extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['research_id', 'question_type_id', 'text'], 'required'],
            [['text'], 'string', 'max' => 60],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['question_type_id', 'research_id', 'id'], 'string', 'max' => 32],
            [['research_id'], 'exist', 'skipOnError' => true, 'targetClass' => Research::class, 'targetAttribute' => ['research_id' => 'id']],
            [['question_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionType::class, 'targetAttribute' => ['question_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'research_id' => Yii::t('app', 'Research ID'),
            'question_type_id' => Yii::t('app', 'Question Type ID'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['question_id' => 'id']);
    }

    /**
     * Gets query for [[Research]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearch()
    {
        return $this->hasOne(Research::class, ['id' => 'research_id']);
    }

    /**
     * Gets query for [[Question Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionType()
    {
        return $this->hasOne(QuestionType::class, ['id' => 'question_type_id']);
    }

    public function fkAttribute()
    {
        return 'question_id';
    }
}
