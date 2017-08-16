<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Step In - Step Foward In Life">
    <meta name="author" content="Step In - Step Foward In Life">
    <title>Step In - Step Forward In Life</title>
    <!-- core CSS -->
    <link href="<?= asset_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/animate.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/owl.transitions.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/main.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/responsive.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/button.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/floating-action-button.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/google-icons.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/typography.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/flag-icon.min.css" rel="stylesheet">
    <!-- Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?= asset_url(); ?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= asset_url(); ?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= asset_url(); ?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= asset_url(); ?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= asset_url(); ?>images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<div id="preloader">
  <div id="load"></div>
</div>

<div class="float-button-right">
    <div class="menu pmd-floating-action" role="navigation"> 

        <?php if($site_lang == "spanish") : ?>
        <a href="<?= site_url('home/setlang/english').'?gob='.base_url(uri_string()); ?>" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="English"> 
            <span class="flag-icon flag-icon-us"></span>
        </a> 
        <a href="javascript:void(0);" class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="<?= lang('language'); ?>"> 
            <span class="flag-icon flag-icon-es"></span> 
        </a> 
    <?php else : ?> 

        <a href="<?= site_url('home/setlang/spanish').'?gob='.base_url(uri_string()); ?>" class="pmd-floating-action-btn btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-default" data-title="Español"> 
            <span class="flag-icon flag-icon-es"></span>
        </a> 
        <a href="javascript:void(0);" class="pmd-floating-action-btn btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-primary" data-title="<?= lang('language'); ?>"> 
            <span class="flag-icon flag-icon-us"></span> 
        </a> 


     <?php endif; ?>
    </div>
