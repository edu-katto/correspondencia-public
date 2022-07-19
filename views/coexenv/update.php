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
                        <h3>Actualizar Envio</h3>
                        <p class="text-subtitle text-muted">Actualizar Envio Correspondencia Externa</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="card-title">Remitente</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 class="card-title">Radicado: <?= $result->cod_coexenv ?></h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="card-title">Fecha: <?= $result->fecha_envio ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url?>Coexenv/SaveUpdate" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="hidden" value="<?= $result->cod_coexenv ?>" name="cod_coexenv">
                                        <input type="text" value="<?= $result->nombre_remitente ?>" name="nombre_remitente" class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien envio el paquete</small></p>
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
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Cargo</label>
                                        <input type="text" name="cargo" value="<?= $result->cargo ?>" class="form-control" placeholder="Nombre" required>
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
                                <div class="card">
                                    <h4 class="card-title">Destinatario</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" value="<?= $result->nombre_destinatario ?>" name="nombre_destino" class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Entidad Destino</label>
                                        <input type="text"  name="entidad_destino" value="<?= $result->entidad_destino ?>" class="form-control" placeholder="Entidad Destino" required>
                                        <p><small class="text-muted">Nombre de la entidad que recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Ciudad Departamento</label>
                                        <input type="text" value="<?= $result->ciudad_departamento ?>" name="ciudad_departamento" class="form-control" placeholder="Ciudad Departamento" required>
                                        <p><small class="text-muted">Ciudad Destino</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Método De Envio</label>
                                        <select id="metodoEnvio" name="metodo_envio" class="choices form-select" required>
                                            <?php while($me = $metodoEnvio->fetch_object()): ?>
                                                <option value="<?= $me->cod_metodo_envio ?>" <?= $me->cod_metodo_envio == $result->cod_metodo_envio ? 'selected' : '' ?> ><?= $me->metodo_envio ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="otro_metodo_envio" style="display:<?= empty($result->otro_metodo_envio) ? 'none' : 'block' ?>">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Otro Método De Envio</label>
                                        <input type="text" id="input_otro_metodo_envio" name="otro_metodo_envio" value="<?= $result->otro_metodo_envio ?>" class="form-control" placeholder="Otro Método De Envio">
                                        <p><small class="text-muted">Otro metodo de envio que no aparezca en la lista</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?=base_url?>Coexenv/ListaEnviados" class="btn btn-danger me-1 mb-1">Volver</a>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Envio</button>
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
<script>
    $(document).ready(function () {
        $("#metodoEnvio").on('change',function (){

            var valor = $(this).val();

            if (valor == '3'){
                $("#otro_metodo_envio").css("display", "block");
            }else{
                $("#otro_metodo_envio").css("display", "none");
                $("#input_otro_metodo_envio").val('');

            }
        });
    });
</script>
