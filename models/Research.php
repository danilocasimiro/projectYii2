<?php

namespace app\models;

use app\components\JwtMethods;
use app\helpers\HelperMethods;
use app\services\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "researches".
 *
 * @property string $id
 * @property string $company_id
 * @property string $friendly_id
 * @property string $title
 * @property string $description
 *
 * @property Questions[] $questions
 * @property Company $company
 */
class Research extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];
    
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
            [['company_id'], 'default', 'value' => JwtMethods::getCompanyIdFromJwt()],
            [['company_id', 'title', 'description'], 'required'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['title'], 'string', 'max' => 40],
            [['company_id', 'id'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
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

    public function fields()
    {
        return [
            'id' => 'id',
            'company_id' => 'company_id',
            'friendly_id' => 'friendly_id',
            'title' => 'title',
            'description' => 'description',
            'questions' => 'questions'
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
            'questions' => Question::class,
            'company' => Company::class
        ];
    }

    public function getQuestions(): ActiveQuery
    {
        return $this->hasMany(Question::class, ['research_id' => 'id']);
    }

    public function getCompany(): ActiveQuery
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function fkAttribute(): string
    {
        return 'research_id';
    }
}
