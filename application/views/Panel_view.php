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

            <?php if ($info_usuario['data']->id_usuario == 1 || $info_usuario['data']->id_usuario == 100) : ?>

            <div class="row clearfix">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable-usuarios" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Pago/Activo</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Ver</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>Pago/Activo</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Ver</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $n = 0; foreach((array) $lista_usuarios_admin['usuario'] as $usuario) : $lista_usuarios_backup[$usuario->id_usuario] = $usuario; ?>
                                        <tr role="row" class="id-usuario-<?= $usuario->id_usuario; ?>">
                                            <td><?= $usuario->id_usuario; ?></td>
                                            <td><?= $usuario->usuario; ?></td>
                                            <td><?= $usuario->nombre; ?> <?= $usuario->apellido; ?></td>
                                            <td><?= ($usuario->pago == 0) ? "Inactivo" : "Activo"; ?></td>
                                            <td><?= $usuario->fecha_creacion; ?></td>
                                            <td><?php if($usuario->tipo == 1){ echo "Admin"; }else if($usuario->tipo == 2)  { echo "Pago por Vida"; } else if($usuario->pago == 0){ echo "Inactivo"; } else { echo "Mensual"; }?></td>
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
                

                
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Info usuario : <div class="usuario_label">*Seleccione un usuario*</div>
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#perfil" data-toggle="tab" aria-expanded="true">Perfil</a></li>
                                    <li role="presentation"><a href="#opciones" data-toggle="tab" aria-expanded="true">Opciones</a></li>
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

                                <div role="tabpanel" class="tab-pane fade" id="opciones">
                                    
                                    <a href="javascript:void(0)" class="btn btn-primary opcion-id-usuario activar-usuario" id_usuario="0" tipo="1">Activar</a>
                                    <a href="javascript:void(0)" class="btn btn-primary opcion-id-usuario activar-usuario" id_usuario="0" tipo="2">Activar como VIP</a>
                                    <a href="javascript:void(0)" class="btn btn-primary opcion-id-usuario activar-usuario" id_usuario="0" tipo="3">Activar con Matriz</a>
                                    <a href="javascript:void(0)" class="btn btn-primary opcion-id-usuario activar-usuario" id_usuario="0" tipo="4">Activar con Matriz y Residual</a>
                                    
                                
                                </div>
                                
       
                             
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
                                Lista ganancias
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-bordered table-striped table-hover dataTable js-ganancias-total" id="tabla_indicios" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Cantidad</th>
                                            <th>Razon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Cantidad</th>
                                            <th>Razon</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $n = 0; foreach((array) $lista_ganancias_admin as $ganancia) : ?>
                                        <tr role="row">
                                            <td><?= $n; ?></td>
                                            <td><?= $lista_usuarios_backup[$ganancia->id_usuario]->usuario; ?></td>
                                            <td><?= $ganancia->cantidad; ?></td>
                                            <td><?= $ganancia->razon; ?></td>
                                            <td><?php if($ganancia->pagada == 0) { ?><a href="javascript:void(0)" class="btn btn-primary marcar-pagado" id-ganancia="<?= $ganancia->id_ganancia; ?>">Marcar como pagado</a><?php } else { ?> Pagada <?php } ?></td>
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

            <?php endif; ?>

           

            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Agrega una Señal
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?= site_url('panel/agregarIndicio'); ?>" class="admin-agregar-indicio">
   
                                    <h2 class="card-inside-title">Titulo</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Seccion</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12 ">
                                            <select class="ms" name="seccion" required>
                                                <option value="">-- Selecciona un area --</option>
                                                <option value="1">BackOffice</option>
                                                <option value="2">Home</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Fecha</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="card-inside-title">Info Adicional</h2>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="info" class="form-control" placeholder="Info" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <h2 class="card-inside-title">Imagen de la señal</h2>
                                    <div class="row clearfix">
                                        <div class="form-group">
                                            <div class="col-md-12 clearfix">
                                              <label>Agregar imagen</label>
                                              <div id="imageupload">Subir</div>
                                              <input type="hidden" name="imagen" id="image_input" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix"><p class="img_upload_error" style="color: red"></p></div>

                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar</button>

                                </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Lista señales
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-bordered table-striped table-hover dataTable js-ganancias-total" id="tabla_indicios" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Imagen</th>
                                            
                                            <th>Fecha</th>
                                            <th>Seccion</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Titulo</th>
                                            <th>Imagen</th>
                                            
                                            <th>Fecha</th>
                                            <th>Seccion</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $n = 0; foreach((array) $lista_indicios_admin as $indicio) : ?>
                                        <tr role="row">
                                            <td><?= $n; ?></td>
                                            <td><?= $indicio->titulo; ?></td>
                                            <td><a href="<?= asset_url(); ?>images/indicios/<?= $indicio->imagen; ?>" target="_blank">Imagen</a></td>
                                            <td><?= $indicio->fecha; ?></td>
                                            <td><?= ($indicio->seccion == 1) ? "BackOffice": "Home"; ?></td>
                                            <td><a href="javascript:void(0)" class="btn btn-primary eliminar_indicio" data-id="<?= $indicio->id_indicio; ?>">Eliminar</a></td>
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Editar imagen de calendario
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?= site_url('panel/editarCalendario'); ?>" class="admin-editar-calendario">
   
                                    
                                   <h2 class="card-inside-title">Imagen de calendario</h2>
                                    <div class="row clearfix">
                                        <div class="form-group">
                                            <div class="col-md-12 clearfix">
                                              <label>Agregar imagen</label>
                                              <div id="imagecalendario">Subir</div>
                                              <input type="hidden" name="imagen" id="image_calendario" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix"><p class="img_upload_error" style="color: red"></p></div>

                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar</button>

                                </form>
                        </div>
                    </div>
                </div>

                
            </div>

            <?php if ($info_usuario['data']->id_usuario == 1 || $info_usuario['data']->id_usuario == 100) : ?>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pagos por Api
                            </h2>
                            
                        </div>
                        <div class="body">
                             <?php foreach ((array) $lista_pagos_admin as $pago) : ?>
                                    <?php if($pago['pagos'] != NULL) : ?>
                                    <p class="lead">Invoice #<?= $pago['data']->id_invoice; ?></p>
                                    <ul>
                                    <li>Address : <?= $pago['data']->address; ?></li>
                                    <li>Id Usuario : <?= (array_key_exists($pago['data']->id_user, $lista_usuarios_backup)) ? $lista_usuarios_backup[$pago['data']->id_user]->usuario." (".$lista_usuarios_backup[$pago['data']->id_user]->nombre.")" : "Usuario no existente"; ?></li>
                                    <li>Total a pagar : <?= $pago['data']->total_to_pay; ?></li>
                                    </ul>
                                    
                                    <p class="lead">Pago recibidos :</p>
                                    <ol>
                                    <?php foreach ((array) $pago['pagos'] as $pago_recibido) : ?>
                                        <li> Monto : <?= $pago_recibido->amount; ?> btc</li>
                                    <?php endforeach; ?>
                                    </ol>
                                    <hr> 
                                    <?php endif; ?>

                                       
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                
            </div>




            <?php endif; ?>



            
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
            $('.js-exportable-usuarios').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                "order": [[ 0, "desc" ]],
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

    <script>

        $("#imageupload").uploadFile({
          url:"panel/uploadimg/",
          dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
          uploadStr:"Subir",
          fileName:"imgPerfil",
          showPreview:true,
          maxFileCount:1,
          previewHeight: "100px",
          previewWidth: "100px",
          acceptFiles:"image/*",
          showDelete: true,
          deleteCallback: function (data, pd) {
            $("#image_input").val('');
          },
          onSuccess:function(files,data,xhr,pd)
          {

            console.log(data);

            var error = JSON.parse(data);
            console.log(error);

            if(error.error)
            {

                $(".img_upload_error").html(error.error)
            }
            else
            {
                var img = JSON.parse(data);
                $(".img_upload_error").html("");
                $("#image_input").val(img);
                //$(".imagen_perfil").attr('src','<?= asset_url(); ?>images/perfil/'+img);
            }
            

            
          }
        });

        $("#imagecalendario").uploadFile({
          url:"panel/uploadcalendario/",
          dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
          uploadStr:"Subir",
          fileName:"imgCalendario",
          showPreview:true,
          maxFileCount:1,
          previewHeight: "100px",
          previewWidth: "100px",
          acceptFiles:"image/*",
          showDelete: true,
          deleteCallback: function (data, pd) {
            $("#image_calendario").val('');
          },
          onSuccess:function(files,data,xhr,pd)
          {

            console.log(data);

            var error = JSON.parse(data);
            console.log(error);

            if(error.error)
            {

                $(".img_upload_error").html(error.error)
            }
            else
            {
                var img = JSON.parse(data);
                $(".img_upload_error").html("");
                $("#image_calendario").val(img);
                //$(".imagen_perfil").attr('src','<?= asset_url(); ?>images/perfil/'+img);
            }
            

            
          }
        });
      </script>


</body>

</html>