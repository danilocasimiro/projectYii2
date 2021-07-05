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
                'company' => $company
            ]);?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            
            <?php if(!empty($company->authUserCompany)){
             echo $this->render('_table', [
                 'company' => $company
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

        $( "#nav-employee" ).addClass( " active" );
        $( "#collapseEmployees" ).addClass( " show" );
        $( "#visualizar-employee" ).addClass( " active" );
        
    })
</script>