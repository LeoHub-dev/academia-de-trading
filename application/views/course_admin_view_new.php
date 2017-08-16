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

    <link href="<?= asset_url(); ?>course/css/uploadfile.css" rel="stylesheet">

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
          <a class="navbar-brand" href="<?= site_url('course'); ?>"><span class="fui-arrow-left"></span> Volver a Los Cursos</a>
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

      <?php if($course_login) : ?>


      <div class="section">

      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="tile course_video_box">

          <h3 class="tile-title">Agregar Profesor</h3>

          <p><form action="<?= site_url('course/add_teacher');?>" method="post" class="form_teacher_admin">
                          

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Profesor/ra:</label>

                <input name="teacher" type="text" class="form-control" placeholder="Ingresa el nombre del profesor ..." data-validation="length" data-validation-length="min3" required>
              </div>
            </div>


            <div class="form-group text-center">
              <div class="col-md-12 text-center">
              <label>Imagen de profesor/ra</label>
              <div id="imageupload_teacher">Subir</div>
              <input type="hidden" name="teacher_image" id="teacher_image" value="teacher_default.png" required>
              </div>
            </div>

            

            <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                    Bad
                </div>
                <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                    Good
                </div>




            <div class="col-md-12 clearfix" style="margin: 8px 0">
              <button type="submit" class="btn btn-block btn-primary btn-registrarse">Agregar Profesor</button>
            </div>

          </form></p>
          <div class="clearfix"></div>
        

          </div>



        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="tile course_video_box">

          <h3 class="tile-title">Agregar Curso</h3>

          <p><form action="<?= site_url('course/add_course');?>" method="post" class="form_course_admin">
                          
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Nombre del curso:</label>

                <input name="name" type="text" class="form-control" placeholder="Ingresa el nombre del curso ..." data-validation="length" data-validation-length="min3" required>
              </div>
            </div>

            <div class="form-group text-center">
              <div class="col-md-12 text-center">
              <label>Imagen del curso</label>
              <div id="imageupload_course">Subir</div>
              <input type="hidden" name="course_image" id="course_image" value="course_default.png" required>
              </div>
            </div>


            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Profesores :</label>

                <select class="form-control select-teachers" name="teacher" required>
                  <option value=""> Selecciona un profesor </option>
                  <?php foreach ($list_teachers as $teacher) : ?>
                  <option value="<?= $teacher['data']->id_teacher; ?>"><?= $teacher['data']->teacher_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            

            <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                    Bad
                </div>
                <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                    Good
                </div>




            <div class="col-md-12 clearfix" style="margin: 8px 0">
              <button type="submit" class="btn btn-block btn-primary btn-registrarse">Crear curso</button>
            </div>

          </form></p>
          <div class="clearfix"></div>
        

          </div>



        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="tile course_video_box" id="id_course" data-id="">

          <h3 class="tile-title">Agregar Video</h3>

            <!--<img src="<?= asset_url(); ?>course/img/icons/svg/compas.svg" alt="Compas" class="tile-image big-illustration">-->

            <p><form action="<?= site_url('course/add_video');?>" method="post" class="form_video_admin">
                          
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Cursos :</label>

                <select class="form-control select-courses" name="course" required>
                  <option value=""> Selecciona un curso </option>
                  <?php foreach ($list_courses as $course) : ?>
                  <option value="<?= $course['data']->id_course; ?>"><?= $course['data']->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Titulo del video:</label>

                <input name="title" type="text" class="form-control" placeholder="Titulo del video ..." required>
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Link del video:</label>

                <input name="link" type="text" class="form-control" placeholder="Numero de video ..." required>
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Nivel del video:</label>

                <input name="level" type="number" class="form-control" min="1" value="1" required>
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Duracion del video :</label>

                <input name="time" type="number" class="form-control" min="1" required>
              </div>
            </div>

            

            <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                    Bad
                </div>
                <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                    Good
                </div>




            <div class="col-md-12 clearfix" style="margin: 8px 0">
              <button type="submit" class="btn btn-block btn-primary btn-registrarse">Agregar Video a Curso</button>
            </div>

          </form></p>
          <div class="clearfix"></div>

          </div>
        </div>

        


      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

          <div class="tile course_video_box" id="id_course" data-id="">

          <h3 class="tile-title">Lista Cursos</h3>

            <!--<img src="<?= asset_url(); ?>course/img/icons/svg/compas.svg" alt="Compas" class="tile-image big-illustration">-->

            <p>
            <div class="list-courses">
              <?php foreach ((array) $list_courses as $course) : ?>
              <h4>#<?= $course['data']->id_course; ?> - Curso : <?= $course['data']->name; ?></h4>
              <ol class="course-<?= $course['data']->id_course; ?>">
                <?php foreach ((array) $course['videos'] as $video) : ?>
                  <li>Video : <?= $video->title; ?> (Duracion: <?= $video->time; ?> Min)</li>
                <?php endforeach; ?>
              </ol>
            <?php endforeach; ?>
            </div>
            </p>

          <div class="clearfix"></div>

          </div>



        </div>

      <?php else : ?>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

          <div class="tile course_video_box" id="id_course" data-id="">

          <h3 class="tile-title">Iniciar Sesion</h3>


            <p><form action="<?= site_url('course/panel');?>" method="post">
                          
            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <label class="control-label col-sm-12" for="email">Password:</label>

                <input name="course_pw" type="password" class="form-control" placeholder="Ingrese su contraseña ..." required>
              </div>
            </div>

            

            <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                    Bad
                </div>
                <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                    Good
                </div>




            <div class="col-md-12 clearfix" style="margin: 8px 0">
              <button type="submit" class="btn btn-block btn-primary btn-registrarse">Login</button>
            </div>

          </form>
          </p>

          <div class="clearfix"></div>

          </div>



      </div>

    <?php endif; ?>
    </div>


    </div> <!-- /container -->


    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="<?= asset_url(); ?>course/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= asset_url(); ?>course/js/vendor/video.js"></script>
    <script src="<?= asset_url(); ?>course/js/flat-ui.min.js"></script>
    <script src="<?= asset_url(); ?>course/js/sweetalert2.min.js"></script>
    <script src="<?= asset_url(); ?>course/js/course.js"> </script>
    <script src="<?= asset_url(); ?>course/js/jquery.uploadfile.min.js"> </script>

    <script type="text/javascript">
    $(document).ready(function() {


    var base_url = window.location.protocol + "//" + window.location.host + "/oficina/";


    $('.form_course_admin').on('submit', function(e){

      e.preventDefault();
          e.stopImmediatePropagation();

          var form = $(this);
          


          
      $.post($(this).attr('action'), $(this).serialize(), function(data) {
        console.log(data);
        if(data.response == true){   swal(data.response_title, data.response_text, "success"); $('.list-courses').append('<h2>#'+data.id_course+' - Curso : '+data.data.name+'</h2> <ol class="course-'+data.id_course+'"></ol>'); $('.select-courses').append('<option value="'+data.id_course+'">'+data.data.name+'</option>');  form.trigger('reset'); } else {   /*swal({title:'Error', type: "error", text: data.errors, html: true});*/ showFormError(form,data.errors); }

      

      },"json").fail(function(xhr, status, error) {


            console.log(error);
            console.log(xhr.responseText);

        });

       
    });


    $('.form_teacher_admin').on('submit', function(e){

      e.preventDefault();
          e.stopImmediatePropagation();

          var form = $(this);
          


          
      $.post($(this).attr('action'), $(this).serialize(), function(data) {
        console.log(data);
        if(data.response == true){   swal(data.response_title, data.response_text, "success"); $('.select-teachers').append('<option value="'+data.id_teacher+'">'+data.data.teacher+'</option>');  form.trigger('reset'); } else {   /*swal({title:'Error', type: "error", text: data.errors, html: true});*/ showFormError(form,data.errors); }

      

      },"json").fail(function(xhr, status, error) {


            console.log(error);
            console.log(xhr.responseText);

        });

       
    });



    $('.form_video_admin').on('submit', function(e){

      e.preventDefault();
          e.stopImmediatePropagation();

          var form = $(this);
          


          
      $.post($(this).attr('action'), $(this).serialize(), function(data) {
        console.log(data);
        if(data.response == true){   swal(data.response_title, data.response_text, "success"); $('.course-'+data.data.course).append('<li>Video : '+data.data.title+'  (Duracion: '+data.data.time+' Min)</li>');  form.trigger('reset'); } else {   /*swal({title:'Error', type: "error", text: data.errors, html: true});*/ showFormError(form,data.errors); }

      

      },"json").fail(function(xhr, status, error) {


            console.log(error);
            console.log(xhr.responseText);

        });

       
    });




  });
  </script>

  <script>

    $("#imageupload_course").uploadFile({
      url:"../course/upload_img",
      dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
      uploadStr:"Subir",
      fileName:"imgPerfil",
      showPreview:true,
      maxFileCount:1,
      previewHeight: "100px",
      previewWidth: "100px",
      acceptFiles:"image/*",
      showDelete: true,
      deleteCallback: function (data, pd) {
        $("#course_image").val('course_default.png');
      },
      onSuccess:function(files,data,xhr,pd)
      {
        

        var error = JSON.parse(data);

        if(error.error)
        {

          $(".img_upload_error").html(error.error)
        }
        else
        {
          var img = JSON.parse(data);
          $(".img_upload_error").html("");
          $("#course_image").val(img);
        }


      }
    });


    $("#imageupload_teacher").uploadFile({
      url:"../course/upload_img",
      dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
      uploadStr:"Subir",
      fileName:"imgPerfil",
      showPreview:true,
      maxFileCount:1,
      previewHeight: "100px",
      previewWidth: "100px",
      acceptFiles:"image/*",
      showDelete: true,
      deleteCallback: function (data, pd) {
        $("#teacher_image").val('course_default.png');
      },
      onSuccess:function(files,data,xhr,pd)
      {


        var error = JSON.parse(data);

        if(error.error)
        {

          $(".img_upload_error").html(error.error)
        }
        else
        {
          var img = JSON.parse(data);
          $(".img_upload_error").html("");
          $("#teacher_image").val(img);
        }


      }
    });
  </script>

  

  </body>
</html>
