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
                <h2>CLASES</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Clase 1 : </small>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <iframe src="https://player.vimeo.com/video/234070411?title=0&amp;byline=0&amp;portrait=0;autoplay=0" width="100%" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Clase 2 : </small>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <iframe src="https://player.vimeo.com/video/234117054?title=0&amp;byline=0&amp;portrait=0;autoplay=0" width="100%" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Clase 3 : </small>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <iframe src="https://player.vimeo.com/video/234148702?title=0&amp;byline=0&amp;portrait=0;autoplay=0" width="100%" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>


            </div>


            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>
</body>

</html>