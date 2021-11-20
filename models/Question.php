<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property string $id
 * @property string $researche_id
 * @property string $type_id
 * @property string $text
 *
 * @property Answers[] $answers
 * @property Researches $researche
 * @property Types $type
 */
class Question extends \yii\db\ActiveRecord
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
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['researche_id', 'type_id', 'text'], 'required'],
            [['text'], 'string', 'max' => 60],
            [['type_id', 'researche_id', 'id'], 'string', 'max' => 32],
            [['researche_id'], 'exist', 'skipOnError' => true, 'targetClass' => Research::class, 'targetAttribute' => ['researche_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'researche_id' => Yii::t('app', 'Researche ID'),
            'type_id' => Yii::t('app', 'Type ID'),
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
     * Gets query for [[Researche]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearche()
    {
        return $this->hasOne(Research::class, ['id' => 'researche_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }
}
