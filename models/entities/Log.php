<?php

namespace app\models\entities;

use app\components\jwt\JwtMethods;
use app\helpers\HelperMethods;
use app\models\entities\interfaces\EntitiesInterface;
use app\useCases\systemServices\CreateObjectService;
use app\useCases\systemServices\GetObjectService;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "Logs".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string|null $action
 * @property string|null $description
 * @property string|null $model
 * @property string $level
 * @property string $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 */
class Log extends BaseModel
{
    public const LEVEL_INFO = 'Info';
    public const LEVEL_WARNING = 'Warning';
    public const LEVEL_DANGER = 'Danger';
    public const LEVEL_SUCCESS = 'Success';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => md5(uniqid(rand(), true))],
            [['id', 'auth_user_id'], 'required'],
            [['created_at', 'deleted_at'], 'safe'],
            [['id', 'auth_user_id'], 'string', 'max' => 32],
            [['action'], 'string', 'max' => 40],
            ['level', 'in', 'range' => [self::LEVEL_INFO, self::LEVEL_WARNING, self::LEVEL_DANGER, self::LEVEL_SUCCESS]],
            [['!friendly_id'], 'default', 'value' => $this->incrementFriendlyId()],
            [['description'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthUser::class, 'targetAttribute' => ['auth_user_id' => 'id']],
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
            'action' => 'Action',
            'description' => 'Description',
            'model' => 'Model',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public static function relations(): array
    {
        return [
            'authUsers' => AuthUser::class
        ];
    }

    public function getAuthUsers(): ActiveQuery
    {
        return $this->hasMany(AuthUser::class, ['role_id' => 'id']);
    }

    public static function prepareParams(string $action, string $model, string $description, string $level, AuthUser $authUser = null): array
    {
        $params['auth_user_id'] = $authUser->id;
        $params['description'] = $description;
        $params['model'] = $model;
        $params['action'] = $action;
        $params['level'] = $level;

        return $params;
    }

    protected static function getMessageOfChangedAttributes(EntitiesInterface $model, array $changedAttributes): string
    {
        foreach ($changedAttributes as $attribute => $oldAttribute) {

            if ($model[$attribute] != $oldAttribute) {
                $message[] = "Alterou o atributo '" . $attribute . "' de '" . $oldAttribute . "' para '" . $model[$attribute] . "' no object: " . $model['friendly_id'] . ".";
            }
        }

        if (!empty($message)) {
            return json_encode($message);
        }

        return '';
    }

    public static function addLogDelete(object $model, string $class, $typeDelete): void
    {
        $authUser = JwtMethods::getAuthUserFromJwt();

        $systemMessage = GetObjectService::getObject(SystemMessage::class, SystemMessage::LOG_DELETE_ID)->one();

        $initialMessage = str_replace("current_user_email", $authUser->email, $systemMessage->message);

        $description = $initialMessage . " Um model de id: " . $model->friendly_id . ". Delete do tipo " . $typeDelete;

        $params = Log::prepareParams('delete',  $class, $description, static::LEVEL_SUCCESS, $authUser);

        CreateObjectService::createObject(Log::class, $params);
    }

    public static function addLogUpdate(EntitiesInterface $model,  string $class, array $changedAttributes): void
    {
        $authUser = JwtMethods::getAuthUserFromJwt();

        $messageChangedAttributes = static::getMessageOfChangedAttributes($model, $changedAttributes);

        if (!empty($messageChangedAttributes)) {

            $systemMessage = GetObjectService::getObject(SystemMessage::class, SystemMessage::LOG_UPDATE_ID)->one();

            $initialMessage = str_replace("current_user_email", $authUser->email, $systemMessage->message);

            $description = $initialMessage . " " . $messageChangedAttributes;

            $params = Log::prepareParams('update',  $class, $description, static::LEVEL_WARNING, $authUser);

            CreateObjectService::createObject(Log::class, $params);
        }
    }

    public static function addLogCreate(EntitiesInterface $model, string $class): void
    {
        $authUser = JwtMethods::getAuthUserFromJwt();

        $systemMessage = GetObjectService::getObject(SystemMessage::class, SystemMessage::LOG_CREATE_ID)->one();

        $description = str_replace("current_user_email", $authUser->email, $systemMessage->message);

        $description = $description . " Um model de id: " . $model->friendly_id . ".";

        $params = Log::prepareParams('create',  $class, $description, static::LEVEL_SUCCESS, $authUser);

        CreateObjectService::createObject(Log::class, $params);
    }

    public static function addLogLogin(AuthUser $model, string $class): void
    {
        $systemMessage = GetObjectService::getObject(SystemMessage::class, SystemMessage::LOG_LOGIN_ID)->one();

        $description = str_replace("current_user_email", $model->email, $systemMessage->message);

        $params = static::prepareParams('Login', $class, $description, static::LEVEL_INFO, $model);

        CreateObjectService::createObject(Log::class, $params);
    }

    public static function addLogSendEmail(EntitiesInterface $model, string $class, $typeMessageId)
    {
        $authUser = JwtMethods::getAuthUserFromJwt();

        $systemMessage = GetObjectService::getObject(SystemMessage::class, $typeMessageId)->one();

        $description = str_replace("receiver_email", $model->email, $systemMessage->message);

        $params = Log::prepareParams('Email',  $class, $description, $systemMessage->subject, $authUser);

        CreateObjectService::createObject(Log::class, $params);
    }
}
