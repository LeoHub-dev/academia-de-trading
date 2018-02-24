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
                                        <h2 class="card-inside-title">Wallet Btc</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="wallet_btc" class="form-control" placeholder="Wallet" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Wallet Ltc</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="wallet_ltc" class="form-control" placeholder="Wallet" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-inside-title">Wallet Bth</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">

                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="wallet_bth" class="form-control" placeholder="Wallet" value="">
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
                            <h2>Agrega una matriz personalizada</h2>
                        </div>
                        <div class="body">
                            <form action="<?= site_url('panel/agregarMatrizPersonalizada'); ?>" class="admin-agregar-matriz-especial">
                                <h2 class="card-inside-title">Poner a</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12 ">
                                        <select class="ms" name="id_usuario1" id="id_usuario1" required>
                                            <?php $n = 0; foreach((array) $lista_usuarios_admin['usuario'] as $usuario) : $lista_usuarios_backup[$usuario->id_usuario] = $usuario; ?>
                                            <option value="<?= $usuario->id_usuario; ?>"><?= $usuario->nombre; ?> (<?= $usuario->usuario; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <h2 class="card-inside-title">Debajo de</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12 ">
                                        <select class="ms" name="id_usuario2" id="id_usuario2" required>
                                            <?php $n = 0; foreach((array) $lista_usuarios_admin['usuario'] as $usuario) : $lista_usuarios_backup[$usuario->id_usuario] = $usuario; ?>
                                            <option value="<?= $usuario->id_usuario; ?>"><?= $usuario->nombre; ?> (<?= $usuario->usuario; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Lista ganancias</h2>
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

            

            <div class="row clearfix">
              <?php if(count($lista_pagos_manual_admin_paquete) > 0) { ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2>
                      Pagos Para el Paquete de 1500$
                    </h2>
                    <div class="right col-md-6" style="top: 14px; right: 15px;position: absolute">
                      <form action="<?=site_url('panel/pagoDiario')?>" method="post" name="generarPagoDiario" id="generarPagoDiario">
                        <div class="form-line col-md-4">
                          <input type="text" id="fecha_pago" name="fecha_pago" class="form-control input-sm" placeholder="Fecha"/>
                        </div>
                        <div class="form-line col-md-4">
                          <input type="text" id="monto" name="monto" class="form-control input-sm" placeholder="Monto"/>
                        </div>
                        <input type="submit" class="btn btn-primary" id="btnPagar" value="Enviar Pago Diario"/>
                      </form>
                    </div>
                  </div>
                  <div class="body">
                    <div class="table-responsive">
                      <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <table class="table table-bordered table-striped table-hover dataTable js-pagos-paquete" id="tabla_paquete" role="grid" aria-describedby="DataTables_Table_1_info">
                          <thead>
                          <tr role="row">
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Nombre y Apellido</th>
                            <th>Wallet BTC</th>
                            <th>Wallet LTC</th>
                            <th>Wallet BTH</th>
                            <th align="center">Opci&oacute;n</th>
                          </tr>
                          </thead>
                          <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Nombre y Apellido</th>
                            <th>Wallet BTC</th>
                            <th>Wallet LTC</th>
                            <th>Wallet BTH</th>
                            <th align="center">Opci&oacute;n</th>
                          </tr>
                          </tfoot>
                          <tbody>

                          <?php $n = 0; foreach((array) $lista_pagos_manual_admin_paquete as $pago) : ?>
                            <tr role="row">
                              <td><?=$n?></td>
                              <td><?=$pago->usuario?></td>
                              <td><?=$pago->nombre.' '.$pago->apellido?></td>
                              <td><?=$pago->wallet_btc?></td>
                              <td><?=$pago->wallet_ltc?></td>
                              <td><?=$pago->wallet_bth?></td>
                              <td align="center">
                                <a href="#top" class="btn btn-primary cargar-usuario" id-usuario="<?=$pago->id_persona?>">Buscar usuario</a>
                              </td>
                            </tr>
                            <?php $n++; endforeach; ?>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php if (count($confirmar_pagos_manual_admin_paquete) > 0) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                    <div class="header">
                      <h2> Ganancias Obtenidas Diarias<small>Paquete de 1500$</small></h2>
                    </div>
                      <div class="body">
                        <?php
                          $montoSemestral = 0;
                          foreach ((array) $confirmar_pagos_manual_admin_paquete as $mes => $semanas) { ?>
                            <h5 class="mesh-<?=$mes?>">Mes de <?=getmes($mes)?></h5>
                            <table class="table table-bordered table-striped table-hover dataTable js-confimar-pagos mes-<?=$mes?>" id="confirmar_paquete"
                                   role="grid" aria-describedby="DataTables_Table_1_info">
                              <thead>
                                <tr>
                                  <td>Usuario</td>
                                  <td>Nombre y Apellido</td>
                                  <td>Lunes</td>
                                  <td>Martes</td>
                                  <td>Miercoles</td>
                                  <td>Jueves</td>
                                  <td>Viernes</td>
                                  <td>Sabado</td>
                                  <td>Domingo</td>
                                  <td>Total Semana</td>
                                  <td>Confirmar</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $montoMesual = 0;
                                foreach ((array)$semanas as $sn => $semana) {
                                  foreach ((array)$semana as $key => $dias)
                                  {
                                      $lunes     = (is_object($dias['lunes']))     ? '<b>'.$dias['lunes']->monto.'$</b>'     : '0$';
                                      $martes    = (is_object($dias['martes']))    ? '<b>'.$dias['martes']->monto.'$</b>'    : '0$';
                                      $miercoles = (is_object($dias['miercoles'])) ? '<b>'.$dias['miercoles']->monto.'$</b>' : '0$';
                                      $jueves    = (is_object($dias['jueves']))    ? '<b>'.$dias['jueves']->monto.'$</b>'    : '0$';
                                      $viernes   = (is_object($dias['viernes']))   ? '<b>'.$dias['viernes']->monto.'$</b>'   : '0$';
                                      $sabado    = (is_object($dias['sabado']))    ? '<b>'.$dias['sabado']->monto.'$</b>'    : '0$';
                                      $domingo   = (is_object($dias['domingo']))   ? '<b>'.$dias['domingo']->monto.'$</b>'   : '0$';
                                      $montoSemanal = calcular_ganancia_mensual($dias);
                                      $printdias = obtener_idcomision_pago($dias);
                                      $montoMesual += $montoSemanal;
                                  ?>
                                    <tr id="dl-<?=$dias['user']->id_usuario?>_<?=$sn?>">
                                      <td><?=$dias['user']->usuario?></td>
                                      <td><?=$dias['user']->nombre.' '.$dias['user']->apellido?></td>
                                      <td><?=$lunes?></td>
                                      <td><?=$martes?></td>
                                      <td><?=$miercoles?></td>
                                      <td><?=$jueves?></td>
                                      <td><?=$viernes?></td>
                                      <td><?=$sabado?></td>
                                      <td><?=$domingo?></td>
                                      <td><?='<b>'.$montoSemanal. '$</b>'?></td>
                                      <td>
                                        <form method="post"
                                              name='confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>'
                                              id='confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>'>
                                        <div class="modal fade" id="modal_confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>" tabindex="-1" role="dialog">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Confirmar Pago</h4>
                                              </div>
                                              <div class="modal-body">
                                                <table class="table table-bordered">
                                                  <tr>
                                                    <th>Wallet BTC</th>
                                                    <td><?=$dias['user']->wallet_btc?></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Wallet LTC</th>
                                                    <td><?=$dias['user']->wallet_ltc?></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Wallet BTH</th>
                                                    <td><?=$dias['user']->wallet_bth?></td>
                                                  </tr>
                                                  <tr>
                                                    <th>Monto</th>
                                                    <td><?='<b>'.$montoSemanal. '$</b>'?></td>
                                                  </tr>
                                                </table>
                                                  <input type="hidden" name="id_usuario" value="<?=$dias['user']->id_usuario?>"/>
                                                  <?=$printdias?>
                                              </div>
                                              <div class="modal-footer">
                                                <button mes="<?=$mes?>"
                                                  mns="<?=$montoSemanal?>"
                                                  us="<?=$dias['user']->id_usuario?>_<?=$sn?>"
                                                  fm="confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>"
                                                  md="modal_confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>"
                                                  type="button" class="btn btn-link waves-effect marcar-pagado-paquete">
                                                  Pagado
                                                </button>
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-primary confirmar-pago"
                                           md="modal_confirmar_pago_<?=$dias['user']->id_usuario?>_<?=$sn?>">
                                          Confirmar Pago
                                        </a>
                                      </td>
                                    </tr>
                                <?php $montoSemestral += $montoMesual; }
                                  }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <td colspan="9" align="right">Total Mensual</td>
                                  <td><?='<b class="monto-total-mensual-'.$mes.'">'.$montoMesual.'</b>'?><b>$</b></td>
                                </tr>
                                </tfoot>
                              </table>
                            <?php } ?>
                        </div>
                      </div>
                </div>
              <?php } ?>
            </div>
            <?php endif; ?>

            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Agrega una Señal</h2></div>
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
                            <h2>Lista señales</h2>
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
                            <h2>Editar imagen de calendario</h2>
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
  <?php if(!empty($this->session->flashdata('messages_pagos'))) { ?>
  <script type="text/javascript">
	  $(function() {
	    swal("<?=$this->session->flashdata('messages_pagos')?>", "&nbsp;", "success");
    })
  </script>
  <?php } ?>
<script type="text/javascript">
	$(function() {

     $('a.confirmar-pago').on('click' ,function () {
        var idmodal = $(this).attr("md");

        $('#'+idmodal).modal('show');
     });

	  $("#fecha_pago").datepicker({
	    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	      'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	      'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    dateFormat: 'yy-mm-dd',
	    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	    firstDay: 1,
	    showOtherMonths: true,
	    selectOtherMonths: true,
	    minDate: new Date(2018, 1 - 1, 25),
	    beforeShowDay: function(date) {
	      var day = date.getDay();
	      return [(day != 0 && day != 6)];
	    },
	    maxDate: '0'
	  });

	  $('.js-basic-example').DataTable({
	    responsive: true
	  });

	  //Exportable table
	  $('.js-exportable').DataTable({
	    dom: 'Bfrtip',
	    responsive: true,
	    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	  });

	  //Exportable table
	  $('.js-exportable-usuarios').DataTable({
	      dom: 'Bfrtip',
	      responsive: true,
	      "order": [[ 0, "desc" ]],
	      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
	  });

	  //Exportable table
	  $('.js-ganancias-total').DataTable({
	    dom: 'Bfrtip',
	    responsive: true,
	    "order": [[ 4, "asc" ]],
	    buttons: ['excel', 'pdf', 'print']
	  });

	  $('.js-pagos-paquete').DataTable({
	    dom: 'Bfrtip',
	    responsive: true,
	    "order": [[ 1, "asc" ]],
	    buttons: ['excel', 'pdf', 'print']
	  });

	  $('.js-confimar-pagos').DataTable({
		  dom: 'Bfrtip',
		  responsive: true,
		  "order": [[ 1, "asc" ]],
		  buttons: ['excel', 'pdf', 'print']
	  });

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
	    onSuccess:function(files,data,xhr,pd) {
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
	    deleteCallback: function (data, pd)
	    {
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
});
</script>
</body>
</html>