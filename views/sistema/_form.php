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
                <div class="col-lg-12">
                    <div class="p-5">
                       
                        <?php $form = ActiveForm::begin(); ?>
                            <h5><strong>Dados de acesso</strong></h5>
                           
                            <div class="form-group row"> 
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control form-control-user', 'value' => '']) ?>
                                </div>
                            </div>
                            <?php if(isset($person)) { ?>
                            <h5><strong>Dados pessoais</strong></h5>
                            <div class="form-group row"> 
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <?= $form->field($person, 'name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                </div>
                                <div class="col-sm-6">
                                <?= $form->field($person, 'genre')->dropDownList(['M' => 'Masculino', 'F' => 'Feminino' ], ['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="form-group row"> 
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <?= $form->field($phone, 'ddd');
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($phone, 'number');
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($person, 'birthdate')->textInput(['maxlength' => true, 'id'=> 'myDatepicker', 'value' => Yii::$app->formatter->format($person->birthdate, 'date')]) ?>
                                </div>
                            </div>
                            <?php }else{ ?>
                            <h5><strong>Dados empresariais</strong></h5>
                        
                            <div class="form-group row"> 
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <?= $form->field($company, 'name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                </div>
                                <div class="col-sm-6">
                                <?= $form->field($company, 'cnpj')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                </div>
                            </div>
                            <div class="form-group row"> 
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <?= $form->field($phone, 'ddd');
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($phone, 'number');
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($company, 'foundation')->textInput(['maxlength' => true, 'id'=> 'myDatepicker', 'value' => Yii::$app->formatter->format($company->foundation, 'date')]) ?>
                                </div>
                            </div>
                                <?php } ?>
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'Salvar'), ['class' => 'btn btn-primary btn-user btn-block']) ?>
                            </div>

                            <hr>
                            
                        <?php ActiveForm::end(); ?>
                       
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