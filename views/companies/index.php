<?php 

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
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
                'currentUser' => $currentUser,
                'model' => $companies
            ]);?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php $form = ActiveForm::begin([
                            'action' => ['index'],
                            'method' => 'post',
                ]); ?>
                <div class="input-group col-lg-3">
                    <div class="col-md-10 col-lg-10 col-xs-10">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nome empresa" name="input"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-2">
                        <button type="submit" class="btn btn-primary" name="search" value="submit">Buscar</button>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <?php if(!empty($companies)){
             echo $this->render('_table', [
                 'companies' => $companies
             ]); } ?>
        </div>
    </div>
</div>
           
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $( "#nav-company" ).addClass( " active" );
        $( "#collapseCompanies" ).addClass( " show" );
        $( "#visualizar-empresa" ).addClass( " active" );
        
    })
</script>