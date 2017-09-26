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

                                        <div class="panel panel-col-cyan">
                                            <div class="panel-heading" role="tab" id="headingTwo_19">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="false" aria-controls="collapseTwo_19">
                                                        <i class="material-icons">show_chart</i> Señal 25 Septiembre
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_19">
                                                <div class="panel-body">
                                                    <img src="<?= asset_url(); ?>images/indicios/25sep.jpg" class="img-responsive">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="panel panel-col-cyan">
                                            <div class="panel-heading" role="tab" id="headingOne_19">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                                                        <i class="material-icons">show_chart</i> Señal 19 Septiembre
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_19">
                                                <div class="panel-body text-center">
                                                    <img src="<?= asset_url(); ?>images/indicios/19sep.png" class="img-responsive">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>

</body>

</html>