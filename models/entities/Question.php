<?php

namespace app\models\entities;

use app\helpers\HelperMethods;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

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
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

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
            [['text'], 'string', 'max' => 255],
            [['!friendly_id'], 'default', 'value' => $this->incrementFriendlyId()],
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

    public function fields()
    {
        return [
            'id' => 'id',
            'research_id' => 'research_id',
            'question_type_id' => 'question_type_id',
            'friendly_id' => 'friendly_id',
            'text' => 'text',
            'answers' => 'answers'
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
            'answers' => Answer::class,
            'research' => Research::class,
            'questionType' => QuestionType::class
        ];
    }

    public function getAnswers(): ActiveQuery
    {
        return $this->hasMany(Answer::class, ['question_id' => 'id']);
    }

    public function getResearch(): ActiveQuery
    {
        return $this->hasOne(Research::class, ['id' => 'research_id']);
    }

    public function getQuestionType(): ActiveQuery
    {
        return $this->hasOne(QuestionType::class, ['id' => 'question_type_id']);
    }

    public function fkAttribute(): string
    {
        return 'question_id';
    }
}
