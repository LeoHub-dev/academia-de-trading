<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Step In - Step Foward In Life">
    <meta name="author" content="Step In - Step Foward In Life">
    <title>Step In - Step Foward In Life</title>
    <!-- core CSS -->
    <link href="<?= asset_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/animate.min.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/owl.transitions.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/sweetalert.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/main.css" rel="stylesheet">
    <link href="<?= asset_url(); ?>css/responsive.css" rel="stylesheet">
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

<body id="home" class="homepage login" style="padding: 50px">

  <div class="panel panel-default center-div">
  <!--<div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>-->
  <div class="panel-body">
   
  
    <section>
        <div class="container">

            

            <div class="row">
                <div class="col-sm-12 wow fadeInLeft">
                    <p><div class="login-form">

                    <form action="<?= site_url('auth/ingreso'); ?>" method="post" role="form" class="form_login" style="display: block;" autocomplete="off">
                   <div class="section-header">
                      <h2 class="section-title text-center wow fadeInDown"><?= lang('login'); ?> - <span class='resaltar cursiva'>Step in</span></h2>
                      <!--<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
                    </div>
                        <div class="form-group label-floating">
                          <label class="control-label" for="usuario">Usuario</label>
                           <input type="text" name="usuario" id="usuario" tabindex="1" class="form-control" value="" autocomplete="off">
                        </div>
                      
                        <div class="form-group label-floating">
                          <label class="control-label" for="password">Password</label>
                           <input type="password" name="password" id="password" tabindex="1" class="form-control" value="" autocomplete="off">
                        </div>

                        
                      <div class="col-xs-6 form-group pull-left checkbox">
                        <label><input type="checkbox"> Recordarme</label>
                      </div>

                      <div class="col-xs-6 form-group pull-right">     
                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-primary btn-raised font-dark" value="Log In">
                      </div>

                      <div class="col-md-12">
                        <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                            Bad
                        </div>
                        <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                            Good
                        </div>
                      </div>

                      
                        
                      
                  </form>
                  <button onclick="loginFb()" class="btn btn-raised btn-block" style="background-color: #3b5998; color: white;">Entrar con Facebook <i class="fa fa-facebook-official" aria-hidden="true"></i></button>
                  </div>

                  <div class="register-form" style="display: none;">
                  <form action="<?= site_url('auth/registro'); ?>" method="post" role="form" class="form_registro" >
                    <div class="section-header">
                      <h2 class="section-title text-center wow fadeInDown"><?= lang('register'); ?> - <span class='resaltar cursiva'>Step in</span></h2>
                      <!--<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
                    </div>
                      <div class="form-group label-floating col-md-6">
                          <label class="control-label" for="nombre">Nombre</label>
                           <input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" value="" autocomplete="off">
                      </div>
                      <div class="form-group label-floating col-md-6">
                          <label class="control-label" for="apellido">Apellido</label>
                           <input type="text" name="apellido" id="apellido" tabindex="1" class="form-control" value="" autocomplete="off">
                      </div>
                      <div class="form-group label-floating col-md-12">
                          <label class="control-label" for="email">Email</label>
                           <input type="email" name="email" id="email" tabindex="1" class="form-control" value="" autocomplete="off">
                        </div>

                      <div class="form-group label-floating col-md-12">
                          <label class="control-label" for="usuario">Usuario</label>
                           <input type="text" name="usuario" id="usuario" tabindex="1" class="form-control" value="" autocomplete="off">
                      </div>
                      <div class="form-group label-floating col-md-6">
                        <label class="control-label" for="password">Password</label>
                         <input type="password" name="password" id="password" tabindex="1" class="form-control" value="" autocomplete="off">
                      </div>
                      <div class="form-group label-floating col-md-6">
                        <label class="control-label" for="password">Confirmar Password</label>
                         <input type="password" name="confirmar_password" id="confirmar_password" tabindex="1" class="form-control" value="" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-primary btn-special font-dark" value="Registrarse">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                            Bad
                        </div>
                        <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                            Good
                        </div>
                      </div>

                       
                        
                      

                  </form><button onclick="loginFb()" class="btn btn-raised btn-block" style="background-color: #3b5998; color: white;">Registrarse con Facebook <i class="fa fa-facebook-official" aria-hidden="true"></i></button></div></p>
                </div>

             

                

            </div>
        </div>
    </section><!--/#about-->
</div>
<div class="panel-footer clearfix">

                  <div class="col-md-12 register-form" style="display: none;"><a href="#" class="btn btn-primary active pull-left btn-block font-dark" id="login-form-link"><?= lang('login'); ?></a></div>
                
                
                  <div class="col-md-12 login-form"><a href="#" class="btn btn-primary active pull-right btn-block font-dark" id="register-form-link"><?= lang('register'); ?></a></div>
                
                </div>
</div>


    

    <script src="<?= asset_url(); ?>js/jquery.js"></script>
    <script src="<?= asset_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?= asset_url(); ?>js/owl.carousel.min.js"></script>
    <script src="<?= asset_url(); ?>js/mousescroll.js"></script>
    <script src="<?= asset_url(); ?>js/smoothscroll.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.isotope.min.js"></script>
    <script src="<?= asset_url(); ?>js/jquery.inview.min.js"></script>
    <script src="<?= asset_url(); ?>js/wow.min.js"></script>
    <script src="<?= asset_url(); ?>js/sweetalert.min.js"></script>
    <script src="<?= asset_url(); ?>js/main.js"></script>
</body>
</html>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->



<script>

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}

function loginFb()
{
	PopupCenter('<?php echo $this->facebook->login_url(); ?>&display=popup','Facebook Login','600','600');  
    //var facebook = window.open("", "", "width=600,height=600");
    //facebook.onbeforeunload = function(){ location.reload(); };
}

function responseFb(data)
{
	data = JSON.parse(data);
	if(data.response == true){ location.reload(); } else { console.log(data.errors); }
}

$(function () {

  $('form').trigger('reset');

});

</script>

</html>



