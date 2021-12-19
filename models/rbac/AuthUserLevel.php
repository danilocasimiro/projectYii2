<?php

namespace app\models\rbac;

use app\helpers\HelperMethods;
use app\models\{AuthUser, BaseModel};
use app\services\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "auth_users_levels".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $level_id
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 *
 * @property AuthUser $authUser
 * @property Level $level
 */
class AuthUserLevel extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_users_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'auth_user_id', 'level_id'], 'required'],
            [['friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'auth_user_id', 'level_id'], 'string', 'max' => 32],
            [['id'], 'unique'],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::class, 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_user_id' => 'Auth User ID',
            'level_id' => 'Level ID',
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

    public function getAuthUser(): ActiveQuery
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }

    public function getLevel(): ActiveQuery
    {
        return $this->hasOne(Level::class, ['id' => 'level_id']);
    }
}
