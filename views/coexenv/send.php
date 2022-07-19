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
                        <h3>Envio</h3>
                        <p class="text-subtitle text-muted">Envio Correspondencia Externa</p>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Remitente</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url?>Coexenv/Save" id="fromCorrespondencia" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Nombre</label>
                                        <input type="text" name="nombre_remitente" class="form-control" placeholder="Nombre" required>
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
                                                <option value="<?= $d->cod_dependencia ?>"><?= $d->dependencia ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Cargo</label>
                                        <input type="text" name="cargo" class="form-control" placeholder="Nombre" required>
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
                                                <option value="<?= $tp->cod_tipo_paquete ?>"><?= $tp->tipo_paquete ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Contenido</label>
                                        <textarea class="form-control" name="contenido" rows="3" required></textarea>
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
                                        <input type="text" name="nombre_destino" class="form-control" placeholder="Nombre" required>
                                        <p><small class="text-muted">Nombre de quien recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Entidad Destino</label>
                                        <input type="text" name="entidad_destino" class="form-control" placeholder="Entidad Destino" required>
                                        <p><small class="text-muted">Nombre de la entidad que recibe el paquete</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Ciudad Departamento</label>
                                        <input type="text" name="ciudad_departamento" class="form-control" placeholder="Ciudad Departamento" required>
                                        <p><small class="text-muted">Ciudad Destino</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Método De Envio</label>
                                        <select name="metodo_envio" id="metodoEnvio" class="choices form-select" required>
                                            <?php while($me = $metodoEnvio->fetch_object()): ?>
                                                <option value="<?= $me->cod_metodo_envio ?>"><?= $me->metodo_envio ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" id="otro_metodo_envio" style="display:none">
                                    <div class="form-group position-relative has-icon-right">
                                        <label for="basicInput">Otro Método De Envio</label>
                                        <input type="text" id="input_otro_metodo_envio" name="otro_metodo_envio" class="form-control" placeholder="Otro Método De Envio">
                                        <p><small class="text-muted">Otro metodo de envio que no aparezca en la lista</small></p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmarks"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Enviar Paquete</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Borrar Formulario</button>
                            </div>
                        </form>
                    </div>
            </section>
        </div>
    </div>
</div>
</body>
<?php require_once 'views/layout/footer.php' ?>
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
