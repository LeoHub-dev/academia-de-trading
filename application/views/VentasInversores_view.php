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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,600i" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/social-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/style3.css">
  <script src="https://use.fontawesome.com/a7fd4b808d.js"></script>
  <link rel="icon" type="image/png" href="<?= asset_url(); ?>ventas/img/logo.png" />
	<style type="text/css">
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
	<div id="loaderDiv">
	  <div id="loaderNoImage">
	    <div class="cssload-thecube">
			<div class="cssload-cube cssload-c1"></div>
			<div class="cssload-cube cssload-c2"></div>
			<div class="cssload-cube cssload-c4"></div>
			<div class="cssload-cube cssload-c3"></div>
		</div>
	</div>
	</div>
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
		      <a id="brand-mobile" class="navbar-brand navbar-brand-center smoothScroll" href="#home">
		        <img alt="Academia De Trading" src="<?= asset_url(); ?>/ventas/img/logo.png">
		      </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse " id="main-navbar" >
				  <div class="nav" style="display: inline">
		        <div class="container-fluid vcenter" style=" ">
							<div class="row vertical-align">
								<div class="col-md-4">
									<a class="navbar-brand smoothScroll" href="#home">
										<img alt="Academia De Trading" src="<?= asset_url(); ?>/ventas/img/Logo-Academia.png" >
									</a>
								</div>
								<div class="col-md-8">
									<div class="vcenter" style="">
                      <?php if (@$referido_name): ?>
                        <h3 class="tex-reset f40 "><?php echo $referido_name.' te invita a registrarte'  ?></h3>
                      <?php endif ?>
				          </div>
			          </div>
							</div>
						</div>
			    </div>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
		</nav>
	</header>

	<main>
		<section id="explicacion" class="bg-1">
			<div class="container-fluid not-so-fluid">
				<div class="overlay"></div>
				<div>
					<h3 class="clearfix font-white medium titulo">
						Club de Inversionistas <br>
					</h3>
					<p class="clearfix font-white medium subtitulo">
						"Pagamos 180% de Rentabilidad <br>
						De Tu Dinero Sin Que Muevas Un Dedo <br>
						y Sin Que Pierdas Ni Un Centavo!"
					</p>
					<div class="title-content clearfix">
						<div id="home-video-text">
							<div class="col-md-7" id="home-video">
								<div class=" ifra embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/245812578?title=0&amp;byline=0&amp;portrait=0;autoplay=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
								</div>
							</div> <!-- /.col -->
							<div class="col-md-5">
							<div class="box">
								<div class="col-md-12 some-margin">
									<h3 class="clearfix font-yellow">CALIFICA COMO UN INVERSIONISTA</h3>
								</div>
								<div class="col-md-12 some-margin">
									<h4 class="clearfix">Te llamaremos para ver si puedes invertir con nosotros</h4>
								</div>
								<form id="formula" method="post" action="<?= site_url('contactos-store'); ?>"class="contact-form">
					
									<div class="row">
										<div class="col-md-12 some-margin">
											<label class="sr-only" for="Name">Nombre</label>
											<input type="text" name="name" id="Name" placeholder="Nombre">
										</div>
										
										<div class="col-md-12 some-margin">
											<label class="sr-only" for="Email">Correo Electronico</label>
											<input type="email" name="email" id="Email" placeholder="Correo Electronico">
										</div>

										<div class="col-md-12 some-margin">
											<label class="sr-only" for="Subject">Whatsapp</label>
											<input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp (Con codigo de area)">
										</div>

										<div class="col-md-12 some-margin">
											<label class="sr-only" for="Subject">Ciudad/Pais</label>
											<input type="text" name="ciudad" id="ciudad" placeholder="Ciudad/Pais">
										</div>

										<div class="col-md-12 some-margin">
											<label class="sr-only" for="inversion">Monto que desea invertir</label>
											<input type="text" name="inversion" id="inversion" placeholder="Monto que desea invertir">
										</div>
										<div class="col-md-12 some-margin">
                      <?php if ($send =='true'): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Enviado!</strong> Gracias en breve lo contactaremos...
                        </div>
                      <?php endif ?>
                      <button type="submit" class="btn btn-default black-yellow smoothScroll">QUIERO QUE ME LLAMEN</button>
                    </div>
									</div> <!-- /.row -->
								</form>
							</div>
							</div> <!-- /.col -->
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="" class="bg-gris">
			<div class="container-fluid not-so-fluid">
				<div class="services-container" style="margin-bottom: 30px;margin-top:30px;">
					<div class="row text-center some-margin">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="services-container" style="margin-bottom: 40px; margin-top: 0px">
									<h3 class="medium">QUE ES EL CLUB DE INVERSIONISTAS?</h3>
								</div>
							</div>
						</div>
						<div class="col-md-8 some-margin">
							<div class="col-md-12 text-justify">
								<h4 class="low low-text">
									Es un grupo privado de inversionistas que reune capital
									cada 6 meses para invertir en criptomonedas y obtener una
									altisima rentabilidad sobre su dinero.
								</h4>

								<h4 class="low low-text">
									Nosotros manejamos el presupuesto de estos inversionistas
									y ofrecemos una altisima rentabilidad durante 6 meses.
								</h4>

								<h4 class="low low-text">
									Los inversionistas no tienen que aprender trading, no tienen
									que mover un dedo, nosotros invertimos y nosotros pagamos
									la rentabilidad correspondiente todos los meses.
								</h4>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="<?= asset_url(); ?>ventas/img/grupo-de-inversionista.png" class="img-responsive img-border" style="display: initial;">
						</div>
					</div>
				</div>
			</div> <!-- /.container -->
		</section>

		<div class="col-md-12 flexed clearfix " style="padding: 0; margin: 0">
		
			<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0; margin: 0; display:  flex;">
				<section class="bg-1">

					<div class="container-fluid not-so-fluid" style="padding: 40px 0;">
						<div class="overlay"></div>
						<div>
							<div class="clearfix">
								<div class="col-md-12 some-margin text-center" style="margin-top: 10px;margin-bottom: 20px">
									<h3 class="font-yellow medium">CUANTO ES LA INVERSI&OacuteN Y CUAL ES LA RENTABILIDAD?</h3>
								</div> <!-- /.col -->

								<div class="col-md-4" style="margin-top: 2%">
									<img src="<?= asset_url(); ?>ventas/img/cuanto-es-la-inversion.png" class="img-border img-responsive" >
								</div>
								<div class="col-md-8 font-white">
									<p class="big">
										La inversi&oacute;n para pertenecer al Club de los Inversionistas es de $1,500 dolares
										(si es en bitcoins) o 1,700 dolares (si es en dolares)
									</p>
									<p class="big">La rentabilidad es de $2,700 dolares en 6 cuotas mensuales de $450 dolares.</p>
									<p class="big">Esto es una rentabilidad de 180%, una rentabilidad que le pagamos a los inversionistas
										mensualmente durante 6 meses.</p>
									<p class="big">Esto significa que estamos ofreciendo la rentabilidad mas alta de todo el mercado.</p>

								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<section style="padding: 40px; overflow: hidden;" class="bg-gris clearfix">
			<div class="container-fluid not-so-fluid">
				<div class="services-container" style="margin-bottom: 30px;margin-top:15px;">
					<div class="row text-center some-margin">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="services-container" style="margin-bottom: 40px; margin-top: 0px">
									<h3 class="medium">EN QUE SE HACEN LAS INVERSIONES?</h3>
								</div>
							</div>
						</div>
						<div class="col-md-8 some-margin">
							<div class="col-md-12 text-justify">
								<h4 class="low low-text">
									Nosotros hacemos inversiones en Tradding de manera diaria obteniendo y pagando a nuestros
									inversionistas de manera mensual.
								</h4>

								<h4 class="low low-text">
									Nuestros traders estan capacitados para operar cuando el mercado baja, cuando sube y en
									cualquier situacion siempre obtenemos una rentabilidad para nuestros inversionistas
								</h4>

							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="<?= asset_url(); ?>ventas/img/en-que-se-hacen-las-inversiones.png" class="img-responsive img-border" style="display: initial;">
						</div>
					</div>
				</div>
			</div> <!-- /.container -->
		</section>

		<section class="bg-1" style="padding: 40px">
			<div class="container-fluid not-so-fluid" style="padding-bottom: 30px;">
				<div class="overlay"></div>
				<div>
					<div class="clearfix">
						<div class="col-md-12 some-margin text-center" style="margin-top: 25px;margin-bottom: 10px">
							<h3 class="font-yellow medium">Y QUE PASA SI LOS TRADERS PIERDEN MI DINERO?</h3>
						</div> <!-- /.col -->

						<div class="col-md-4" style="margin-top: 2%">
							<img src="<?= asset_url(); ?>ventas/img/que-pasa-si-pierdenmidinero.png" class="img-border img-responsive" >
						</div>
						<div class="col-md-8 font-white">
							<p class="big">No hay manera de que tu dinero se pierda.</p>
							<p class="big">Ya que los 6 meses de rentabilidad estan asegurados, nosotros manejamos el presupuesto
								y hacemos las inversiones por ti.</p>
							<p class="big">Y pagamos tus cuotas de rentabilidad mes a mes sin fallar una sola vez.</p>
							<p class="big">No hemos fallado a UNO SOLO de nuestros clientes hasta el dia de hoy.</p>

						</div>
					</div>
				</div>
			</div>
		</section>
		<section style="padding: 20px; overflow: hidden;" class="bg-gris clearfix">
			<div class="container-fluid not-so-fluid">
				<div class="services-container" style="margin-bottom: 30px;margin-top:15px;">
					<div class="row text-center some-margin">
						<div class="col-md-12">
							<div class="col-md-12">
								<div class="services-container" style="margin-bottom: 30px; margin-top: 0px">
									<h3 class="medium">COMO PUEDO COMENZAR HOY MISMO?</h3>
								</div>
							</div>
						</div>
						<div class="col-md-8 some-margin">
							<div class="col-md-12 text-justify">
								<h4 class="low low-text">
									Simplemente envianos un whatsapp para hablar con uno de nuestros asesores y calificar para
									ser uno de nuestros inversionistas.
								</h4>

								<h4 class="low low-text">
									Debes considerar que solamente abrimos 15 lugares cada 6 meses, asi que debes ser un
									inversionista decidido, con disposici&oacute;n financiera y listo para invertir en el
									momento que te indiquemos
								</h4>

								<h4 class="low low-text">
									Si las puertas estan abiertas, puedes enviarnos un whatsapp ahora mismo para preguntarnos.
								</h4>

							</div>
						</div>
						<div class="col-md-3 text-center">
							<img src="<?= asset_url(); ?>ventas/img/whasaap.png" class="img-responsive img-border" style="display: initial;">
						</div>
					</div>
				</div>
			</div> <!-- /.container -->
		</section>
	</main>

	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<p class="mail">admin@academiadetrading.net</p>
					<ul class="social-list">
						<li><a href="https://www.facebook.com/Academia-De-Trading-496295420749430/?fref=ts" target="_blank"><i class="si social-facebook" aria-hidden="true"></i></a></li>
					</ul>
					<p class="copyright"> © Copyright <span id="year">2017</span> <span class="text-yellow">Academia De Trading</span>. All Rights Reserved</p>
					<p class="copyright"> <a href="http://www.adrianalvarez.net/">www.AdrianAlvarez.net</a></p>
					<p class="copyright"> <a href="<?= site_url('legal'); ?>">Terminos & Condiciones </a></p>
				</div>
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</footer>
	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108152284-1"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/smooth-scroll.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/modernizr.mq.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/mixitup.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/slick.min.js"></script>
	<script src="<?= asset_url(); ?>ventas/js/wow.js"></script>
	<script src="<?= asset_url(); ?>ventas/js/bootstrap-notify.min.js"></script>
	<script src="<?= asset_url(); ?>ventas/js/custom.js"></script>
	<!--<script src="https://matthew.wagerfield.com/parallax/deploy/jquery.parallax.js"></script>-->
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){
		  dataLayer.push(arguments);
	  }
	  gtag('js', new Date());

	  gtag('config', 'UA-108152284-1');
	</script>
	<script type="text/javascript">
	 	window.setInterval(function(){
      $.get('https://randomuser.me/api/', null, function(person) {
				console.log(person.results[0]);

          $.notify({
						icon: person.results[0].picture.thumbnail,
						title: person.results[0].name.first+" "+person.results[0].name.last,
						message: 'Se ha unido a la academia !'
					},{
						type: 'minimalist',
						delay: 5000,
						icon_type: 'image',
						placement: {
							from: 'bottom',
							align: 'left'
						},
						template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
							'<img data-notify="icon" class="img-circle pull-left">' +
							'<span data-notify="title">{1}</span>' +
							'<span data-notify="message">{2}</span>' +
						'</div>'
					});

        },"json").fail(function(xhr, status, error) {
	            console.log(error);
	            console.log(xhr.responseText);
	            console.log(status);
        });
    }, 30000);
	</script>
</body>
</html>