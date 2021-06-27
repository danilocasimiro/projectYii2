<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->hiddenInput(['value'=>'7c4a8d09ca3762af61e59520943dc26494f8941b'])->label(false); ?>

    <?= $form->field($model, 'acessToken')->hiddenInput(['value'=>'7c4a8d09ca3762af61e59520943dc26494f8941b'])->label(false); ?>

    <?= $form->field($person, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'sex')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
