<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\models\{AuthUser, BaseModel};
use app\services\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use yii\db\ActiveQuery;

/**
 * This is the model class for table "roles".
 *
 * @property string $id
 * @property string $name
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property AuthUser[] $authUsers
 * @property RolePermission[] $rolesPermissions
 */
class Role extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'name'], 'required'],
            [['friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['created_at', 'deleted_at'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 60],
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

    public function getAuthUsers(): ActiveQuery
    {
        return $this->hasMany(AuthUser::class, ['role_id' => 'id']);
    }

    public function getRolesPermissions(): ActiveQuery
    {
        return $this->hasMany(RolePermission::class, ['role_id' => 'id']);
    }

    public function fkAttribute(): string
    {
        return 'role_id';
    } 
}
