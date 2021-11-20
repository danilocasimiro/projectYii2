<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property string $id
 * @property string $text
 *
 * @property Questions[] $questions
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['text'], 'required'],
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
        return $this->hasMany(Question::class, ['type_id' => 'id']);
    }
}
