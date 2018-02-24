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
      <div class="block-header"><h2>DASHBOARD</h2></div>

      <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
              <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
              <div class="text">CLASES</div>
              <div class="number count-to" data-from="0" data-to="7" data-speed="15" data-fresh-interval="20">8</div>
            </div>
          </div>
        </div>
          <?php if($info_usuario['data']->pago == 0) : ?>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
              <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                  <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                  <div class="text">REFERIDOS RECOLECTADOS PARA MES GRATIS</div>
                  <div class="number " data-from="0" data-to="<?= $cantidad_referidos; ?>" data-speed="1" data-fresh-interval="20"><?= $cantidad_referidos; ?> / 3</div>
                </div>
              </div>
            </div>

          <?php else: ?>
          <?php if($info_usuario['data']->tipo == 2 || $info_usuario['data']->tipo == 1) : ?>

              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                  <div class="icon">
                    <i class="material-icons">verified_user</i>
                  </div>
                  <div class="content">
                    <div class="text">BIENVENIDO</div>
                    <div class="number " data-speed="1" data-fresh-interval="20">VIP</div>
                  </div>
                </div>
              </div>

              <?php else: ?>

              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                  <div class="icon">
                    <i class="material-icons">access_alarm</i>
                  </div>
                  <div class="content">
                    <div class="text">FECHA FINAL DE MENSUALIDAD</div>
                    <div class="number " data-speed="1" data-fresh-interval="20"><?php
                        $factura_final = new DateTime( $factura->fecha_final, new DateTimeZone(TIMEZONE));
                        echo $factura_final->format("Y-m-d"); ?></div>
                  </div>
                </div>
              </div>

              <?php endif; ?>

          <?php endif; ?>

      </div>

      <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2> Inicio <small>Información general</small></h2>
            </div>
            <div class="body">
              <?php foreach ($info_usuario['data'] as $key => $value): ?>

                <?= ($key == "wallet_btc" && $value == NULL) ? '<div class="alert alert-info"><strong>No</strong> tienes una Wallet BTC asignada en tu perfil <a href="'.site_url('perfil').'" class="alert-link">Click aqui para editar tu perfil</a></div>' : ''; ?>

                <?= ($key == "wallet_ltc" && $value == NULL) ? '<div class="alert alert-info"><strong>No</strong> tienes una Wallet LTH asignada en tu perfil <a href="'.site_url('perfil').'" class="alert-link">Click aqui para editar tu perfil</a></div>' : ''; ?>

              <?php endforeach ?>

              <?php if($info_usuario['data']->pago == 0) : ?>
                <div class="alert alert-danger">
                  Su <strong>cuenta</strong> se encuentra inactiva. Realiza el pago de 40$
                  <a href="<?= site_url('pago'); ?>" class="alert-link">AQUI</a>
                </div>

                <div class="collapse" id="refLink">
                  <div class="well">
                      <?= site_url('api/c/'.$info_usuario['data']->id_usuario); ?>
                  </div>
                </div>
              <?php endif; ?>
              <div class="text-center">
                <img src="<?= asset_url(); ?>images/calendarios/<?= $calendario->imagen; ?>" style="display: initial;" class="img-responsive">
              </div>
            </div>
          </div>
        </div>

        <?php
          if(count($calendario_pagos) > 0) {


        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
                Ganancias Obtenidas Diarias<small>Paquete de 1500$</small>
              </h2>
            </div>
            <div class="body">

                <?php
                $montoSemestral = 0;
                foreach ($calendario_pagos as $key => $semanas) { ?>
                  <h5>Mes de <?=getmes($key)?></h5>
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
                    foreach ($semanas as $key => $dias)
                    {
                        $montoSemanal = calcular_ganancia_mensual($dias);
                        $montoMesual += $montoSemanal;
                        ?>
                      <tr>
                        <!--<td><?/*=$key*/?></td>-->
                        <td><?=(is_object( $dias['lunes'])) ? '<b>'.$dias['lunes']->monto. '$</b>' : '0 $';?></td>
                        <td><?=(is_object( $dias['martes'])) ? '<b>'.$dias['martes']->monto. '$</b>' : '0 $</b>';?></td>
                        <td><?=(is_object( $dias['miercoles'])) ? '<b>'.$dias['miercoles']->monto. '$</b>' : '0 $</b>';?></td>
                        <td><?=(is_object( $dias['jueves'])) ? '<b>'.$dias['jueves']->monto. '$</b>' : '0 $</b>';?></td>
                        <td><?=(is_object( $dias['viernes'])) ? '<b>'.$dias['viernes']->monto. '$</b>' : '0 $</b>'; ?></td>
                        <td><?=(is_object( $dias['sabado'])) ? '<b>'.$dias['sabado']->monto. '$</b>' : '0 $</b>'; ?></td>
                        <td><?=(is_object( $dias['domingo'])) ? '<b>'.$dias['domingo']->monto. '$</b>' : '0 $</b>'; ?></td>
                        <td><?='<b>'.$montoSemanal. '$'.'</b>'?></td>
                      </tr>
                    <?php }
                    $montoSemestral += $montoMesual;
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <td colspan="7" align="right">Total Mensual</td>
                      <td><?='<b>'.$montoMesual. '$'.'</b>'?></td>
                    </tr>
                    </tfoot>
                  </table>
                <?php } ?>
              <h3 style="text-align: center">Total Ganancias Generadas: <?=$montoSemestral?>$</h3>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>
  </section>

<?php include_once 'modules/Scripts.php' ; ?>
<script src="<?= asset_url(); ?>plugins/jquery-countto/jquery.countTo.js"></script>
<script type="text/javascript">
	$(function () {
		//Widgets count
		$('.count-to').countTo();

	});
</script>
</body>

</html>