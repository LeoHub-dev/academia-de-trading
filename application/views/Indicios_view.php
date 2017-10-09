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


            <?php if($info_usuario['data']->pago == 1 || ($tienePase == 1 && $paseTerminado == 0)) : ?>
                <div class="row clearfix center-block">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 center-block" style="float: none">
                        <div class="card">
                            <div class="header text-center">
                                <h2>
                                    SEÑALES Y ALERTAS
                                    <!--<small>Don't use <code>data-parent</code> attributes</small>-->
                                </h2>
                                
                            </div>
                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12" >


                                        <div class="panel-group " id="accordion_19" role="tablist" aria-multiselectable="true">

                                            <?php $n = 0; foreach((array) $lista_indicios as $indicio) : if($indicio->seccion == 2) continue; ?>
                                            <?php  $factura_final = new DateTime($indicio->fecha, new DateTimeZone(TIMEZONE));
                                                setlocale(LC_TIME,"es_ES");
                                                $f = strftime("%d de %B",  $factura_final->getTimestamp());  ?>
                                                <div class="panel panel-col-cyan">
                                                    <div class="panel-heading" role="tab" id="headingTwo_19">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_<?= $n; ?>" aria-expanded="false" aria-controls="collapseTwo_19">
                                                                <i class="material-icons">show_chart</i> Señal <?= $f ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo_<?= $n; ?>" class="panel-collapse collapse <?php if($n == 0) { echo 'in'; } ?>" role="tabpanel" aria-labelledby="headingTwo_19">
                                                        <div class="panel-body">
                                                            <img src="<?= asset_url(); ?>images/indicios/<?= $indicio->imagen; ?>" class="img-responsive">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $n++; endforeach; ?>


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>


                <?php if($tienePase == 0) : ?>


                <div class="row clearfix center-block">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="card">
                            <div class="header text-center">
                                <h2>
                                    PASE TEMPORAL - 7 DIAS
                                </h2>
                                
                            </div>
                            <div class="body">
                                <div class="row clearfix">

                                <a href="<?= site_url('indicios/activar_temporal'); ?>" class="btn btn-primary m-t-15 waves-effect btn-block">ACTIVAR PASE TEMPORAL (7 DIAS)</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php elseif($paseTerminado == 1) : ?>
          
                

                    <div class="row clearfix center-block">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="card">
                                <div class="header text-center">
                                    <h2>
                                        PASE TERMINADO
                                    </h2>
                                    
                                </div>
                                <div class="body">
                                    

                                        <p><span class="font-bold col-pink">TU PASE HA TERMINADO</span> - PUEDES REALIZAR <a href="<?= site_url('pago'); ?>">LA DONACION INICIAL</a> PARA TENER ACCESO A TODAS LAS SEÑALES</p>

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endif; ?>
            

            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>

</body>

</html>