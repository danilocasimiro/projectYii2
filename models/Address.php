<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property int $id
 * @property int $auth_user_id
 * @property string $street
 * @property string $number
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 *
 * @property AuthUsers $authUser
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'street', 'number', 'district', 'city', 'state', 'country', 'zipcode'], 'required'],
            [['auth_user_id'], 'integer'],
            [['street'], 'string', 'max' => 50],
            [['number', 'zipcode'], 'string', 'max' => 15],
            [['district', 'city', 'state', 'country'], 'string', 'max' => 30],
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
            'street' => Yii::t('app', 'Street'),
            'number' => Yii::t('app', 'Number'),
            'district' => Yii::t('app', 'District'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'zipcode' => Yii::t('app', 'Zipcode'),
        ];
    }

    public function getFullAddress()
    {
        return $this->street . ', ' . $this->number . ' ' . $this->district . ' ' . $this->city . '/' . $this->state;
    }

    /**
     * Gets query for [[AuthUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthUser()
    {
        return $this->hasOne(AuthUsers::className(), ['id' => 'auth_user_id']);
    }
}
