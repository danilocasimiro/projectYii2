<?php

namespace app\models\entities;

use app\helpers\HelperMethods;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use yii\db\ActiveQuery;

/**
 * This is the model class for table "companies_plans".
 *
 * @property string $id
 * @property string $company_id
 * @property string $plan_id
 * @property float $monthly_payment
 * @property string $due_date
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property Companies $company
 * @property Plans $plan
 */
class CompanyPlan extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'company_id', 'plan_id', 'monthly_payment', 'due_date'], 'required'],
            [['monthly_payment'], 'number'],
            [['due_date', 'created_at', 'deleted_at'], 'safe'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['friendly_id'], 'integer'],
            [['id', 'company_id', 'plan_id'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::class, 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'plan_id' => 'Plan ID',
            'monthly_payment' => 'Monthly Payment',
            'due_date' => 'Due Date',
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
            'plan' => Plan::class,
            'company' => Company::class
        ];
    }

    public function getCompany(): ActiveQuery
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    public function getPlan(): ActiveQuery
    {
        return $this->hasOne(Plan::class, ['id' => 'plan_id']);
    }
}
