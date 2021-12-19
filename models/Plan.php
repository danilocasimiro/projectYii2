<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;

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
class Plan extends BaseModel implements ParentObjectInterface
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
            [['id', 'name', 'description', 'value', 'subscription_period', 'friendly_id'], 'required'],
            [['value'], 'number'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
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

    public function fkAttribute(): string
    {
        return 'plan_id';
    }

    public function getPlansItems()
    {
        return $this->hasMany(PlansItems::class, ['plan_id' => 'id']);
    }

    public function getCompaniesPlans()
    {
        return $this->hasMany(CompaniesPlans::class, ['plan_id' => 'id']);
    }
}
