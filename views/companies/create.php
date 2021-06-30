<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */

$this->title = Yii::t('app', 'Create Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-user-create">


    <?= $this->render('_form', [
        'model' => $model,
        'company' => $company,
        'phone'=>$phone,
        'address'=>$address
    ]) ?>

</div>
