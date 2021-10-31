<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="auth-user-update">
    
    <div id="wrapper">
    <!-- Sidebar -->
    <?= $this->render('/sistema/_left_menu');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->render('/sistema/_top_menu', [
                    'model'=>$model,
                    'currentUser'=>$currentUser
                ]);?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container">
                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                        
                                            <?php $form = ActiveForm::begin(); ?>
                                                <h5><strong>Nova pesquisa</strong></h5>
                                            
                                                <div class="form-group row"> 
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                                    </div>                                                 
                                                </div>

                                                <div class="form-group row"> 
                                                    <div class="col-sm-12">
                                                    <?= $form->field($model, 'description')->textArea(['maxlength' => true, 'class' => 'form-control form-control-user']) ?>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <?= Html::submitButton(Yii::t('app', 'Próximo'), ['class' => 'btn btn-primary btn-user btn-block']) ?>
                                                </div>

                                                <hr>
                                                
                                            <?php ActiveForm::end(); ?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
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