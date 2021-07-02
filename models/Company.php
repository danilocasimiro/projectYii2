<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property int $auth_user_id
 * @property string $name
 * @property string $foundation
 * @property string $cnpj
 *
 * @property AuthUser $authUser
 * @property AuthUser $authUserCompany
 */
class Company extends \yii\db\ActiveRecord
{
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
            [['auth_user_id', 'name', 'foundation', 'cnpj'], 'required'],
            [['auth_user_id'], 'integer'],
            [['foundation'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['cnpj'], 'string', 'max' => 18],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::className(), 'targetAttribute' => ['auth_user_id' => 'id']],
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

    public function getDateOfBirthAttribute()
    {
        [$day, $month, $year] = explode('/', $this->foundation);
        return implode('/', [$month, $day, $year]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
                $date = new \DateTime($this->getDateOfBirthAttribute(), new \DateTimeZone('UTC'));
         
                $this->foundation =  $date->format('Y-m-d\ H:i:s.u');

                return true;
        }
        return false;
    }

    public function getFoundation()
    {
       return isset($company->foundation) ? Yii::$app->formatter->format($company->foundation, 'date') : '';
    }

    /**
     * Gets query for [[AuthUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUser()
    {
        return $this->hasOne(AuthUser::className(), ['id' => 'auth_user_id']);
    }

    public function getAuthUserCompany()
    {
        return $this->hasOne(AuthUser::className(), ['id' => 'company_id']);
    }
}
