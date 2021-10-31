<?php

namespace app\modules\v1\controllers;

use Yii;
use app\models\AuthUser;
use app\models\Person;
use app\models\Phone;
use app\models\Address;
use Exception;
use sizeg\jwt\JwtHttpBearerAuth;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\web\Response;

/**
 * AuthUsersController implements the CRUD actions for AuthUser model.
 */
class AuthUsersController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
       
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

    /**
     * Lists all AuthUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $users = null;
        if(Yii::$app->request->get('search') === 'submit'){
            if(!empty(Yii::$app->request->get('input'))){

                $users = AuthUser::find()
                ->innerJoin('people', 'auth_users.id = people.auth_user_id')
                ->where(['like', 'people.name', Yii::$app->request->get('input')])
                ->andWhere(['user_type_id' => 4])
                ->all();

            }else{
                $users = AuthUser::find()->where(['user_type_id' => 4])->all();
            }
            if($users){
              //  Yii::$app->session->setFlash('success', "Busca realizada com sucesso!!!."); 
            }else{
              //  Yii::$app->session->setFlash('error', "Nada foi encontrado!!!."); 

            }
        }
      
        return $this->render('index', [
            'currentUser' => Yii::$app->user->identity,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single AuthUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = AuthUser::find()
        ->where(['auth_users.id' => Yii::$app->request->get('id')])
        ->one();

        if($user->isPerson()) {
            return $user->person;
        } else {
            return $user->company;
        }
    }

    /**
     * Creates a new AuthUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthUser();
        $person = new Person();
        $phone = new Phone();
        $address = new Address();
      
        if ($model->load(Yii::$app->request->post()) && $person->load(Yii::$app->request->post()) && $phone->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
           
           $transaction = Yii::$app->db->beginTransaction();

           try  {
               if ($model->save()) {
                    $person->auth_user_id = $model->id;
                    $phone->auth_user_id = $model->id;
                    $address->auth_user_id = $model->id;
                    if($person->save() && $phone->save() && $address->save()){
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', "Usuário criado com sucesso!!!."); 

                    }else{
                        $transaction->rollBack();
                    }
                   return !Yii::$app->user->isGuest ? $this->redirect(['sistema/index']) : $this->redirect(['auth-users/login']);
               }
           } catch (Exception $e) {
               $transaction->rollBack();
           }

        }

        return $this->render('create', [
            'model' => $model,
            'person' => $person,
            'phone' => $phone,
            'address'=> $address,
            'currentUser' => Yii::$app->user->identity,
        ]);
        
    }

    /**
     * Updates an existing AuthUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id = null)
    {

        $id = AuthUser::verifyAbility(Yii::$app->user, $id);
        
        $model = $this->findModel($id);
        $user = AuthUser::find()->where(['id' => $id])->one();

        $data = isset($model->person) ? $model->person : $model->company;

        if ($model->load(Yii::$app->request->post()) && $data->load(Yii::$app->request->post()) && $model->phone->load(Yii::$app->request->post())) {
            
            $transaction = Yii::$app->db->beginTransaction();

            try  {
                if ($model->save() && $data->save() && $model->phone->save()) {
                    $transaction->commit();
                    return $this->redirect(['sistema/profile']);
                }else{
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        return $this->render('update', [
            'model' => $user,
            'person' => $user->person,
            'company' => $user->company,
            'phone' => $user->phone
        ]);
    }

    /**
     * Deletes an existing AuthUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id = null)
    {

        $user = AuthUser::findOne($id)->delete();

        if($user){
            Yii::$app->session->setFlash('success', "Usuário excluído com sucesso!!!."); 
            return (int)$id === Yii::$app->user->identity->id ? $this->redirect(['site/index']) : $this->redirect(['sistema/index']);
        }else{
            Yii::$app->session->setFlash('error', "User not saved.");
            return $this->redirect(['sistema/index']);
        }
    }

    /**
     * Finds the AuthUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    
     /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $params = \Yii::$app->request->post();
        $user = AuthUser::find()->where(['email' => $params['email'], 'password' => md5($params['password'])])->one();
        /** @var Jwt $jwt */
        if(empty($user)){
            throw new yii\web\BadRequestHttpException(404, 'Email or passwors is incorrects!!!');
        }
        $jwt = Yii::$app->jwt;
        $signer = $jwt->getSigner('HS256');
        $key = $jwt->getKey();
        $time = time();

        $token = $jwt->getBuilder()
            ->issuedBy('http://localhost:4040')// Configures the issuer (iss claim)
            ->permittedFor('http://localhost:3000')// Configures the audience (aud claim)
            ->identifiedBy('4f1g23a12aa', true)// Configures the id (jti claim), replicating as a header item
            ->issuedAt($time)// Configures the time that the token was issue (iat claim)
            ->expiresAt($time + 3600)// Configures the expiration time of the token (exp claim)
            ->withClaim('user', [
                'id'=> $user->id,
                'sub' => $user->email])// Configures a new claim, called "uid"
            ->getToken($signer, $key);

            $jsonToken = $this->asJson([
                'token' => (string)$token,
            ]);
        return $jsonToken;
    }

}
