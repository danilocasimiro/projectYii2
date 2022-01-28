<?php

namespace app\models\entities;

use app\helpers\HelperMethods;
use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use yii\db\ActiveQuery;

/**
 * This is the model class for table "plans_items".
 *
 * @property string $id
 * @property string $plan_id
 * @property string|null $item
 * @property int $limit
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property Plans $plan
 */
class PlanItem extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'plan_id', 'limit'], 'required'],
            [['item'], 'string'],
            [['limit', 'friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => $this->incrementFriendlyId()],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'plan_id'], 'string', 'max' => 32],
            [['id'], 'unique'],
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
            'plan_id' => 'Plan ID',
            'item' => 'Item',
            'limit' => 'Limit',
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
            'plan' => Plan::class
        ];
    }

    public function getPlan(): ActiveQuery
    {
        return $this->hasOne(Plan::class, ['id' => 'plan_id']);
    }
}
