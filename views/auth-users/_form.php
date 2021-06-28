<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                            
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>

                            <?= $form->field($person, 'name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>

                            <?= $form->field($person, 'birthday')->textInput(['maxlength' => true, 'id'=> 'myDatepicker']) ?>
                            
                            <?= $form->field($person, 'sex')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino' ], ['maxlength' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-user btn-block']) ?>
                            </div>

                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        <?php ActiveForm::end(); ?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- step 2 -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 
<!-- step 3 -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
 

<script type="text/javascript">

    var options={
            dateFormat: 'dd/mm/yy',
            todayHighlight: true,
            autoclose: true,
        };

    $('#myDatepicker').datepicker(options);

</script>