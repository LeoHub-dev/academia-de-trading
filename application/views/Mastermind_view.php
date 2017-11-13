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
          

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Audios Mastermind</small>
                            </h2>
                           
                        </div>
                        <div class="body">

                            <div class="row container clearfix">

                                <span class="label label-primary">Audio del 11/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1ohjI_SrR8HjRzmkQTX-u7nVwCyIcW_yl" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 12/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1vmnvEIVNyoM2RGC9Uro16MYN_kP1xURt" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 13/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1tG34gQ2aI47CflzjHkDwx347Swy4JAxA" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 16/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1663Av_UWxLxXClkNLvWRMDBwNYzBEOuR" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 18/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=15zwLvsRyQIKIyuU_RqHONuvWG2by35yn" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>


                                <span class="label label-primary">Audio del 19/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1jK_4_Ud58Msy2zugsJ9hjPcru2E47rhS" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 20/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/uc?export=download&id=1d6NdfxP_9DFTf-ns-OReawX0eudi0kgR" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>

                                <span class="label label-primary">Audio del 30/10/2017</span>
                                <hr>
                                <div class="media-wrapper">
                                    <audio id="player2" preload="none" controls style="width:100%;">
                                        <source src="https://drive.google.com/file/d/12DdrcONWKxYAWRt8us5YmpXBC6gQ3OHW/view?usp=sharing" type="audio/mp3">
                                    </audio>
                                </div>

                                <hr>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>

    <link rel="stylesheet" href="<?= asset_url(); ?>player/mediaelementplayer.css">

    <script src="<?= asset_url(); ?>player/mediaelement-and-player.js"></script>

  
</body>

</html>