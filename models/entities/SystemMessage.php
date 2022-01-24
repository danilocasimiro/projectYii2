<?php

namespace app\models\entities;

use app\helpers\HelperMethods;

/**
 * This is the model class for table "system_messages".
 *
 * @property string $id
 * @property string $subject
 * @property string $message
 * @property string|null $type
 * @property int $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 */
class SystemMessage extends BaseModel
{
    public const LOG_LOGIN_ID = '85108729b0f7c0d050954a48552f7e96';
    public const LOG_CREATE_ID = '322c7a7c07295ca931dcbb2acd4cfec1';
    public const LOG_ERROR_ID = '6fef4fc93ad486f88a90318e1ae2be65';
    public const LOG_UPDATE_ID = '378bf9cf1d7b56c52e2e484f69c209cd';
    public const LOG_DELETE_ID = 'f2a4531dee2a1b4a92c2c145bbabe0a6';
    public const LOG_ERROR_SEND_EMAIL_ID = '12e086066892a311b752673a28583d3f';
    public const LOG_SUCCESS_SEND_EMAIL_ID = '6364d3f0f495b6ab9dcf8d3b5c6e0b01';
    public const EMAIL_SYSTEM_REGISTER_ID = 'a68f90e39b72bd6e5b792e6d46977eb2';
    public const EMAIL_PASSWORD_RECOVERY_ID = 'c6a0f1a9b56c0b4c27043a63bf49d2d0';
    public const EMAIL_DELETE_ACCOUNT_ID = 'fc5aff6a21a1f68e61bca99d4064fcf0';
    public const EMAIL_BIRTHDATE_ID = '0e74aee953f468530384b0764242733f';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'subject', 'message'], 'required'],
            [['type'], 'string'],
            [['friendly_id'], 'integer'],
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
            [['created_at', 'deleted_at'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['subject', 'message'], 'string', 'max' => 255],
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
            'subject' => 'Subject',
            'message' => 'Message',
            'type' => 'Type',
            'friendly_id' => 'Friendly ID',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
