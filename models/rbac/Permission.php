<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;
use app\models\BaseModel;
use Yii;

/**
 * This is the model class for table "permissions".
 *
 * @property string $id
 * @property string $name
 * @property string $endpoint
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property RolePermission[] $rolesPermissions
 */
class Permission extends BaseModel implements ParentObjectInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'name', 'endpoint'], 'required'],
            [['friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['created_at', 'deleted_at'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['name', 'endpoint'], 'string', 'max' => 60],
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
            'endpoint' => 'Endpoint',
            'friendly_id' => 'Friendly ID',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[RolesPermissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolesPermissions()
    {
        return $this->hasMany(RolePermission::class, ['permission_id' => 'id']);
    }

    public function relationsName(): array
    {
        return [
            'rolesPermissions' => RolePermission::class
        ];
    }

    public function fkAttribute(): string
    {
        return 'permission_id';
    } 
}
