<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */

$this->title = Yii::t('app', 'Update Auth User: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Users'), 'url' => ['index']];
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
                    <?= $this->render('/sistema/_form', [
                        'model' => $model,
                        'person' => $person,
                        'company' => $company,
                        'phone' => $phone
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
