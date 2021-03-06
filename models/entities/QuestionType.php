<?php

namespace app\models\entities;

use app\helpers\HelperMethods;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

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
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];
    
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
            [['!friendly_id'], 'default', 'value' => $this->incrementFriendlyId()],
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

    public function actionsAfterSave(): array
    {
        $this->actionsAfterSave[] = LogObserverCreate::class;
        
        return $this->actionsAfterSave;
    }

    public function actionsAfterDelete(): array
    {
        $this->actionsAfterDelete[] = LogObserverDelete::class;
        
        return $this->actionsAfterDelete;
    }

    public function actionsAfterUpdate(): array
    {
        $this->actionsAfterUpdate[] = LogObserverUpdate::class;
        
        return $this->actionsAfterUpdate;
    }

    public static function relations(): array
    {
        return [
            'questions' => Question::class
        ];
    }

    public function getQuestions(): ActiveQuery
    {
        return $this->hasMany(Question::class, ['question_type_id' => 'id']);
    }

    public function fkAttribute(): string
    {
        return 'question_type_id';
    }
}
