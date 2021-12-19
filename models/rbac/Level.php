<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\models\BaseModel;
use app\models\rbac\Permission;
use app\services\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use yii\db\ActiveQuery;

/**
 * This is the model class for table "levels".
 *
 * @property string $id
 * @property string $permission_id
 * @property string $rate
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property AuthUserLevel[] $authUsersLevels
 */
class Level extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'permission_id', 'rate'], 'required'],
            [['friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'permission_id'], 'string', 'max' => 32],
            [['rate'], 'string', 'max' => 60],
            [['id'], 'unique'],
            [['permission_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permission::class, 'targetAttribute' => ['permission_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permission_id' => 'Permission ID',
            'rate' => 'Rate',
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

    public function getAuthUsersLevels(): ActiveQuery
    {
        return $this->hasMany(AuthUserLevel::class, ['level_id' => 'id']);
    }

    public function getPermission(): ActiveQuery
    {
        return $this->hasOne(Permission::class, ['id' => 'permission_id']);
    }

    public function fkAttribute(): string
    {
        return 'level_id';
    } 
}
