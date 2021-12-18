<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\interfaces\ParentObjectInterface;
use app\models\BaseModel;
use app\models\rbac\Permission;
use Yii;

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
class Level extends BaseModel implements ParentObjectInterface
{
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

    /**
     * Gets query for [[AuthUsersLevels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUsersLevels()
    {
        return $this->hasMany(AuthUserLevel::class, ['level_id' => 'id']);
    }

    /**
     * Gets query for [[AuthUsersLevels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::class, ['id' => 'permission_id']);
    }

    public function relationsName(): array
    {
        return [
            'permission' => Permission::class,
            'authUserLevels' => AuthUserLevel::class
        ];
    }

    public function fkAttribute(): string
    {
        return 'level_id';
    } 
}
