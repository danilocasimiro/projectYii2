<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "Person".
 *
 * @property int $id
 * @property int $auth_user_id
 * @property string $name
 * @property string $birthday
 * @property string $sex
 * @property AuthUser $authUser
 */
class Person extends ActiveRecord
{
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
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'name', 'birthday', 'sex'], 'required'],
            [['auth_user_id'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['sex'], 'string', 'max' => 1],
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
            'birthday' => Yii::t('app', 'Birthday'),
            'sex' => Yii::t('app', 'Sex'),
        ];
    }

    public function getDateOfBirthAttribute()
    {
        [$day, $month, $year] = explode('/', $this->birthday);
        return implode('/', [$month, $day, $year]);
    }

    public function afterFind()
    {
        $this->birthday = Yii::$app->formatter->format($this->birthday, 'date');
        
        parent::afterFind();    
       
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
                $date = new \DateTime($this->getDateOfBirthAttribute(), new \DateTimeZone('UTC'));
         
                $this->birthday =  $date->format('Y-m-d\ H:i:s.u');

                return true;
        }
        return false;
    }

    public function getAuthUser()
    {
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }
}
