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
            <small>Reiniciar Contraseña</small>
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
                <form id="reset-form" action="<?= site_url('auth/reset'); ?>" method="POST">
                    <div class="msg">Reinicio de Password</div>
                    
                    
                    <input type="hidden" class="form-control" name="h" value="<?= $h; ?>" required>
                    <input type="hidden" class="form-control" name="e" value="<?= $e; ?>" required>
                    <input type="hidden" class="form-control" name="i" value="<?= $i; ?>" required>
                    <input type="hidden" class="form-control" name="p" value="<?= $p; ?>" required>
                    

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="np" minlength="6" placeholder="Nueva Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="cnp" minlength="6" placeholder="Confirmar nueva Password" required>
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



                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Reiniciar Password</button>


                </form>

               
            </div>
        </div>
    </div>

    

    <?php include_once 'modules/Scripts.php' ; ?>
</body>

</html>





</html>



