<!DOCTYPE html>
<html>

<head>
    <?php include_once 'modules/Header.php' ; ?>
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
    <?php include_once 'modules/PageNavBar.php' ; ?>
    <!-- #Top Bar -->
    <?php include_once 'modules/PageMenuAndProfile.php' ; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="material-icons">home</i> Home
                    </li>
                </ol>
            </div>

            <div class="row clearfix">


            

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="text">Matrices Completadas</div>
                            <div class="number " data-from="0" data-to="<?= count($lista_old_matriz); ?>" data-speed="1" data-fresh-interval="20"><?= count($lista_old_matriz); ?></div>
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
                            <div class="number " data-from="0" data-to="<?= count($lista_old_matriz); ?>" data-speed="1" data-fresh-interval="20">$ <?= count($lista_old_matriz)*250; ?></div>
                        </div>
                    </div>
                </div>

                

                

            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Lista de Ganancias
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

               

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Ganancia</th>
                                            <th>Monto</th>
                                            <th>Pagada</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Ganancia</th>
                                            <th>Monto</th>
                                            <th>Pagada</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $n = 0; foreach((array) $lista_ganancias as $ganancia) : ?>
                                        <tr role="row">
                                            <td><?= $n; ?></td>
                                            <td><?= $ganancia->razon; ?></td>
                                            <td><?= $ganancia->cantidad; ?></td>
                                            <td><?php if($ganancia->pagada == 0) : ?>No<?php else : ?>Si<?php endif; ?></td>
                                        </tr>
                                    <?php $n++; endforeach; ?>

                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            

            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>
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
                "order": [[ 3, "asc" ]],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


</body>

</html>