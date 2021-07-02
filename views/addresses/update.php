<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = Yii::t('app', 'Update Address: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
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
                    'model' => $model
                ]);?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->render('/addresses/_form', [
                        'model' => $model,
                        'address' => $address,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
