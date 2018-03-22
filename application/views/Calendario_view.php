<!DOCTYPE html>
<html>
<head>
    <?php include_once 'modules/Header.php'; ?>
</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Cargando...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<?php include_once 'modules/PageNavBar.php'; ?>
<!-- #Top Bar -->
<?php include_once 'modules/PageMenuAndProfile.php'; ?>

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <?php if( $info_usuario['data']->tipo == 6 || $info_usuario['data']->tipo == 5 ) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event_note</i>
                        </div>
                        <div class="content">
                            <div class="text">Ganancia Semanal</div>
                            <div class="number">$ <?=$ganancias['semanal']->cantidad?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event</i>
                        </div>
                        <div class="content">
                            <div class="text">Ganancia Mensual</div>
                            <div class="number">$ <?=$ganancias['mensual']->cantidad?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event_available</i>
                        </div>
                        <div class="content">
                            <div class="text">Ganancia Total</div>
                            <div class="number">$ <?=$ganancias['total']->cantidad?></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($info_usuario['data']->tipo != 5 && $info_usuario['data']->tipo != 6) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="text">Matrices Completadas</div>
                            <div class="number " data-from="0" data-to="<?= count($lista_old_matriz); ?>" data-speed="1"
                                 data-fresh-interval="20"><?= count($lista_old_matriz); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">Aproximado Ganancias</div>
                            <div class="number " data-from="0" data-to="<?= count($lista_old_matriz); ?>" data-speed="1"
                                 data-fresh-interval="20">$ <?= count($lista_old_matriz) * 250; ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row clearfix">
            <?php if ($info_usuario['data']->tipo == 5 && $info_usuario['data']->pago == 1) : ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ganancias Obtenidas
                                <small>Paquete de 1500$</small>
                            </h2>
                        </div>
                        <div class="body">

                            <?php
                            $montoSemestral = 0;
                            foreach ($calendario_pagos as $key => $semanas) { ?>
                                <h5>Mes de <?= getmes($key) ?></h5>
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <!--<td>Semana</td>-->
                                        <td>Lunes</td>
                                        <td>Martes</td>
                                        <td>Miercoles</td>
                                        <td>Jueves</td>
                                        <td>Viernes</td>
                                        <td>Sabado</td>
                                        <td>Domingo</td>
                                        <td>Total Semana</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $montoMesual = 0;
                                    foreach ($semanas as $key => $dias) {
                                        $montoSemanal = calcular_ganancia_mensual($dias);
                                        $montoMesual += $montoSemanal;
                                        ?>
                                        <tr>
                                            <!--<td><?/*=$key*/
                                            ?></td>-->
                                            <td><?= (is_object($dias['lunes'])) ? '<b>' . $dias['lunes']->monto . '$</b>' : '0 $'; ?></td>
                                            <td><?= (is_object($dias['martes'])) ? '<b>' . $dias['martes']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= (is_object($dias['miercoles'])) ? '<b>' . $dias['miercoles']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= (is_object($dias['jueves'])) ? '<b>' . $dias['jueves']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= (is_object($dias['viernes'])) ? '<b>' . $dias['viernes']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= (is_object($dias['sabado'])) ? '<b>' . $dias['sabado']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= (is_object($dias['domingo'])) ? '<b>' . $dias['domingo']->monto . '$</b>' : '0 $</b>'; ?></td>
                                            <td><?= '<b>' . $montoSemanal . '$' . '</b>' ?></td>
                                        </tr>
                                    <?php }
                                    $montoSemestral += $montoMesual;
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7" align="right">Total Mensual</td>
                                        <td><?= '<b>' . $montoMesual . '$' . '</b>' ?></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            <?php } ?>
                            <h3 style="text-align: center">Total Ganancias Generadas: <?= $montoSemestral ?>$</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include_once 'modules/Scripts.php'; ?>
<!-- Jquery DataTable Plugin Js -->
<script src="<?= asset_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('.js-basic-example').DataTable({
            responsive: true
        });

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            "order": [[3, "asc"]],
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
</body>

</html>