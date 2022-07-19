<?php require_once 'views/layout/head.php' ?>
<body>
<title>Recepción Correspondencia Externa</title>
<div id="app">
    <?php require_once 'views/layout/menu.php' ?>
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Recepción Detalle</h3>
                        <p class="text-subtitle text-muted">Detalle Recepción Correspondencia Externa</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Remitente - <?= $result->fecha_recepcion ?></h4>
                        <h4 class="card-title">Ingreado Por:  <?= $result->usuario ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url?>Coexrec/Save" id="receiveCorrespondencia" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Entidad</label>
                                        <input type="text" value="<?= $result->entidad ?>" disabled class="form-control" name="entidad" placeholder="Entidad" required>
                                        <p><small class="text-muted">Entidad de la cual se mando el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" value="<?= $result->nombre_remitente ?>" disabled name="nombre_remitente" class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien envio el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Cargo</label>
                                        <input type="text" name="cargo_remitente" value="<?= $result->cargo ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Cargo de quien envia el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card">
                                    <h4 class="card-title">Dirigido A</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" name="nombre_dirigido" value="<?= $result->nombre_dirigido ?>" disabled class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Dependencia</label>
                                        <input type="text" name="nombre_dirigido" class="form-control" disabled value="<?= $result->dependencia ?>" placeholder="Dependencia" required>
                                        <p><small class="text-muted">Dependencia de destino</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Tipo De Paquete</label>
                                        <input type="text" value="<?= $result->tipo_paquete ?>" disabled class="form-control" placeholder="Tipo De Paquete" required>
                                        <p><small class="text-muted">Tipo de paquete que se recibio</small></p>
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
                                <div class="col-md-12">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Recorrido</label>
                                        <input type="text" name="nombre_dirigido" value="<?= $result->recorrido ?>" disabled class="form-control" placeholder="Recorrido" required>
                                        <p><small class="text-muted">Horario de entrega</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?=base_url?>Coexrec/RadicadoReport&cod_coexrec=<?= $result->cod_coexrec ?>" class="btn btn-danger me-1 mb-1">Generar Radicado</a>
                                <a href="<?=base_url?>Coexrec/ListaRecibidos" class="btn btn-primary me-1 mb-1">Regresar</a>
                            </div>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>
</body>
<?php require_once 'views/layout/footer.php' ?>
