<!DOCTYPE html>
<html>
<head>
  <title>Academia de Trading</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Academia de trading">
  <meta name="keywords" content="Academia de trading">
  <meta name="author" content="Adrian Alvarez"/>
  <meta property="og:title" content="Academia de Trading" />
  <meta property="og:description" content="Academia para aprender Trading y generar tu propio ingreso" />
  <meta property="og:image" content="https://i.imgur.com/f4H2cUB.jpg" />
  <meta property="og:url" content="<?= site_url(); ?>" />
  <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="<?= asset_url(); ?>plugins/bootstrap/css/bootstrap.min.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,600i" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="<?= asset_url(); ?>plugins/animate-css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/social-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>curso/css/master_node.css">
    <script src="https://use.fontawesome.com/a7fd4b808d.js"></script>
    <link rel="icon" type="image/png" href="<?= asset_url(); ?>ventas/img/logo.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


    <style type="text/css">
    .material-icons {
      font-size: initial !important;
    }
    .alert-minimalist {
      background-color: rgb(0, 126, 255);
      /*border-color: rgba(149, 149, 149, 0.3);*/
      border-color: rgba(0, 0, 0, 0.3);
      border-radius: 3px;
      color: rgb(149, 149, 149);
      padding: 10px;
    }
    .alert-minimalist > [data-notify="icon"] {
      height: 50px;
      margin-right: 12px;
    }
    .alert-minimalist > [data-notify="title"] {
      color: white;
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      text-transform: capitalize;
    }
    .alert-minimalist > [data-notify="message"] {
      font-size: 80%;
      color: white;
    }

  </style>
</head>

