<?php 

use yii\helpers\Html;
?>
<br/>
    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Empresas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Funcionários</th>
                        <th>Pesquisas</th>
                        <th>Perfil</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($companies as $company) { ?>

                        <tr>
                            <td><?= $company->name ?></td>
                            <td><?= $company->authUser->email ?></td>
                            <td><?= Html::a('<i class="fa fa-bars"></i>',['site/signup'], ['class' => 'btn btn-black', 'title' => 'Visualizar']) ?></td>
                            <td><?= Html::a('<i class="fa fa-bars"></i>',['site/signup'], ['class' => 'btn btn-black', 'title' => 'Visualizar']) ?></td>
                            <td><?= Html::a('<i class="fa fa-bars"></i>',['sistema/profile?id='.$company->authUser->id], ['class' => 'btn btn-black', 'title' => 'Perfil', 'data' => [
                                    'method' => 'get',
                                    'params' => ['id' => $company->authUser->id],
                                ],]) ?></td>
                            <td><?= Html::a('<i class="fa fa-trash"></i>',['/auth/users/delete', 'id' => $company->authUser->id], ['class' => 'btn btn-black', 'title' => 'Perfil', 'data' => [
                                    'method' => 'post',
                                    'confirm' => Yii::t('app', 'Are you sure you want to delete your account?'),
                                ],]) ?></td>
                        </tr>
                        
                    <?php }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>