<?php

namespace app\models\entities;

use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use app\components\jwt\JwtMethods;
use app\helpers\HelperMethods;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "users_questions_answers".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $question_id
 * @property string $answer_id
 * @property string|null $description
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property Answers $answer
 * @property AuthUsers $authUser
 * @property Questions $question
 */
class UserQuestionAnswer extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_questions_answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id'], 'default', 'value' => JwtMethods::getAuthUserFromJwt()->id],
            [['id', 'auth_user_id', 'question_id', 'answer_id'], 'required'],
            [['friendly_id'], 'integer'],
            [['created_at', 'deleted_at'], 'safe'],
            [['!friendly_id'], 'default', 'value' => $this->incrementFriendlyId()],
            [['id', 'auth_user_id', 'question_id', 'answer_id'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Answer::class, 'targetAttribute' => ['answer_id' => 'id']],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::class, 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_user_id' => 'Auth User ID',
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
            'description' => 'Description',
            'friendly_id' => 'Friendly ID',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
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
            'answer' => Answer::class,
            'authUser' => AuthUser::class,
            'question' => Question::class
        ];
    }

    public function getAnswer(): ActiveQuery
    {
        return $this->hasOne(Answer::class, ['id' => 'answer_id']);
    }

    public function getAuthUser(): ActiveQuery
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }

    public function getQuestion(): ActiveQuery
    {
        return $this->hasOne(Question::class, ['id' => 'question_id']);
    }
}
