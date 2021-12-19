<?php

namespace app\models;

use app\helpers\HelperMethods;
use app\services\observers\{LogObserverCreate, LogObserverDelete, LogObserverUpdate};
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "Person".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $name
 * @property string $birthdate
 * @property string $genre
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 * @property AuthUser $authUser
 */
class Person extends BaseModel 
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];

    public const GENRE_MALE = 'male';
    public const GENRE_FEMALE = 'female';
    public const GENRE_UNDEFINED = 'undefined';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'name', 'birthdate', 'genre'], 'required'],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['name'], 'string', 'max' => 60],
            ['genre', 'in', 'range' => [self::GENRE_MALE, self::GENRE_FEMALE, self::GENRE_UNDEFINED]],
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
            'name' => Yii::t('app', 'Name'),
            'birthdate' => Yii::t('app', 'birthdate'),
            'genre' => Yii::t('app', 'Genre'),
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
            'authUser' => AuthUser::class
        ];
    }

    public function getDateOfBirthAttribute()
    {
        return Yii::$app->formatter->format($this->birthdate, 'date');
    }

    public function afterFind()
    {
        //$this->birthdate = Yii::$app->formatter->format($this->birthdate, 'date');
        
        parent::afterFind();    
       
    }

    public function getAuthUser(): ActiveQuery
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }
}
