<!DOCTYPE html>
<html>

<head>
    <?php include_once 'modules/Header.php' ; ?>
</head>

<body class="login-page">
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
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Academia de <b>Trading</b></a>
            <small>Login / Registro</small>
        </div>
        <div class="card">
            <div class="body auth_card">
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
                <form id="login-form" class="form_login" action="<?= site_url('auth/ingreso'); ?>" method="POST">
                    <div class="msg">Iniciar Sesion</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
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
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recordarme</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">LOGIN</button>
                        </div>

                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a id="register-form-link" href="javascript:void(0)">Registrate!</a>
                        </div>
                         <div class="col-md-12">
                            <a href="javascript:void(0)" onclick="loginFb()"><img src="https://www.thenerdmag.com/wp-content/uploads/facebook-login.png" class="img-responsive"></a>
                        </div>
                        <!--<div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>-->
                    </div>
                </form>

                <form id="register-form" class="form_registro" action="<?= site_url('auth/registro'); ?>" style="display: none;" method="POST">
                    <div class="msg">Registro</div>
                    
                    
                    <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">person</i>
                      </span>
                      <div class="form-line">
                          <input type="text" class="form-control" name="nombre" placeholder="Nombre" required autofocus>
                      </div>
                    </div>
                    

                    
                    <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">person</i>
                      </span>
                      <div class="form-line">
                          <input type="text" class="form-control" name="apellido" placeholder="Apellido" required autofocus>
                      </div>
                    </div>
                    

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
                        </div>
                    </div>


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirmar_password" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" id="input_referido" name="referido" class="form-control" placeholder="Numero Referido #" value="<?= (isset($referido_id)) ? $referido_id : ""; ?>" required>
                        </div>
                        <span class="input-group-addon">@<span class="referido_nombre">Referido</span></span>
                    </div>



                    <div class="col-md-12">
                      <div id="error_message" class="alert alert-danger clearfix" style="display: none;" role="alert">
                          Bad
                      </div>
                      <div id="success_message" class="alert alert-success clearfix" style="display: none;" role="alert">
                          Good
                      </div>
                    </div>


                    <div class="form-group">
                        <input type="checkbox" name="terminos" id="terminos" class="filled-in chk-col-pink">
                        <label for="terminos">Lei y estoy de acuerdo con los <a href="<?= site_url('legal'); ?>" target="_blank">terminos de uso</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a id="login-form-link" href="javascript:void(0)">Ya estas registrado ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <?php include_once 'modules/Scripts.php' ; ?>
</body>

</html>



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
	if(data.response == true){ location.reload(); } else { alert(data.errors); }
}

$(function () {

    $('form').trigger('reset');

    console.log(window.location.hash);
    var hash = window.location.hash;
    if(hash == "#_registro")
    {
        $("#register-form").fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
    }
});

</script>

</html>



