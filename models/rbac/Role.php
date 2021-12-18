<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;
use app\models\BaseModel;
use Yii;

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
class Role extends BaseModel implements ParentObjectInterface
{
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

    /**
     * Gets query for [[AuthUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUsers()
    {
        return $this->hasMany(AuthUser::class, ['role_id' => 'id']);
    }

    /**
     * Gets query for [[RolesPermissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolesPermissions()
    {
        return $this->hasMany(RolePermission::class, ['role_id' => 'id']);
    }

    public function relationsName(): array
    {
        return [
            'authUsers' => AuthUser::class,
            'RolesPermissions' => RolePermission::class
        ];
    }

    public function fkAttribute(): string
    {
        return 'role_id';
    } 
}
