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


            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Lista de Usuarios
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
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Mineria</th>
                                        <th>Pago/Activo</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Mineria</th>
                                        <th>Pago/Activo</th>
                                        <th>Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                <?php $n = 0; foreach((array) $lista_usuarios_admin['usuario'] as $usuario) : ?>
                                    <tr role="row" class="id-usuario-<?= $usuario->id_usuario; ?>">
                                        <td><?= $usuario->id_usuario; ?></td>
                                        <td><?= $usuario->usuario; ?></td>
                                        <td><?= $usuario->nombre; ?> <?= $usuario->apellido; ?></td>
                                        <td><?= ($usuario->mineria == 0) ? "Activo" : "Inactivo"; ?></td>
                                        <td><?= ($usuario->pago == 0) ? "Inactivo" : "Activo"; ?></td>
                                        <td><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float cargar-usuario" id-usuario="<?= $usuario->id_usuario; ?>"><i class="material-icons">search</i></button></td>
                                    </tr>
                                <?php $n++; endforeach; ?>

                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            Info usuario : <div class="usuario_label">*Seleccione un usuario*</div>
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#perfil" data-toggle="tab" aria-expanded="true">Perfil</a></li>
                                <li role="presentation"><a href="#ganancias_pagar" data-toggle="tab" aria-expanded="true">Ganancias por pagar</a></li>
                                <li role="presentation"><a href="#ganancias_pagadas" data-toggle="tab" aria-expanded="false">Ganancias Pagadas</a></li>
                                <li role="presentation"><a href="#ganancias_total" data-toggle="tab" aria-expanded="false">Todas las Ganancias</a></li>
                                <li role="presentation"><a href="#circulo1" data-toggle="tab" aria-expanded="false">Circulo 1</a></li>
                                <li role="presentation"><a href="#circulo2" data-toggle="tab" aria-expanded="false">Circulo 2</a></li>
                            </ul>
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
                    <div class="body" id="usuario-info-container" style="display: none">
                        <div class="loader-container text-center">
                            <div class="icon">
                                <div class="preloader">
                                    <div class="spinner-layer pl-black">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="title">Cargando</div>
                        </div>
                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="perfil">
                                <form action="<?= site_url('panel/editar_usuario'); ?>" class="admin-editar-usuario">
                                    <input type="hidden" name="id_usuario" class="form-control" value="">
                                    <input type="hidden" name="usuario_default" class="form-control" value="">
                                    <h2 class="card-inside-title">Usuario</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Password</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Nombre</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Apellido</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Email</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="email" class="form-control" placeholder="Email" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Referido</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="referido" class="form-control" placeholder="Referido" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Wallet</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="wallet" class="form-control" placeholder="Wallet" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<h2 class="card-inside-title">Imagen de perfil</h2>
                                    <div class="row clearfix">
                                        <div class="form-group">
                                            <div class="col-md-12 clearfix">
                                              <label>Editar imagen de perfil</label>
                                              <div id="imageupload">Subir</div>
                                              <input type="hidden" name="image" id="image_input" value="" required>
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="row clearfix"><p class="img_upload_error" style="color: red"></p></div>

                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Editar</button>

                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="ganancias_pagar">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <table class="table table-bordered table-striped table-hover dataTable tabla-ganancias" id="tabla_ganancias_pagar" role="grid" aria-describedby="DataTables_Table_1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                        

                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="ganancias_pagadas">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <table class="table table-bordered table-striped table-hover dataTable tabla-ganancias" id="tabla_ganancias_pagadas" role="grid" aria-describedby="DataTables_Table_1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                              
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                  
                                            </tr>
                                        </tfoot>
                                        <tbody>


                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="ganancias_total">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <table class="table table-bordered table-striped table-hover dataTable tabla-ganancias" id="tabla_ganancias_total" role="grid" aria-describedby="DataTables_Table_1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Razon Ganancia</th>
                                                <th>Monto</th>
                                                <th>Pagar</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                            

                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="circulo1">
                                <p>
                                <div class="row clearfix text-center" id="lista_circulo_1">
                                
                                </div>
                                </p>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="circulo2">
                                <p>
                                <div class="row clearfix text-center" id="lista_circulo_2">
   
                                </div>
                                </p>
                            </div>
   
                         
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
                                <table class="table table-bordered table-striped table-hover dataTable js-ganancias-total" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Razon Ganancia</th>
                                            <th>Monto</th>
                                            <th>Pagar</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Razon Ganancia</th>
                                            <th>Monto</th>
                                            <th>Pagar</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $n = 0; foreach((array) $lista_ganancias_admin as $ganancia) : ?>
                                        <tr role="row">
                                            <td><?= $n; ?></td>
                                            <td><?= ($ganancia->id_matriz != 0) ? $lista_usuarios_admin['matriz'][$ganancia->id_matriz]->usuario : "Sistema"; ?></td>
                                            <td><?= $ganancia->razon; ?></td>
                                            <td><?= $ganancia->monto; ?></td>
                                            <td class="pagar-td-<?= $ganancia->id_ganancia; ?>"><?php if($ganancia->pagada == 0) : ?><button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float marcar-pagado" id-ganancia="<?= $ganancia->id_ganancia; ?>"><i class="material-icons">done</i></button><?php else : ?>Pagada<?php endif; ?></td>
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
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>\
    <script src="<?= asset_url(); ?>js/panel.js"></script>

    <script type="text/javascript">
        $(function () {
            $('.js-basic-example').DataTable({
                responsive: true
            });

            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            //Exportable table
            $('.js-ganancias-total').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                "order": [[ 4, "asc" ]],
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });

            
        });
    </script>


</body>

</html>