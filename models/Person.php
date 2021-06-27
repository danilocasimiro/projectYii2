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
            [['auth_user_id', 'name', 'birthday', 'sex'], 'required'],
            [['auth_user_id'], 'integer'],
            [['birthday'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['sex'], 'string', 'max' => 1],
            ['auth_user_id', 'unique']
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

}
