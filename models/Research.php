<?php

namespace app\models;

use app\components\JwtMethods;
use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;
use Yii;

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
class Research extends BaseModel implements ParentObjectInterface
{
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
            [['description'], 'string', 'max' => 60],
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

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['research_id' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function relationsName(): array
    {
        return [
            'questions' => Question::class,
            'company' => Company::class
        ];
    }

    public function fkAttribute(): string
    {
        return 'research_id';
    }
}
