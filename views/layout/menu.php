<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url ?>"><img src="<?=base_url?>views/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <!-- <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li> -->

                <li class="sidebar-title">Correspondencia Externa</li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-archive-fill"></i>
                        <span>Enviar</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="<?=base_url?>Coexenv/ListaEnviados">Listado Envios</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?=base_url?>Coexenv/Envio">Registrar envios</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-archive-fill"></i>
                        <span>Recibir</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="<?=base_url?>Coexrec/ListaRecibidos">Lista Recibidos</a>
                        </li>
                        <li class="submenu-item">
                            <a href="<?=base_url?>Coexrec/Recibir">Registrar Recepción</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<div id="main" class='layout-navbar'>
    <header class='mb-3'>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"></ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600"><?=$_SESSION['nombre']?></h6>
                                    <p class="mb-0 text-sm text-gray-600"><?= $_SESSION['rol'] == 1 ? 'Administrador' : 'Usuario' ?></p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?=base_url?>views/assets/images/faces/1.png">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="<?= base_url?>User/Logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>