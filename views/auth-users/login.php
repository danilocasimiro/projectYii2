<?php 

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Bem vindo de volta!</h1>
                        </div>
                        <?php $form = ActiveForm::begin() ?>
                            
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'form-control form-control-user', 'placeholder' => 'Enter Email Address...']) ?>

                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-user', 'placeholder' => 'Password']) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                          
                            <div class="form-group">
                                <div>
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                            </a>
                            <?php ActiveForm::end(); ?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="create">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>