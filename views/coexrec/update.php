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
                        <h3>Actualizar Recepción</h3>
                        <p class="text-subtitle text-muted">Actualizar Recepción Correspondencia Externa</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Remitente</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url?>Coexrec/SaveUpdate" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Entidad</label>
                                        <input type="hidden" value="<?= $result->cod_coexrec ?>" class="form-control" name="cod_coexrec">
                                        <input type="text" value="<?= $result->entidad ?>" class="form-control" name="entidad" placeholder="Entidad" required>
                                        <p><small class="text-muted">Entidad de la cual se mando el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" value="<?= $result->nombre_remitente ?>" name="nombre_remitente" class="form-control" placeholder="Nombre" required>
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
                                        <input type="text" value="<?= $result->cargo ?>" name="cargo_remitente" class="form-control" placeholder="Nombre" required>
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
                                        <input type="text" value="<?= $result->nombre_dirigido ?>" name="nombre_dirigido" class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Dependencia</label>
                                        <select name="dependencia" class="choices form-select" required>
                                            <?php while($d = $dependencia->fetch_object()): ?>
                                                <option value="<?= $d->cod_dependencia ?>" <?= $d->cod_dependencia == $result->cod_dependencia ? 'selected' : '' ?> ><?= $d->dependencia ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tipo De Paquete</label>
                                        <select name="tipo_paquete" class="choices form-select" required>
                                            <?php while($tp = $tipoPaquete->fetch_object()): ?>
                                                <option value="<?= $tp->cod_tipo_paquete ?>" <?= $tp->cod_tipo_paquete == $result->cod_tipo_paquete ? 'selected' : '' ?> ><?= $tp->tipo_paquete ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Contenido</label>
                                        <textarea class="form-control" name="contenido" rows="3" required><?= $result->contenido ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Recorrido</label>
                                        <select name="recorrido" class="choices form-select" required>
                                            <?php while($r = $recorrido->fetch_object()): ?>
                                                <option value="<?= $r->cod_recorrido ?>" <?= $r->cod_recorrido == $result->cod_recorrido ? 'selected' : '' ?> ><?= $r->recorrido ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?=base_url?>Coexrec/ListaRecibidos" class="btn btn-danger me-1 mb-1">Volver</a>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Paquete</button>
                            </div>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>
</body>
<?php require_once 'views/layout/footer.php' ?>
<?php if (!empty($_SESSION['message'])): ?>
    <script>
        Swal.fire({
            title: "<?=$_SESSION['message'][0]?>",
            text: "<?=$_SESSION['message'][1]?>",
            icon: "<?=$_SESSION['message'][2]?>"
        })
    </script>
<?php endif; unset($_SESSION['message']); ?>