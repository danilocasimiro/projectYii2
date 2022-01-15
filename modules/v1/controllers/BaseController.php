<?php

namespace app\modules\v1\controllers;

use app\useCases\systemServices\{ CreateBatchObjectsService, GetObjectService};
use app\interfaces\ModelInterface;
use app\traits\{
    ActionCreateDefaultTrait, 
    ActionDeleteDefaultTrait, 
    ActionIndexDefaultTrait, 
    ActionUpdateDefaultTrait, 
    ActionViewDefaultTrait
};
use app\useCases\doActionsUseCases\{AfterCreateUseCase};
use Yii;
use yii\web\BadRequestHttpException;

class BaseController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $bodyParams = [];

    /**@var ModelInterface */
    public $getObject;

    use ActionCreateDefaultTrait;
    use ActionUpdateDefaultTrait;
    use ActionDeleteDefaultTrait;
    use ActionViewDefaultTrait;
    use ActionIndexDefaultTrait;

    /**
     * @inheritdoc
     */
    public function behaviors() {
      
        $behaviors['authenticator'] = [
            'class' => \sizeg\jwt\JwtHttpBearerAuth::class,
            'except' => [
                'options'
            ]
        ];

         $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]
        ];
  
      return $behaviors;
    }

    public function actionOptions()
    {
        return true;
    }

    public function beforeAction($action)
    {
        $this->bodyParams = Yii::$app->request->getBodyParams();

        if($action->id === 'create-batch' && empty($this->bodyParams['objects'])) {
    
            throw new BadRequestHttpException("The params 'objects' is mandatory.");
            
        }

        if(in_array($action->id, ['view', 'delete', 'update'])) {

            $this->getObject();
          
        }

        return parent::beforeAction($action);
    }

    private function getObject()
    {
        $id = Yii::$app->request->get('id');
        $object = GetObjectService::getObject($this->modelClass, $id)->one();

        if(!$object) {
            throw new BadRequestHttpException("Object id: ".$id." not found");
        }

        $this->getObject = $object;
    }
}
