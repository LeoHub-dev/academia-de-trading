<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="<?= asset_url(); ?>course/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="<?= asset_url(); ?>course/css/flat-ui.min.css" rel="stylesheet">

    <link href="<?= asset_url(); ?>course/css/sweetalert2.min.css" rel="stylesheet">

    <!-- <link rel="shortcut icon" href="img/favicon.ico">-->

    <style>
      body {
        padding-top: 70px;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="<?= asset_url(); ?>course/js/vendor/html5shiv.js"></script>
      <script src="<?= asset_url(); ?>course/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
          </button>-->
          <a class="navbar-brand" href="<?= site_url('course/'); ?>"><span class="fui-arrow-left"></span> Volver a Los Cursos</a>
        </div>
        <!--<div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Default</a></li>
            <li class="active"><a href="./">Static top</a></li>
            <li><a href="../navbar-fixed-top/">Fixed top</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container-fluid">


      <div class="section">

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

          <div class="tile course_video_box">

          <h3 class="tile-title"><?= $video->title; ?></h3>

          <p><iframe src="https://player.vimeo.com/video/<?= $video->video; ?>?title=0&byline=0&portrait=0;autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>

        

          </div>



      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

          <div class="tile course_video_box" id="id_course" data-id="<?= $course->id_course; ?>">

          <h3 class="tile-title"><?= $course->teacher_name; ?></h3>

            <img src="<?= asset_url(); ?>course/upload/<?= $course->teacher_image; ?>" alt="<?= $course->teacher_name; ?>" class="tile-image big-illustration">

            <?php if($participant->actual_level > $video->level) : ?>
              <p><a href="<?= site_url('course/id/'.$course->id_course.'?level='.($video->level+1)); ?>" class="btn btn-primary btn-block">Siguiente</a></p>
              <?php if($video->level != 1) : ?>

                  <p><a href="<?= site_url('course/id/'.$course->id_course.'?level='.($video->level-1)); ?>" class="btn btn-primary btn-block">Anterior</a></p>

              <?php endif; ?>
            <?php else : ?>
              <?php if($participant->actual_level != $last_level->level) : ?>

                  <p><a href="<?= site_url('course/next_level/'.$course->id_course); ?>" class="btn btn-primary btn-block btn-next disabled">Debes ver todo el video completo</a></p>

                  <?php if($video->level > 1) : ?>

                    <p><a href="<?= site_url('course/id/'.$course->id_course.'?level='.($video->level-1)); ?>" class="btn btn-primary btn-block">Anterior</a></p>

                  <?php endif; ?>

              <?php else : ?>

                  
                    <p>Este es el ultimo Nivel</p>

                    <?php if($video->level != 1) : ?>

                      <p><a href="<?= site_url('course/id/'.$course->id_course.'?level='.($video->level-1)); ?>" class="btn btn-primary btn-block">Anterior</a></p>

                    <?php endif; ?>

              <?php endif; ?>

                
              <?php endif; ?>

          </div>



      </div>
    </div>


    </div> <!-- /container -->


    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="<?= asset_url(); ?>course/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= asset_url(); ?>course/js/vendor/video.js"></script>
    <script src="<?= asset_url(); ?>course/js/flat-ui.min.js"></script>
    <script src="<?= asset_url(); ?>course/js/sweetalert2.min.js"></script>
    <script src="<?= asset_url(); ?>course/js/course.js"> </script>

  

  </body>
</html>
