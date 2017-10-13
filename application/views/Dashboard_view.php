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
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">CLASES</div>
                            <div class="number count-to" data-from="0" data-to="7" data-speed="15" data-fresh-interval="20">7</div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                        </div>
                    </div>
                </div>-->


                
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


                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">FECHA FINAL DE MENSUALIDAD</div>
                            <div class="number " data-speed="1" data-fresh-interval="20"><?php 
                            $factura_final = new DateTime( $factura->fecha_inicial, new DateTimeZone(TIMEZONE));
                            echo $factura_final->format("Y-m-d"); ?></div>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

                

            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Inicio <small>Información general</small>
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
                            <?php foreach ($info_usuario['data'] as $key => $value): ?>

                                <?= ($key == "wallet" && $value == NULL) ? '<div class="alert alert-info"><strong>No</strong> tienes una Wallet asignada en tu perfil <a href="'.site_url('perfil').'" class="alert-link">Click aqui para editar tu perfil</a></div>' : ''; ?>
                                
                            <?php endforeach ?>

                            <?php if($info_usuario['data']->pago == 0) : ?>

                                <div class="alert alert-danger">Su <strong>cuenta</strong> se encuentra inactiva. Puede invitar a 3 referidos con <a role="button" data-toggle="collapse" href="#refLink" aria-expanded="true" aria-controls="refLink" class="alert-link">Tu Link de referido</a> o realizar el pago de 20$ <a href="<?= site_url('pago'); ?>" class="alert-link">AQUI</a></div>

                                <div class="collapse" id="refLink">
                                    <div class="well">
                                        <?= site_url('api/c/'.$info_usuario['data']->id_usuario); ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                            <img src="<?= asset_url(); ?>images/academia_calendario.jpg" class="img-responsive">

                        </div>
                    </div>
                </div>
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