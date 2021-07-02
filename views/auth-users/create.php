<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */

$this->title = Yii::t('app', 'Create Auth User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-user-create">

    <?php $form = Yii::$app->user->isGuest ? '_form' : '_form_with_menus';  ?>
    <?= $this->render($form, [
        'model' => $model,
        'person' => $person,
        'phone'=>$phone,
        'address'=>$address,
        'currentUser' => $currentUser,
    ]) ?>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $( "#nav-users" ).addClass( " active" );
        $( "#collapseUsers" ).addClass( " show" );
        $( "#cadastrar-usuario" ).addClass( " active" );
    })
</script>