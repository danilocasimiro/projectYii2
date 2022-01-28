<?php

namespace app\models\entities;

use app\useCases\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "companies".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $name
 * @property string $foundation
 * @property string $cnpj
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property AuthUser $authUser
 * @property AuthUser $authUserCompany
 */
class Company extends BaseModel
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'name', 'foundation', 'cnpj'], 'required'],
            [['foundation'], 'safe'],
            [['!friendly_id'], 'default', 'value' =>$this->incrementFriendlyId()],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 60],
            [['cnpj'], 'string', 'max' => 18],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'auth_user_id' => Yii::t('app', 'Auth User ID'),
            'name' => Yii::t('app', 'Fantasy name'),
            'foundation' => Yii::t('app', 'Foundation'),
            'cnpj' => Yii::t('app', 'CNPJ'),
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
            'authUser' => AuthUser::class,
            'companyPlan' => CompanyPlan::class,
            'authUserCompany' => AuthUser::class
        ];
    }

    public function getAuthUser(): ActiveQuery
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }

    public function getCompanyPlan(): ActiveQuery
    {
        return $this->hasOne(CompanyPlan::class, ['company_id' => 'id']);
    }

    public function getAuthUserCompany(): ActiveQuery
    {
        return $this->hasMany(AuthUser::class, ['company_id' => 'id']);
    }

    public function fkAttribute(): string
    {
        return 'company_id';
    }

    public function getFoundation()
    {
       return isset($this->foundation) ? Yii::$app->formatter->format($this->foundation, 'date') : '';
    }
}
