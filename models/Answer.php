<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;
use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property int $question_id
 * @property string $text
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property Questions $question
 */
class Answer extends BaseModel implements ParentObjectInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['question_id', 'text'], 'required'],
            [['text'], 'string', 'max' => 60],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['id', 'question_id'], 'string', 'max' => 32],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::class, 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::class, ['id' => 'question_id']);
    }

    public function relationsName(): array
    {
        return [
            'question' => Question::class
        ];
    }

    public function fkAttribute(): string
    {
        return 'answer_id';
    }
}
