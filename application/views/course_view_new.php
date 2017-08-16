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

    <!-- <link rel="shortcut icon" href="img/favicon.ico">-->

    <style>
      body {
        padding-top: 70px;
      }
      .list_courses div.course-box:nth-child(3n+1){
          clear:left
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
          <a class="navbar-brand" href="<?= site_url('dashboard'); ?>"><span class="fui-arrow-left"></span> Volver a Mineria</a>
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
      <div class="col-md-12 text-center"><h1>Lista de cursos</h1></div>
      </div>

      <div class="section list_courses">

        

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


    </div> <!-- /container -->


    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="<?= asset_url(); ?>course/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= asset_url(); ?>course/js/vendor/video.js"></script>
    <script src="<?= asset_url(); ?>course/js/flat-ui.min.js"></script>

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
