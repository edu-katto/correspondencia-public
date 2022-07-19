<?php require_once 'views/layout/head.php' ?>
    <body>
    <title>Listado Envios</title>
    <div id="app">
        <?php require_once 'views/layout/menu.php'?>
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Lista Enviados</h3>
                            <p class="text-subtitle text-muted">Encontrara todos los paquetes enviados</p>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Información Enviados
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                <tr>
                                    <th>Radicado</th>
                                    <th>Dependencia</th>
                                    <th>Nombre Remitente</th>
                                    <th>Tipo Paquete</th>
                                    <th>Entidad Destino</th>
                                    <th>Fecha Envio</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while($e = $enviados->fetch_object()): ?>
                                    <tr>
                                        <td><?= $e->cod_coexenv ?></td>
                                        <td><?= $e->dependencia ?></td>
                                        <td><?= $e->nombre_remitente ?></td>
                                        <td><?= $e->tipo_paquete ?></td>
                                        <td><?= $e->entidad_destino ?></td>
                                        <td><?= $e->fecha_envio ?></td>
                                        <td>
                                            <a href="<?=base_url?>Coexenv/Detalle&cod_coexenv=<?= $e->cod_coexenv ?>" class="badge bg-success"><i class="fas fa-eye"></i></a>
                                            <a href="<?=base_url?>Coexenv/RadicadoReport&cod_coexenv=<?= $e->cod_coexenv ?>" class="badge bg-danger"><i class="fas fa-file-pdf"></i></a>
                                            <a href="<?=base_url?>Coexenv/Update&cod_coexenv=<?= $e->cod_coexenv ?>" class="badge bg-warning"><i class="fas fa-sync-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Reportes</h3>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-primary me-1 mb-1">Generar Consolidado</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- Modal -->
        <div class="card-body">
            <!-- Vertically Centered modal Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered"
                     role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Consolidado</h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="<?=base_url?>Coexenv/ConsolidadoReport">
                            <div class="modal-body">
                                <p>Dijita las fechas para generar consolidado.</p>
                                <div id="firstRadicado">
                                    <div class="radicado">
                                        <label>Fecha Inicio</label>
                                        <div class="form-group">
                                            <input type="date" name="fecha_inicio" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="radicado">
                                        <label>Fecha Fin</label>
                                        <div class="form-group">
                                            <input type="date" name="fecha_fin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Cerrar</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Generar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin Modal -->
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
