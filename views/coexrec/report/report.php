<?php require_once 'views/layout/head.php' ?>
<title>Reporte</title>
<nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?=base_url?>"><i class="bi bi-chevron-left"></i></a>
        <a class="navbar-brand ms-4" href="<?=base_url?>">
            <img src="<?=base_url?>views/assets/images/logo/logo.png">
        </a>
    </div>
</nav>

<div class="container">
    <div class="card-header">
        <h3 class="card-title">E.S.E Hospital San Jose De Maicao</h3>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title">Planilla De Recorrido Interno - <?=date('Y-m-d')?></h4>
        </div>
        <div class="card-body">
            <!-- Hoverable rows start -->
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>Radicado</th>
                                            <th>Fecha</th>
                                            <th>Remitente</th>
                                            <th>Recorrido</th>
                                            <th>Dependencia</th>
                                            <th>Nombre y Firma</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while ($r = $reportData->fetch_object()): ?>
                                            <tr>
                                                <td class="text-bold-500">EX-R <?=$r->cod_coexrec?></td>
                                                <td><?=$r->fecha_recepcion?></td>
                                                <td class="text-bold-500"><?=$r->entidad?></td>
                                                <td><?=$r->recorrido?></td>
                                                <th><?=$r->dependencia?></th>
                                                <td></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <div class="card-body">
                                        <div class="col-12 d-flex justify-content-end">
                                            <p>Responsable: <b><?=$_SESSION['nombre']?></b></p>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <p><b>Firma: </b>_____________</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="col-12 d-flex justify-content-end">
                <button type="button" data-bs-toggle="modal" onclick="window.print()" class="btn btn-success me-1 mb-1">Imprimir</button>
            </div>
            <!-- Hoverable rows end -->
        </div>
    </div>
</div>
<?php require_once 'views/layout/footer.php' ?>
