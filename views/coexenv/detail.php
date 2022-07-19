<?php require_once 'views/layout/head.php' ?>
<body>
<title>Envio Correspondencia Externa</title>
<div id="app">
    <?php require_once 'views/layout/menu.php' ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Detalle De Envio</h3>
                        <p class="text-subtitle text-muted">Detalle Envio Correspondencia Externa</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Remitente - <?= $result->fecha_envio ?></h4>
                        <h4 class="card-title">Enviado Por: <?= $result->usuario ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url?>Coexenv/Save" id="fromCorrespondencia" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" value="<?= $result->nombre_remitente ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien envio el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Dependencia</label>
                                        <input type="text" value="<?= $result->dependencia ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Dependencia de donde sale el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Cargo</label>
                                        <input type="text" value="<?= $result->cargo ?>" disabled class="form-control" placeholder="cargo" required>
                                        <p><small class="text-muted">Cargo de quien envia el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Tipo Paquete</label>
                                        <input type="text" value="<?= $result->tipo_paquete ?>" disabled class="form-control" placeholder="cargo" required>
                                        <p><small class="text-muted">Tipo del paquete que se envia</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Contenido</label>
                                        <textarea class="form-control" name="contenido" rows="3" disabled required><?= $result->contenido ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <h4 class="card-title">Destinatario</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" value="<?= $result->nombre_destinatario ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Entidad Destino</label>
                                        <input type="text" value="<?= $result->entidad_destino ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Ciudad Departamento</label>
                                        <input type="text" value="<?= $result->ciudad_departamento ?>" disabled class="form-control" placeholder="Ciudad Departamento" required>
                                        <p><small class="text-muted">Ciudad Destino</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Metodo Envio</label>
                                        <input type="text" value="<?= $result->metodo_envio ?>" disabled class="form-control" placeholder="Ciudad Departamento" required>
                                        <p><small class="text-muted">Metodo de envio utilizado</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?=base_url?>Coexenv/RadicadoReport&cod_coexenv=<?= $result->cod_coexenv ?>" class="btn btn-danger me-1 mb-1">Generar Radicado</a>
                                <a href="<?=base_url?>Coexenv/ListaEnviados" class="btn btn-primary me-1 mb-1">Regresar</a>
                            </div>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>
</body>
<?php require_once 'views/layout/footer.php' ?>
