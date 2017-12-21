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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#circulo1" data-toggle="tab" aria-expanded="true">Circulo 1</a></li>
                                    <li role="presentation" class=""><a href="#circulo2" data-toggle="tab" aria-expanded="false">Circulo 2</a></li>
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
                        <div class="body">
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
                                <div role="tabpanel" class="tab-pane fade active in" id="circulo1">
                                    <p>
                                    <div class="row clearfix text-center">
                                    <?php foreach ((array) $lista_circulo_1 as $cuenta) : ?>
                                        <div class="col-xs-6 col-md-2">
                                            <div class="thumbnail">
                                                <img src="<?= asset_url(); ?>images/perfil/<?= $cuenta->imagen; ?>">
                                                <div class="caption">
                                                    <h3><?= $cuenta->nombre; ?> <?= $cuenta->apellido; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="circulo2">
                                    <p>
                                    <div class="row clearfix text-center">
                                    <?php foreach ((array) $lista_circulo_2 as $cuenta) : ?>
                                        <div class="col-xs-6 col-md-2">
                                            <div class="thumbnail">
                                                <img src="<?= asset_url(); ?>images/perfil/<?= $cuenta->imagen; ?>">
                                                <div class="caption">
                                                    <h3><?= $cuenta->nombre; ?> <?= $cuenta->apellido; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                    </p>
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