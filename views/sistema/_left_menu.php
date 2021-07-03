<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/sistema/index">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/sistema/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" id='nav-search'>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-search-plus"></i>
            <span>Pesquisas</span>
        </a>
        <?php if(Yii::$app->user->identity->userType->type === 'Usuário'){ ?>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Disponíveis</a>
                <a class="collapse-item" href="cards.html">Realizadas</a>
                <a class="collapse-item" href="cards.html">Finalizadas</a>
            </div>
        </div>
        <?php }else{ ?>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <?php if(Yii::$app->user->identity->userType->type === 'Empresa'){ ?>
                    <a class="collapse-item" href="buttons.html">Criar</a>
                    <a class="collapse-item" href="cards.html">Editar</a>
                <?php } ?>
                <a class="collapse-item" href="cards.html">Visualizar</a>
            </div>
        </div>
        <?php } ?>
    </li>

    <?php if(Yii::$app->user->identity->userType->type === 'Admin'){ ?>
    <li class="nav-item" id='nav-company'>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompanies"
            aria-expanded="true" aria-controls="collapseCompanies">
            <i class="fas fa-building"></i>
            <span>Empresas</span>
        </a>
        <div id="collapseCompanies" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" id="cadastrar-empresa" href="/companies/create">Cadastrar</a>
                <a class="collapse-item" id="visualizar-empresa" href="/companies/index">Visualizar</a>
            </div>
        </div>
    </li>
    <li class="nav-item" id='nav-users'>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-building"></i>
            <span>Usuários</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" id="visualizar-usuario" href="/auth-users/index">Visualizar</a>
            </div>
        </div>
    </li>
    <?php } 
        if(Yii::$app->user->identity->userType->type === 'Empresa'){
    ?>
    <li class="nav-item" id='nav-employee'>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployees"
            aria-expanded="true" aria-controls="collapseEmployees">
            <i class="fas fa-fw fa-user"></i>
            <span>Funcionários</span>
        </a>
        <div id="collapseEmployees" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" id="cadastrar-usuario" href="/auth-users/create">Cadastrar</a>
                <a class="collapse-item" href="utilities-animation.html">Visualizar</a>
            </div>
        </div>
    </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="../img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
