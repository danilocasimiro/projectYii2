<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */

$this->title = Yii::t('app', 'Create Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-user-create">
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
                    'model' => $model
                ]);?>
                
                <?= $this->render('_form', [
                    'model' => $model,
                    'company' => $company,
                    'phone'=>$phone,
                    'address'=>$address
                ]) ?>
            </div>
        </div>
    </div>
</div>

</div>
