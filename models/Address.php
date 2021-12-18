<?php

namespace app\models;

use app\helpers\HelperMethods;
use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string $street
 * @property string $number
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $friendly_id
 * @property string $created_at
 * @property string $deleted_at
 *
 * @property AuthUsers $authUser
 */
class Address extends BaseModel
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
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['auth_user_id', 'street', 'number', 'district', 'city', 'state', 'country', 'zipcode'], 'required'],
            [['street'], 'string', 'max' => 50],
            [['number', 'zipcode'], 'string', 'max' => 15],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['district', 'city', 'state', 'country'], 'string', 'max' => 30],
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
        return $this->hasOne(AuthUser::class, ['id' => 'auth_user_id']);
    }
}
