<?php

namespace app\models;

use app\components\JwtMethods;
use app\helpers\HelperMethods;
use app\interfaces\ModelInterface;
use app\services\systemServices\CreateObjectService;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "Logs".
 *
 * @property string $id
 * @property string $auth_user_id
 * @property string|null $action
 * @property string|null $description
 * @property string|null $model
 * @property string $friendly_id
 * @property string $created_at
 * @property string|null $deleted_at
 */
class Log extends BaseModel 
{
    private $actionsAfterSave= [];
    private $actionsAfterDelete= [];
    private $actionsAfterUpdate = [];
    
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
            [['!friendly_id'], 'default', 'value' => HelperMethods::incrementFriendlyId(static::class)],
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

    public static function prepareParams(string $action, string $model, string $description, AuthUser $authUser = null): array
    {
        $authUser = $authUser?? JwtMethods::getAuthUserFromJwt();

        $description = str_replace("authUserEmail", $authUser->email, $description);
        $params['auth_user_id'] = $authUser->id; 
        $params['description'] = $description;
        $params['model'] = $model;
        $params['action'] = $action;
        
        return $params;
    }

    protected static function getMessageOfChangedAttributes(ModelInterface $model, array $changedAttributes): string
    {
        foreach($changedAttributes as $attribute => $oldAttribute) {

            if($model[$attribute] != $oldAttribute){ 
                $message[] = "Alterou o atributo '".$attribute. "' de '".$oldAttribute. "' para '".$model[$attribute]."'.";
            }
        }

        if(!empty($message)) {
            return json_encode($message);
        }

        return '';
    }

    public static function addLogDelete(object $model, string $class, $typeDelete): void
    {
      $authUser = JwtMethods::getAuthUserFromJwt();
  
      $description = "O usuário de email ".$authUser->email." excluiu o objeto de id:".$model->friendly_id.". Tipo ".$typeDelete." delete.";
  
      $params = Log::prepareParams('delete', $class, $description);
  
      CreateObjectService::createObject(Log::class, $params);
  
    }

    public static function addLogUpdate(ModelInterface $model,  string $class, array $changedAttributes): void
    { 
        $message = static::getMessageOfChangedAttributes($model, $changedAttributes);
        
        if(!empty($message)) {
         
            $description = "O usuário de email authUserEmail alterou o objeto de id:".$model['friendly_id'].". ".$message.".";

            $params = Log::prepareParams('update', $class, $description);

            CreateObjectService::createObject(Log::class, $params);
        }

    }

    public static function addLogCreate(object $model, string $class): void
    {
        $description = "O usuário de email authUserEmail adicionou o objeto de id:".$model->friendly_id.".";

        $params = Log::prepareParams('create',  $class, $description);

        CreateObjectService::createObject(Log::class, $params);
    }

    public static function addLogLogin(object $model, string $class)
    {
        $description = "O usuário de email ".$model->email." logou.";

        $params = Log::prepareParams('login',  $class, $description, $model);

        CreateObjectService::createObject(Log::class, $params);
    }
}
