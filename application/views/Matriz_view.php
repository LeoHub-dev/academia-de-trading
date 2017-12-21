<!DOCTYPE html>
<html>

<head>
    <?php include_once 'modules/Header.php' ; ?>
    <link href="<?= asset_url(); ?>plugins/treant/Treant.css" rel="stylesheet">
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


            

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       
                        <div class="body">
                            <img src="https://i.imgur.com/eRlY8fH.jpg" class="img-responsive">
                            <div class="chart" id="matriz_nivel_1"></div>
                            <img src="https://i.imgur.com/ngQfoEn.jpg" class="img-responsive">

                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>
    <script src="<?= asset_url(); ?>plugins/treant/raphael.js"></script>
    <script src="<?= asset_url(); ?>plugins/treant/Treant.js"></script>
    <script src="<?= site_url('api/obtener_matriz/'); ?>"></script>

    <script>

    new Treant( chart_config );
        
    </script>
</body>

</html>