</div>

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?= asset_url(); ?>images/logo.png" class="img-responsive" width="169px" alt="logo"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home"><?= lang('title_about'); ?></a></li>
                        <li class="scroll"><a href="#services"><?= lang('title_plan'); ?></a></li>
                        <li class="scroll"><a href="#animated-number"><?= lang('title_donations'); ?></a></li>
                        <li><a href="<?= site_url('auth'); ?>"><?= lang('login'); ?></a></li>
                        <li><a href="<?= site_url('auth'); ?>"><?= lang('register'); ?></a></li>
              
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(<?= asset_url(); ?>images/slider/grupoadm.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Step In</span> Step forward in life.</h2>
                                    <p> </p>
                                    <a class="btn btn-primary btn-lg" href="#">Ir a los cursos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(<?= asset_url(); ?>images/slider/bg2.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Step In</span> Step forward in life.</h2>
                                    <p> </p>
                                    <a class="btn btn-primary btn-lg" href="#">Ir a los cursos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(<?= asset_url(); ?>images/slider/bg1.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2><span>Step In</span> Step forward in life.</h2>
                                    <p> </p>
                                    <a class="btn btn-primary btn-lg" href="#">Ir a los cursos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <!--<section id="cta" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Premium quality free onepage template</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="#">Download Now!</a>
                </div>
            </div>
        </div>
    </section><!--/#cta-->

    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_about'); ?></h2>
                <!--<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title"><?= lang('title_mission'); ?></h3>
                    <!-- 16:9 aspect ratio -->
                    <p><?= lang('content_mission'); ?></p>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title"><?= lang('title_vision'); ?></h3>
                    <p><?= lang('content_vision'); ?>.</p>

                    <!--<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> Ipsum is simply dummy</li>
                                <li><i class="fa fa-check-square"></i> When an unknown</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> The printing and typesetting</li>
                                <li><i class="fa fa-check-square"></i> Lorem Ipsum has been</li>
                            </ul>
                        </div>
                    </div>

                    <a class="btn btn-primary" href="#">Learn More</a>-->

                </div>

                <div class="col-sm-12 wow fadeInLeft">
                    <h3 class="column-title"><?= lang('title_values'); ?></h3>
                    <!-- 16:9 aspect ratio -->
                    <p><?= lang('content_values'); ?></p>
                </div>

            </div>
        </div>
    </section><!--/#about-->

    <section id="reach">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_reach'); ?></h2>
                <p class="text-center wow fadeInDown"><?= lang('content_reach'); ?></p>
            </div>

            <!--<div class="row text-center">
                <div class="col-md-4 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>1</span>
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_1'); ?></h3>
                    </div>
                </div>
                <div class="col-md-4 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>1</span>
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_2'); ?></h3>
                    </div>
                </div>
                <div class="col-md-4 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>1</span>
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_3'); ?></h3>
                    </div>
                </div>
                
            </div>-->


        </div>
    </section><!--/#work-process-->

    <section id="goals">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_goals'); ?></h2>
                <!--<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
            </div>
            <div class="row text-center section-header">
                <div class="col-md-4 col-md-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <!--<span>1</span>-->
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_1'); ?></h3>
                    </div>
                </div>
                <div class="col-md-4 col-md-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <!--<span>1</span>-->
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_2'); ?></h3>
                    </div>
                </div>
                <div class="col-md-4 col-md-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <!--<span>1</span>-->
                            <i class="fa fa-check fa-2x"></i>
                        </div>
                        <h3><?= lang('goals_3'); ?></h3>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="<?= asset_url(); ?>images/main-feature.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-bullhorn fa-2x"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= lang('title_share'); ?></h4>
                            <p><?= lang('content_share'); ?></p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= lang('title_create'); ?></h4>
                            <p><?= lang('content_create'); ?></p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= lang('title_connect'); ?></h4>
                            <p><?= lang('content_connect'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><?= lang('small_slogan'); ?></h2>
                
                
                <img class="img-responsive wow fadeIn" src="<?= asset_url(); ?>images/cta2/cta2-img.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
            </div>
        </div>
    </section>

    <section id="services" style="background-color: white;">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_plan'); ?></h2>
                <!--<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
            </div>


            <div class="row">
                <div class="col-sm-6 col-md-6 text-center">
                    <div class="team-member wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="team-img">
                            <img class="img-responsive" src="<?= asset_url(); ?>images/team/01.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3><?= lang('plan_1'); ?></h3>
                        </div>
                        <p><?= lang('plan_1_content'); ?></p>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 text-center">
                    <div class="team-member wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 400ms; animation-delay: 0ms; animation-name: fadeInUp;">
                        <div class="team-img">
                            <img class="img-responsive" src="<?= asset_url(); ?>images/team/02.jpg" alt="">
                        </div>
                        <div class="team-info">
                            <h3><?= lang('plan_2'); ?></h3>
                        </div>
                        <p><?= lang('plan_2_content'); ?></p>

                    </div>
                </div>
          
            </div>

           
        </div>
    </section><!--/#services-->

    


    <section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_tecno'); ?></h2>
                <p class="text-center wow fadeInDown"><?= lang('content_tecno'); ?></p>
            </div>

            <!--<div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="animated-number" data-digit="2305" data-duration="1000"></div>
                        <strong>CUPS OF COFFEE CONSUMED</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="animated-number" data-digit="1231" data-duration="1000"></div>
                        <strong>CLIENT WORKED WITH</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="3025" data-duration="1000"></div>
                        <strong>PROJECT COMPLETED</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="animated-number" data-digit="1199" data-duration="1000"></div>
                        <strong>QUESTIONS ANSWERED</strong>
                    </div>
                </div>
            </div>-->
        </div>
    </section><!--/#animated-number-->
    

     

    

    

    <section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_donations'); ?></h2>
                <p class="text-center wow fadeInDown"><?= lang('content_donations'); ?></p>
            </div>

            


            
            </div>
        </div>
    </section><!--/#meet-team-->

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown"><?= lang('title_magazine'); ?></h2>
                <p class="text-center wow fadeInDown"><?= lang('content_magazine'); ?></p>
            </div>
        </div>
    </section><!--/#get-in-touch-->
<div id="vbid-9053b6b5-qcgbnyq8" class="preview-element preview-map-source magic-circle-holder  allow-mobile-hide" data-menu-name="PREVIEW_MAP" data-json-name="PREVIEW_MAP" data-spimenortheast-lat="37.5913243802915" data-spimesouthwest-lng="-120.95228771970847" data-spimelat="37.5899754" data-spimelocation="3005 4th street ceres california" data-spimecontext="PREVIEW" data-spimemap_style_id="google" data-spimenortheast-lng="-120.95228771970847" data-spimelng="-120.9536367" data-spimevbid="vbid-9053b6b5-qcgbnyq8" data-spimesouthwest-lat="37.5886264197085">

    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="37.5913243802915" data-longitude="-120.95228771970847"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Contact Info</h3>


                            <address>
                              <strong>Step In.</strong><br>
                              3005 4TH STREET<br>
                              CERES, CALIFORNIA<br>
                              <abbr title="Phone">P:</abbr> (209) 303-4111
                            </address>

                            <!--<form id="main-contact-form" name="contact-form" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 Step In. Designed by <a target="_blank" href="http://AdrianAlvarez.online" title="AdrianAlvarez">http://AdrianAlvarez.online</a>
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="<?= asset_url(); ?>js/jquery.js"></script>
    <script src="<?= asset_url(); ?>js/bootstrap.min.js"></script>
    <!--<script src="http://maps.google.com/maps/api/js?sensor=true"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWGp8fADJkJvtypFWEsLie8ZTrGWNrZq4"></script>
    <script src="<?= asset_url(); ?>js/owl.carousel.min.js"></script>
    <script src="<?= asset_url(); ?>js/mousescroll.js"></script>
    <script src="<?= asset_url(); ?>js/smoothscroll.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.isotope.min.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.inview.min.js"></script>
    <script src="<?= asset_url(); ?>js/wow.min.js"></script>
    <script src="<?= asset_url(); ?>js/main.js"></script>
</body>
</html>