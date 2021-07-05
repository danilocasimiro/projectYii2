<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property int $researche_id
 * @property int $type_id
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
            [['researche_id', 'type_id', 'text'], 'required'],
            [['researche_id', 'type_id'], 'integer'],
            [['text'], 'string', 'max' => 60],
            [['researche_id'], 'exist', 'skipOnError' => true, 'targetClass' => Researches::className(), 'targetAttribute' => ['researche_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Types::className(), 'targetAttribute' => ['type_id' => 'id']],
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
        return $this->hasMany(Answers::className(), ['question_id' => 'id']);
    }

    /**
     * Gets query for [[Researche]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResearche()
    {
        return $this->hasOne(Researches::className(), ['id' => 'researche_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Types::className(), ['id' => 'type_id']);
    }
}
