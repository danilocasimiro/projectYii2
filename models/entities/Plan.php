<?php

namespace app\models\entities;

use app\helpers\HelperMethods;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use yii\db\ActiveQuery;

/**
 * This is the model class for table "Plans".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property float $value
 * @property int $subscription_period
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 */
class Plan extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'name', 'description', 'value', 'subscription_period'], 'required'],
            [['value'], 'number'],
            [['!friendly_id'], 'default', 'value' =>$this->incrementFriendlyId()],
            [['subscription_period', 'friendly_id'], 'integer'],
            [['created_at', 'deleted_at'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['name', 'description'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'value' => 'Value',
            'subscription_period' => 'Subscription Period',
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
            'plansItems' => PlanItem::class,
            'companiesPlans' => CompanyPlan::class
        ];
    }

    public function getPlansItems(): ActiveQuery
    {
        return $this->hasMany(PlanItem::class, ['plan_id' => 'id']);
    }

    public function getCompaniesPlans(): ActiveQuery
    {
        return $this->hasMany(CompanyPlan::class, ['plan_id' => 'id']);
    }

    public function fkAttribute(): string
    {
        return 'plan_id';
    }
}