<body>
  <header id="header">

    <!-- Section title -->
    <h1 class="sr-only">Academia de Trading | Home page</h1>

    <nav id="main-navigation" class="navbar navbar-default navbar-fixed-top">

      <div id="top-header" style=""></div>
      <!-- Section title -->
      <h1 class="sr-only">Main navigation</h1>

      <div class="">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a id="brand-mobile" class="navbar-brand navbar-brand-center smoothScroll" href="#home">
            <img alt="Academia De Trading" src="<?= asset_url(); ?>/home/img/logo.png">
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="nav navbar-nav">
            <li id="brand-desktop">
              <a class="navbar-brand smoothScroll" href="#home" style="padding: 26px 15px 26px 15px;">
                <img alt="Academia De Trading" src="<?= asset_url(); ?>/home/img/logo.png">
              </a>
            </li>

            <li><a class="" href="<?= site_url('auth'); ?>">Login</a></li>
            <li class="active"><a class="" href="<?= site_url('auth'); ?>#_registro">Registro</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

  </header>
  <main>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Login Registro</h4>
          </div>
          <div class="modal-body">  
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
            <?php if($info_usuario == FALSE) : ?> 
              <form id="login-form" class="auth-form" action="<?= site_url('auth/ingreso'); ?>" style="display: none;" method="POST">
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
                    <a class="auth-link" data-href="register-form-ventas" href="javascript:void(0)">Registrate!</a>
                  </div>


                </div>
              </form>

              <form id="register-form-ventas" class="auth-form" action="<?= site_url('auth/registro'); ?>"  method="POST">
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
                  <a class="auth-link" data-href="login-form" href="javascript:void(0)">Ya estas registrado ?</a>
                </div>
              </form>

            <?php endif; ?> 

            <div class="pago-ventas-view" <?php if($info_usuario == FALSE) : ?> style="display: none;" <?php endif; ?>>

              <div class="row">
                <div class="alert alert-success">
                  <p><small class="font-weight-bold">Nombre : </small><small id="payment_form_nombre"><?= ($info_usuario != FALSE) ? $info_usuario['data']->nombre.' '.$info_usuario['data']->apellido : ''; ?></small></p>
                  <p><small class="font-weight-bold">Email : </small><small id="payment_form_email"><?= ($info_usuario != FALSE) ? $info_usuario['data']->email : ''; ?></small></p>
                  <p><a href="<?= site_url('auth/desconectarse'); ?>" style="color: black">* Desconectar esta cuenta</a></p>
                </div>

              </div>
              <div class="row clearfix">
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <p>Paquete</p>
                  <div class="form-group clearfix">

                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plan" value="6" checked>
                        Paquete de 497$
                      </label>
                    </div>

                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="plan" value="7">
                        Paquete de 2000$
                      </label>
                    </div>

                    
                    

                  </div>
                </div>

                <div class="col-md-12" style="display: flex;align-items: center;justify-content: center;"> 

                  <button type="button" class="btn btn-primary waves-effect pagar-con-general" id-tipo="5">Pagar con</button> 
                  

                  <select class="form-control show-tick select-moneda" id="moneda_pago"> 
                    <option value="BTC">BTC (Bitcoin)</option>
                    <option value="LTC">LTC (Litecoin)</option>
                    <option value="BCH">BCH (BitcoinCash)</option>
                  </select> 
                  

                </div>
              </div>
              <form style="display: none">
                <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="donar">Donar</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="input-group">
                      <div class="form-line">
                        <input type="text" id="donar" class="form-control btc-monto">
                      </div>
                      <span class="input-group-addon moneda-text">
                        BTC
                      </span>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="direccion">A esta wallet</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" id="direccion" class="form-control btc-address">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="pagado">Pagado</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                      <div class="form-line">
                        <input type="text" id="pagado" class="form-control btc-pagado" value="0">
                      </div>
                    </div>
                  </div>
                </div>
                
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>


    <section id="explicacion">
      <div id="content-particles"></div>
      <div id="content-section">
        <p class="clearfix font-white medium subtitulo">
          GANA DINERO DE  MANERA PASIVA <br>MINANDO CRIPTOMONEDAS
        </p>
        <div class="title-content clearfix">
          <div id="home-video-text">
            <div class="col-md-6" id="home-video">
              <div class=" ifra embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/245812578?title=0&amp;byline=0&amp;portrait=0;autoplay=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
              </div>
            </div> <!-- /.col -->
          </div>
        </div>
        <div class="title-content btnacceder" style="">
          <a href="#" target="_blank" data-toggle="modal" data-target="#myModal">
            <img src="<?= asset_url(); ?>/curso/img/acceder.png" alt="" width="280">
          </a>
        </div>
      </div>
    </section>
    <section id="" class="bg-gris">
      <div class="container-fluid not-so-fluid">
        <div class="services-container" style="margin-bottom: 0px;margin-top:0px;">
          <div class="row text-center some-margin">
            <div class="col-md-12">
              <div class="services-container" style="margin-bottom: 0px; margin-top: 0px">
                <p class="texto-titulo">
                  Ahora si vas a ganar dinero! <br>
                  Introduciendo: <span class="color-blue">Master Nodes y Mineria POS</span> <br>
                  Mentor&iacute;a Esencial de <br>
                  <span class="back-color-blue">Master Nodes y Mineria POS EN ESPAÑOL</span>
                </p>
              </div>
            </div>
            <div class="col-md-12">
              <img src="<?= asset_url(); ?>/curso/img/libro.jpg" alt="Libro Master Node" width="700">
            </div>
            <div class="col-md-12">
              <p>

              </p>
            </div>
            <div class="col-md-12 some-margin">
              <div class="col-md-7 text-center" style="margin: 0 auto;float: none">
                <h4 class="low low-text">
                  QUÉ PASARÍA SI YO TE DIJERA QUE EXISTE UN TIPO DE MINERÍA DE CRIPTOMONEDAS QUE TE PUEDE
                  ARROJAR GANANCIAS HASTA DE <span class="color-red">$536 DOLARES DIARIOS</span> CON UNA
                  INVERSIÓN INICIAL DE $2500 DOLARES
                </h4>
              </div>
              <div class="col-md-7" style="margin: 0 auto;float: none">
                <div class="el-content" style="width: 400px; margin: 0px auto; max-width: 100%; padding-top: 8px; padding-bottom: 8px;"><div class="ib2-hline" style="width: 400px; max-width: 100%; height: 10px; border-top: 2px dotted rgb(49, 1, 1);"></div></div>

                <div class=" text-justify p-texto">
                  <p>
                    En esta oportunidad, amigo mio quiero decirte que si es posible obtener estas
                    <span class="text-back-yellow"><b>espectaculares ganancias de  manera pasiva</b></span> con <b>la minería de criptomonedas</b>,
                    sin darle tu dinero a nadie, y directo a tu billetera.
                  </p>
                  <p>
                    Y yo Adrian Alvarez, vengo a revelarte todos mis secretos y mi estrategia, para que
                    veas como <b>logre ganar $15.000 Dolares en tan solo 8 dias</b> con tan solo una
                    inversión de $3.200 Dolares.
                  </p>
                  <p>
                    Te voy a guiar <b>PASO A PASO</b> durante los 4 modulos y te revelaré mi método con el que consigo diariemente
                    ganar desde  <span class="text-back-yellow"><b>$500 dolares al día</b></span>, con la mineria POS y los Master Nodes.
                  </p>
                </div>
                <div class="el-content" style="width: 400px; margin: 0px auto; max-width: 100%; padding-top: 8px; padding-bottom: 8px;margin-bottom: 20px;">
                  <div class="ib2-hline" style="width: 400px; max-width: 100%; height: 10px; border-top: 2px dotted rgb(49, 1, 1);"></div>
                </div>
              </div>
              <div class="col-md-6" style="margin: 0 auto;float: none; margin-bottom: 30px;">
                <h2>PERO QUE SON EXACTAMENTE LOS MASTER NODES Y LA MINERIA P.O.S ?</h2>
              </div>

              <div class="col-md-6" style="margin: 0 auto;float: none;">
                <div class="p-texto text-justify">
                  <p>
                    <span class="titulo-parrafo text-back-yellow">Que es un master node?</span><br><br>

                    En pocas palabras es un servidor que se encuentra en la red de la criptomoneda.<br><br>

                    Explicandolo de manera sencilla, es un monedero o wallet de la criptomoneda especifica
                    que tiene un número fijo de criptomonedas, este número lo suministra la criptomoneda para
                    poder crear el master node, estas monedas no se pueden utilizar pues con ella es que se realizan
                    las operaciones que requiere el master node.<br><br>

                    Ese monedero trabaja las 24 horas del día y las criptomonedas nos recompensan por ese trabajo,
                    de montar y configurar el master node y mantener las monedas requeridas en el mismo.<br><br>

                    Lo mejor es que son <b>ingresos pasivos</b> para sus operadores o dueños ya, que los block chain o
                    cadena de bloques pagan cierta cantidad de monedas o dinero, diariamente al dueño del master
                    node, ese pago los hace en la moneda con la que se configuro el master node, o en la moneda
                    invertida para crear el master node.<br><br>

                    Una de las ventajas es que si la moneda sube su precio, aumenta el pago por mantener activo el mismo.
                  </p>
                  <p>
                    <span class="titulo-parrafo text-back-yellow">Puedo ser dueño de un master node?</span><br><br>

                    Si, <b>cualquier persona puede tener su propio master node configurado</b> y rentando miles de dólares, el
                    costo es variable teniendo en cuenta en la criptomoneda en la que va a invertir, algunas monedas
                    piden tener 100 monedas para ser dueño de un master node, otras piden 1000 o mas, ese valor lo
                    multiplicas por el valor de la moneda y esto te da el valor que debes invertir para configurar
                    tu master node. <br><br>

                    Gracias a los master nodes muchas monedas como Dash han logrado incrementar su valor, y hoy dia son
                    muchisimas las criptomonedas que tienen implementada la creacion de master nodes a particulares.
                  </p>
                  <p>
                    <span class="titulo-parrafo text-back-yellow">Como Gano Dinero con master nodes?</span><br><br>
                    Las criptomonedas que permiten la creación de los master nodes, te dan recompensas monetaria en su divisa
                    (En la propia Moneda) a quienes son los operadores de master nodes, es de allí que salen los
                    altos porcentajes que vas a recibir por configurar tu propio master node. <br><br>

                    También puedes <b>configurar masternodes a terceros</b> y ofrecer este servicio, en donde ganas por cada master
                    node que configures a tus cliente.<br><br>

                    Tambien Ganas dinero por la valorizaion de la misma moneda.
                  </p>
                </div>
              </div>
              <div class="col-md-12" style="margin: 0 auto;float: none; margin-top: 30px;">
                <div class="col-md-8" style="margin: 0 auto;float: none; margin-bottom: 30px;">
                  <h2 style="font-size: 40px;line-height: 60px;">
                    <span class="back-color-blue">Mentoria PERSONALIZADA Paso a Paso</span> que te va a enseñar a
                    ganar dinero con Master Nodes y
                    las mejores CriptoMonedas
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid not-so-fluid" style="padding: 0">
          <div class="col-md-12 content_modulos">
            <div class="row">
              <div class="col-md-8" style="margin: 0 auto; float: none">
                <div class="col-md-4">
                  <img src="<?= asset_url(); ?>/curso/img/modulo1.png" alt="Modulo 1" width="200"/>
                </div>
                <div class="col-md-8">
                  <ul class="item-modulos">
                    <li><span>Todo Sobre La Tecnología Blockchain Y Por Qué Es Importante.</span></li>
                    <li><span>Formas mas rentables de ganar dinero con criptomonedas.</span></li>
                    <li><span>Como Valorar Criptomonedas e Invertir En Las Mejores.</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 content_modulos">
            <div class="row">
              <div class="col-md-8" style="margin: 0 auto; float: none">
                <div class="col-md-4">
                  <img src="<?= asset_url(); ?>/curso/img/modulo2.png" alt="Modulo 1" width="200"/>
                </div>
                <div class="col-md-8">
                  <ul class="item-modulos">
                    <li><span>Herramientas Necesitas Para Operar Con Criptomonedas.</span></li>
                    <li><span>Que son las AlCoins </span></li>
                    <li><span>Análisis fundamental de las alcoins.</span></li>
                    <li><span>Análisis técnico de las alcoins.</span></li>
                    <li><span>Señales de trading</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 content_modulos">
            <div class="row">
              <div class="col-md-8" style="margin: 0 auto; float: none">
                <div class="col-md-4">
                  <img src="<?= asset_url(); ?>/curso/img/modulo3.png" alt="Modulo 1" width="200"/>
                </div>
                <div class="col-md-8">
                  <ul class="item-modulos">
                    <li><span>Que es la Minería P.O.S.</span></li>
                    <li><span>Que son los masternodes y por que ganamos dinero con ellos.</span></li>
                    <li><span>Como escoger y poder invertir en los masternode  mas rentables.</span></li>
                    <li><span>Primeros pasos para la configuración de los masternode.</span></li>
                    <li><span>Donde y cual VPS adquirir para el masternodes, Creando la Wallet y configurándola.</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 content_modulos">
            <div class="row">
              <div class="col-md-8" style="margin: 0 auto; float: none">
                <div class="col-md-4">
                  <img src="<?= asset_url(); ?>/curso/img/modulo4.png" alt="Modulo 1" width="200"/>
                </div>
                <div class="col-md-8">
                  <ul class="item-modulos">
                    <li><span>Configurando nuestro primer Master Node.</span></li>
                    <li><span>Asegurando nuestro VPS y Wallet de ataques inprevistos.</span></li>
                    <li><span>Como Recuperar errores de la Wallet.</span></li>
                    <li><span>Backups de la wallet.</span></li>
                    <li><span>Mantenimiento preventivo de la wallet.</span></li>
                    <li><span>Cuidados a tener en cuenta en la mineria POSy los Master Nodes.</span></li>
                    <li><span>Como convertir nuestras monedas a cualquier criptomoneda.</span></li>
                    <li><span>Como Retirar nuestras ganancias diarias de la wallet.</span></li>
                    <li><span>Cambiando nuestras monedas a dinero fisico.</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 content_modulos">
            <div class="row">
              <div class="col-md-8" style="margin: 0 auto; float: none">
                <div class="col-md-4">
                  <img src="<?= asset_url(); ?>/curso/img/modulo5.png" alt="Modulo 1" width="200"/>
                </div>
                <div class="col-md-8">
                  <ul class="item-modulos">
                    <li><span>Formula secreta Para ganar 400 al mes Con los masternodos</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="title-content clearfix">
            <p>
              <a href="#" target="_blank" data-toggle="modal" data-target="#myModal"><img src="<?= asset_url(); ?>/curso/img/matricularme.png" alt="" width="280"></a>
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </section>
  </main>
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <ul class="social-list">
            <li><a href="https://www.facebook.com/Academia-De-Trading-496295420749430/?fref=ts" target="_blank"><i class="si social-facebook" aria-hidden="true"></i></a></li>
          </ul>
          <p class="copyright"> © Copyright <span id="year">2017</span>. All Rights Reserved</p>
          <p class="copyright"> <a href="http://www.adrianalvarez.net/">www.AdrianAlvarez.net</a></p>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </footer>
  <!-- Scripts -->
  <script src="<?= asset_url(); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= asset_url(); ?>plugins/bootstrap/js/bootstrap.js" crossorigin="anonymous"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108152284-1"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>plugins/particles/particles.min.js"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>plugins/particles/stats.js"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>ventas/js/smooth-scroll.min.js"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>ventas/js/modernizr.mq.js"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>ventas/js/mixitup.min.js"></script>
  <script type="text/javascript" src="<?= asset_url(); ?>ventas/js/slick.min.js"></script>
  <script src="<?= asset_url(); ?>ventas/js/wow.js"></script>
  <script src="<?= asset_url(); ?>ventas/js/bootstrap-notify.min.js"></script>
  <script src="<?= asset_url(); ?>ventas/js/custom.js"></script>
  <script src="<?= asset_url(); ?>js/script.js"></script>
  <!--<script src="https://matthew.wagerfield.com/parallax/deploy/jquery.parallax.js"></script>-->
  <script>
   particlesJS('content-particles',

   {
    "particles": {
     "number": {
      "value": 200,
      "density": {
       "enable": true,
       "value_area": 800
     }
   },
   "color": {
    "value": "#ffffff"
  },
  "shape": {
    "type": "circle",
    "stroke": {
     "width": 0,
     "color": "#000000"
   },
   "polygon": {
     "nb_sides": 5
   }
 },
 "opacity": {
  "value": 0.5,
  "random": false,
  "anim": {
   "enable": false,
   "speed": 1,
   "opacity_min": 0.1,
   "sync": false
 }
},
"size": {
  "value": 5,
  "random": true,
  "anim": {
   "enable": false,
   "speed": 40,
   "size_min": 0.1,
   "sync": false
 }
},
"line_linked": {
  "enable": true,
  "distance": 150,
  "color": "#ffffff",
  "opacity": 0.4,
  "width": 1
},
"move": {
  "enable": true,
  "speed": 4,
  "direction": "none",
  "random": false,
  "straight": false,
  "out_mode": "out",
  "attract": {
   "enable": false,
   "rotateX": 600,
   "rotateY": 1200
 }
}
},
"interactivity": {
 "detect_on": "canvas",
 "events": {
  "onhover": {
   "enable": true,
   "mode": "repulse"
 },
 "onclick": {
   "enable": true,
   "mode": "push"
 },
 "resize": true
},
"modes": {
  "grab": {
   "distance": 400,
   "line_linked": {
    "opacity": 1
  }
},
"bubble": {
 "distance": 400,
 "size": 40,
 "duration": 2,
 "opacity": 8,
 "speed": 3
},
"repulse": {
 "distance": 200
},
"push": {
 "particles_nb": 4
},
"remove": {
 "particles_nb": 2
}
}
},
"retina_detect": true,
"config_demo": {
 "hide_card": false,
 "background_color": "#b61924",
 "background_image": "",
 "background_position": "50% 50%",
 "background_repeat": "no-repeat",
 "background_size": "cover"
}
}

);
</script>
</body>
</html>