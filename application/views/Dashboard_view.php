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
                <?php foreach ((array) $list_courses as $course) : ?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 course-box">
                  <div class="tile course_video_box" data-id="<?= $course['data']->id_course; ?>">
                    <img src="<?= asset_url(); ?>course/upload/<?= $course['data']->image; ?>" alt="Curso" class="img-responsive" style="display: initial;" width="300px">
                    <h3 class="tile-title"><?= $course['data']->name; ?></h3>
                    <p><?= $course['data']->name; ?></p>
                    <?php if($course['videos'] != NULL) : ?><a class="btn btn-primary btn-large btn-block" href="<?= site_url('course/id/'.$course['data']->id_course); ?>"><?= (isset($course['participant']->actual_level) && $course['participant']->actual_level > 1) ? 'Seguir el curso' : 'Ir al curso'; ?></a><?php endif; ?>

                    <div class="todo" style="padding: 10px">
                      
                      <ul id="todo-<?= $course['data']->id_course; ?>">
                      <?php $max_level = 1; foreach ((array) $course['videos'] as $video) : if($max_level < $video->level) :  $max_level = $video->level; endif; endforeach; ?>

                      <?php $vid_n = 1; foreach ((array) $course['videos'] as $video) : ?>

                  
                        <?php if($course['participant'] && (($course['participant']->actual_level > $video->level) || $course['participant']->actual_level == $max_level)) : ?>

                        <li class="todo-done">
                          <div class="todo-icon"><?= $vid_n; ?></div>
                          <a href="<?= site_url('course/id/'.$course['data']->id_course.'?level='.$video->level); ?>">
                          <div class="todo-content">
                            <h4 class="todo-name">
                            <?= $video->title; ?>  <strong>(Duracion: <?= $video->time; ?> Min)</strong>
                            </h4>
                            Nivel <?= $vid_n; ?>
                          </div></a>
                        </li>

                        <?php else : ?>

                        <li>
                          <div class="todo-icon"><?= $vid_n; ?></div>
                          <div class="todo-content">
                            <h4 class="todo-name">
                            <?= $video->title; ?>  <strong>(Duracion: <?= $video->time; ?> Min)</strong>
                            </h4>
                            Nivel <?= $vid_n; ?>
                          </div>
                        </li>

                        <?php endif; ?>
                      <?php $vid_n++; endforeach; ?>
                        
                      </ul>
                    </div>

                    

                    <ul class="pagination" id="pag-<?= $course['data']->id_course; ?>">

                    </ul>

                  </div>
                </div>
              <?php endforeach; ?>

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

    <script src="<?= asset_url(); ?>js/owl.carousel.min.js"></script>
    <script src="<?= asset_url(); ?>js/mousescroll.js"></script>
    <script src="<?= asset_url(); ?>js/smoothscroll.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.isotope.min.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.inview.min.js"></script>
    <script src="<?= asset_url(); ?>js/wow.min.js"></script>
    <script src="<?= asset_url(); ?>js/main.js"></script>

    <script type="text/javascript">

      var level_list = new Array();
      var records_per_page = 3;
      var page = 1;

      $(window).on('load', function() {

        

        var list_videos_box = $('.course_video_box');

        $.each( list_videos_box, function() {
          
          var box_id = $(this).attr('data-id');
          var box_li = $(this).children('.todo').children('ul').children('li');

          level_list[box_id] = [];
         
          $.each( box_li, function( i ) {

            level_list[box_id].push($(this));

          });

          n_pages = Math.ceil(level_list[box_id].length / records_per_page);

          $('#todo-'+box_id).html('');

          for (var i = (page-1) * records_per_page; i < (records_per_page * page); i++) {
            $('#todo-'+box_id).append(level_list[box_id][i]);
          }


          for (var i = 1; i <= n_pages; i++) {
            if(i == 1)
            {
              $('#pag-'+box_id).append('<li class="active"><a href="#" class="change-page">'+i+'</a></li>');
            }
            else
            {
              $('#pag-'+box_id).append('<li><a href="#" class="change-page">'+i+'</a></li>');
            }
            
          }

          if(n_pages == 1)
          {
            $('#pag-'+box_id).prepend('<li><a href="#" class="fui-checkbox-unchecked"></a></li>');
            $('#pag-'+box_id).append('<li><a href="#" class="fui-checkbox-unchecked"></a></li>');
          }
          else
          {
            $('#pag-'+box_id).prepend('<li class="previous"><a href="#" class="fui-arrow-left change-page-back"></a></li>');
            $('#pag-'+box_id).append('<li class="next"><a href="#" class="fui-arrow-right change-page-next"></a></li>');
          }





        });


        $('*').on('click', '.change-page', function(e){

          page = $(this).text();
          box_id = $(this).parent().parent().parent().attr('data-id');

          var ul = $(this).parent().parent();
          $.each( ul.find('li'), function( i ) {

            $(this).removeClass('active');

          });

          $(this).parent().addClass('active');

          e.preventDefault();
          e.stopImmediatePropagation();

          $('#todo-'+box_id).html('');

          for (var i = (page-1) * records_per_page; i < (records_per_page * page); i++) {
            $('#todo-'+box_id).append(level_list[box_id][i]);
          }

        })

        $('*').on('click', '.change-page-next', function(e){

          
          box_id = $(this).parent().parent().parent().attr('data-id');

          var ul = $(this).parent().parent();

          var last_active = 0;

          $.each( ul.children('li'), function( i ) {

            if($(this).hasClass('active'))
            {
              last_active = i;
            }

          });

          var new_active = last_active+1;

          var li = ul.children('li');

          if(li.eq(new_active).hasClass('next'))
          {
            return;
          }

          li.eq(last_active).removeClass('active');

          li.eq(new_active).addClass('active');

          page++;


          e.preventDefault();
          e.stopImmediatePropagation();

          $('#todo-'+box_id).html('');

          for (var i = (page-1) * records_per_page; i < (records_per_page * page); i++) {
            $('#todo-'+box_id).append(level_list[box_id][i]);
          }

        })

        $('*').on('click', '.change-page-back', function(e){

          if(page == 1) { return; }

          
          box_id = $(this).parent().parent().parent().attr('data-id');

          var ul = $(this).parent().parent();

          var last_active = 0;

          $.each( ul.children('li'), function( i ) {

            if($(this).hasClass('active'))
            {
              last_active = i;
            }

          });

          var new_active = last_active-1;

          var li = ul.children('li');

          if(li.eq(new_active).hasClass('previous'))
          {
            return;
          }

          li.eq(last_active).removeClass('active');

          li.eq(new_active).addClass('active');


          e.preventDefault();
          e.stopImmediatePropagation();

          page--;

          $('#todo-'+box_id).html('');

          for (var i = (page-1) * records_per_page; i < (records_per_page * page); i++) {
            $('#todo-'+box_id).append(level_list[box_id][i]);
          }

        })

      
  
      });




      
    </script>
</body>
</html>