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
        'currentUser' => $currentUser,
        'model' => $model
    ]) ?>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $( "#nav-search" ).addClass( " active" );
        $( "#collapseResearches" ).addClass( " show" );
        $( "#cadastrar-pesquisas" ).addClass( " active" );
    })
</script>