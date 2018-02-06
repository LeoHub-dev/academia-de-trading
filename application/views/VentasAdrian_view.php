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
	<link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>ventas/css/style2.css">
  <script src="https://use.fontawesome.com/a7fd4b808d.js"></script>
  <link rel="icon" type="image/png" href="<?= asset_url(); ?>ventas/img/logo.png" />

    
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

		

		<!--<section>



				<a href="<?= site_url('auth'); ?>#_registro"><img src="https://i.imgur.com/UCt2I6P.jpg" class="img-responsive"></a>
				

			<div class="services-cta-container">

				<a class="smoothScroll" href="#planes" class="btn btn-default white-yellow">Iniciar Ahora</a>

			</div>

		</section>-->


		<section id="explicacion" class="bg-1">
			



			<div class="container-fluid not-so-fluid">

				<div class="overlay"></div>

				<div>

					<h3 class="clearfix font-white medium titulo">Comience a Invertir en Criptomonedas <br> Sin Ser Experto y Sin Arriesgar Su Dinero</h3>

					<div class="title-content clearfix">



						<div id="home-video-text">

							<div class="col-md-7" id="home-video">
								<div class=" ifra embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/252055460?title=0&amp;byline=0&amp;portrait=0;autoplay=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
								  
								</div>

								<h3 class="clearfix font-yellow tex-reset" style="margin-top: 40px; margin-bottom: 40px;text-align: center; position: relative;">COMPROBADO: 9 de Cada 10 de nuestros Estudiantes Ganan Dinero Diariamente</h3>
								
							</div> <!-- /.col -->
							<div class="col-md-5" style="
    margin-top: 30px;
">
							<div class="box">
								<div class="col-md-12 some-margin">
									<h3 class="clearfix font-yellow">Solicite su asesoria de inversiones aqui</h3>
								</div>
								<div class="col-md-12 some-margin">
									<h4 class="clearfix">Queremos Conocerlo y Ayudarle de Manera Personalizada</h4>
								</div>
								


								<form id="formula" action="<?= site_url('contactos-store'); ?>" method="post" class="contact-form">
					
									<div class="row">

										<div class="col-md-12 some-margin">
											
											<label class="sr-only" for="Name">Nombre</label>
											<input type="text" required name="name" id="Name" placeholder="Nombre">

										</div>
										
										<div class="col-md-12 some-margin">
											
											<label class="sr-only" for="Email">Correo Electronico</label>
											<input type="email" required name="email" id="Email" placeholder="Correo Electronico">

										</div>

										<div class="col-md-12 some-margin">
											
											<label class="sr-only" for="Subject">Whatsapp</label>
											<input type="text" required name="whatsapp" id="whatsapp" placeholder="Whatsapp (Con codigo de area)">

										</div>

										<div class="col-md-12 some-margin">
											
											<label class="sr-only" for="Subject">Ciudad/Pais</label>
											<input type="text" required name="ciudad" id="ciudad" placeholder="Ciudad/Pais">

										</div>

										<div class="col-md-12 some-margin">
											
											<label class="sr-only" for="Subject">Monto que desea invertir</label>
											<input type="text"  required name="inversion" id="inversion" placeholder="Monto que desea invertir">

										</div>
	                                


	                                 <div class="col-md-12 some-margin hidden">
											
											<label class="sr-only" for="Subject">Referido ID</label>
											<input type="text" value="<?= (isset($referido_id)) ? $referido_id : ""; ?>"   name="referido_id" id="referido_id" placeholder="Referido ID">

										</div>






									

									</div> <!-- /.row -->

			

									
<?php if ($send =='true'): ?>
	



<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Enviado!</strong> Gracias en breve lo contactaremos...
</div>

<?php else: ?>

<button type="submit" class="btn btn-default black-yellow smoothScroll" style="margin: 15px auto 0;">QUIERO QUE ME LLAMEN</button>

<?php endif ?>

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
				<div class="services-container" style="margin-bottom: 50px;margin-top:50px;">

				
		
						<div class="row text-center some-margin">
							<div class="col-md-12">
							<div class="col-md-12"><div class="services-container" style="margin-bottom: 40px; margin-top: 0px"><h3 class="medium">¿Aun no estas invirtiendo en Criptomonedas?</h3></div></div>
						</div>
							<div class="col-md-8 some-margin">
								<div class="col-md-12 text-justify">
									<h4 class="some-margin low">El trading de criptomonedas es uno de los negocios mas provechosos y rentables del ultimo siglo, dando ganancias millonarias a gente que ha sabido aprovechar la oportunidad de invertir en criptomonedas.</h4>
<br>
									<h4 class="low">Ya esta usted listo para comenzar a invertir?</h4>
									
								</div>
							</div>
							<div class="col-md-4 text-center">
								
								<img src="<?= asset_url(); ?>ventas/img/moneda.jpg" class="img-responsive" style="display: initial;">

							</div>

							
							
							
							
							
						</div>
				</div>

	
				
			</div> <!-- /.container -->

		</section>

		<div class="col-md-12 flexed clearfix" style="padding: 0; margin: 0">
		
			<div class="col-md-8 col-sm-12 col-xs-12" style="padding: 0; margin: 0; display:  flex;">
				<section id="explicacion" class="bg-1">

					<div class="container-fluid not-so-fluid">

						<div class="overlay"></div>

						<div>

							<div class="clearfix">

								
								<div class="col-md-12 some-margin">
									<h3 class="font-yellow big">La academia de Trading</h3>
								</div> <!-- /.col -->

								<div class="col-md-12 font-white">
								
									<div class="col-md-12">
										<div class="col-md-12">
										<p class="big">La academia de trading es la solucion para cualquier persona que quiera comenzar a invertir en el mundo de las criptomonedas de manera exitosa.</p>
										<p class="big">Sin pasar meses y meses de aprendizaje y sin tener que arriesgar a perder todo su dinero.</p>
										<p class="big">En la academia de trading encontrara lo siguiente:</p>
									</div>
										<div class="col-md-12">
										<ul class="lista-basica font-yellow">
											<li class="medium"> Curso Básico de Trading: ideal para personas que no tienen experiencia en trabajar con trading o Criptomonedas. Aprenderás el idioma de trading, secretos y estrategias de expertos en trading.</li>
											<li class="medium">	Señales y Alertas de Trading Poloniex y Bittrex: obtendrás en vivo y directo, datos detallados acerca de oportunidades de inversión en trading de Criptomonedas detectadas por nuestro staff de expertos quienes están estudiando las tendencias del mercado las 24 horas del día. Las inversiones las realizarás en las plataformas POLONIEX y BITTREX.</li>
											<li class="medium">	Acceso a Soporte por Skype o Telegram.</li>
											<li class="medium">	Clases de Análisis Técnico 100% en VIVO para avanzados y principiantes.</li>
											<li class="medium">	Acceso a Herramientas Avanzadas: tendrás acceso a nuestra calculadora de ganancias y monitor del mercado que te permitirán monitorear el comportamiento de varias Criptomonedas de manera simultánea y calcular los márgenes de ganancias para reducir al máximo todo riesgo de inversión.</li>
										

										</ul>
								</div>
									</div>
								</div> <!-- /.col -->

									
 
								<div class="col-md-12 text-center padding-top" >
									<a href="#planes" class="btn btn-default black-yellow smoothScroll">QUIERO INSCRIBIRME</a>
								</div>
									
								
								

								

							</div>

							

							

						</div>
					</div>


				</section>
			</div>
	<div class="col-md-4">

<div class="row padding-top" >
	
<h2 class="text-center">TESTIMONIOS REALES <BR>DE NUESTROS CLIENTES</h2>


	<div class="row" >
<br>
<div class="row">
						
							<div class="col-md-12 text-center padding">
	                           <div class="">
							     <img  class="img-thumbnail" width="150px" src="https://i.imgur.com/J1mOynB.jpg" />
							        </div>
								<div class="description">

									<span class="h4 padding5">Alfredo Gutierrez Uzcanga</span>


									<div class="biography">

										<p>Estoy en una plataforma dónde estoy a prendiendo hacer trading y lo mejor que tenemos un gran equipo de amigos que nos ayudan air mejorando paso a paso y que uno mismo tiene la responsabilidad de manejar su propio dinero.     </p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

</div>

<div class="row">
			
							<div class="col-md-12 text-center padding">
	                           <div class="">
							     <img  class="img-thumbnail" width="150px" src="https://i.imgur.com/vpIgPlC.jpg" />
							        </div>
								<div class="description">

									<span class="h4 padding5">Jose Rondon</span>


									<div class="biography">

										<p>El mejor trabajo en equipo, ayuda y orentación en el mercado de trading de cryptomonedas   </p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

</div>

<div class="row">
			
							<div class="col-md-12 text-center padding">
	                           <div class="">
							     <img  class="img-thumbnail" width="150px" src="https://i.imgur.com/FVnXGd5.jpg" />
							        </div>
								<div class="description">

									<span class="h4 padding5">Gerardo Sanchez</span>


									<div class="biography">

										<p>Estoy en una plataforma dónde estoy a prendiendo hacer trading y lo mejor que tenemos un gran equipo de amigos que nos ayudan air mejorando paso a paso y que uno mismo tiene la responsabilidad de manejar su propio dinero.     </p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

</div>





						</div>



</div>





										

										</div>


			<!--<div class="col-md-2 col-sm-12 col-xs-12 text-center some-padding">
				<div class="col-md-12">


					<h3>Testimonios Reales de nuestros estudiantes</h3>

					<img src="https://i.imgur.com/k05RZcp.jpg" class="img-responsive some-margin" style="max-width: 130px; float: none; display: initial;" />

					<h3>Nombre</h3>

					<p>Testimonio</p>

					<img src="https://i.imgur.com/k05RZcp.jpg" class="img-responsive some-margin" style="max-width: 130px; float: none; display: initial;" />

					<h3>Nombre</h3>

					<p>Testimonio</p>



				</div>
			</div>-->
		</div>

		

		

		

		<section class="business-section clearfix" id="equipo" style="padding-top: 1px">
			<div class="container">

				
				<div class="services-container clearfix">

					<div class="col-md-4">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> INCREMENTE SU INVERSIÓN</h2>
							<p>A través de las señales puede ganar al menos el 4% diario.</p>
						</div>
					</div>

					<div class="col-md-4">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> NOTIFICACIONES AL INSTANTE</h2>
							<p>La información la recibirá al momento de ser emitida, garantizando así pueda hacer su operación.</p>
						</div>
					</div>

					<div class="col-md-4">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> USTED MANEJA SU DINERO</h2>
							<p>Bajo ningún motivo recibimos inversiones de clientes, usted mismo maneja su dinero y operaciones.</p>
						</div>
					</div>

					<div class="col-md-4 clearfix">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> ANÁLISIS PROPIOS</h2>
							<p>Garantizamos la información gracias a que los análisis son realizados por el Staff.</p>
						</div>
					</div>

					<div class="col-md-4">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> NO OPERE A CIEGAS</h2>
							<p>Usted mismo puede colocar la información en su cuenta de Poloniex o Bittrex , sin depender de un sistema automatizado.</p>
						</div>
					</div>

					<div class="col-md-4">
		
						<div class="row text-center benefits-box">
							<h2><i class="fa fa-check-square" aria-hidden="true"></i> ACOMPAÑAMIENTO</h2>
							<p>Siempre tendrá nuestro acompañamiento y ayuda de todos los otros miembros a través de nuestro Chat.</p>
						</div>
					</div>


				</div>

	
				
			</div> <!-- /.container -->
		</section>



		<section id="planes" class="" style="background-color: white">

	

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title" style="color: black">Inscribase en la Academia Ahora</h2>

							

						</div>

					</div>

				</div> <!-- /.row -->

				<div class="row about-team">


		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite col-md-6 col-sm-6">
		                <div class="wn-plan__box">
		               

<img class="img-responsive" src="<?= asset_url(); ?>/ventas/img/planbasico.jpg" alt="">


		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>
		           


		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite wn-plan--last col-md-6 col-sm-6">
		                <div class="wn-plan__box">
		                   
		           <img class="img-responsive" src="<?= asset_url(); ?>/ventas/img/plan-Enterprise.jpg" alt="">         


		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>

				</div> <!-- /.row -->


			</div> <!-- /.container -->

			

		</section>

		
		<section id="explicacion" class="bg-100" style="padding-bottom: 40px">

			<div class="container-fluid not-so-fluid">

			

				<div>

					<div class="clearfix">

						
						<div class="col-md-12 some-margin text-center">
							<h3 class="font-white big" style="letter-spacing: 8px;">NO PIERDA MAS TIEMPO!</h3>
						</div> <!-- /.col -->

						<div class="col-md-12 some-margin text-center">
							<h3 class="font-yellow medium">COMIENCE A INVERTIR EN CRIPTOMONEDAS CON LOS EXPERTOS DE LA INDUSTRIA</h3>
						</div> <!-- /.col -->

						<div class="col-md-4">
							
						</div>
						<div class="col-md-8 font-white">
							<p class="big">En la academia de trading usted tiene todo lo que necesita para comenzar a invertir en criptomonedas y obtener altas rentabilidades.</p>
							<p class="big">No pierda mas tiempo y dinero tratando de invertir en otras cosas que no funcionan o con otras empresas que solo quieren quitarle su dinero.</p>
							<p class="big">Comience a invertir con los expertos hoy mismo y gane dinero en esta rentable industria aprendiendo a manejar usted mismo sus inversiones.</p>	
							<div class="col-md-12 text-center">
							<a href="#planes" class="btn btn-default black-yellow smoothScroll">QUIERO INSCRIBIRME</a>
						</div>
						</div>

						

						
							
						
						

						

					</div>

					

					

				</div>
			</div>


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
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/smooth-scroll.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/modernizr.mq.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/mixitup.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>ventas/js/slick.min.js"></script>
	<script src="<?= asset_url(); ?>ventas/js/wow.js"></script>
	<script src="<?= asset_url(); ?>ventas/js/bootstrap-notify.min.js"></script>



	

	<!--<script src="https://matthew.wagerfield.com/parallax/deploy/jquery.parallax.js"></script>-->

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

	<script type="text/javascript">
		/*var scene = $('#scene');
		scene.parallax();
		$.notify('I will not close until my delay is up.', {
			allow_dismiss: false,
			placement: {
				from: 'bottom',
				align: 'left'
			},
			type: 'success'
		});*/

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

		/*$.notify({
			icon: 'https://randomuser.me/api/portraits/med/men/77.jpg',
			title: 'Byron Morgan',
			message: 'Momentum reduce child mortality effectiveness incubation empowerment connect.'
		},{
			type: 'minimalist',
			delay: 5000,
			icon_type: 'image',
			template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
				'<img data-notify="icon" class="img-circle pull-left">' +
				'<span data-notify="title">{1}</span>' +
				'<span data-notify="message">{2}</span>' +
			'</div>'
		});*/
				
	</script>

	<!-- Latest compiled and minified JavaScript Bootstrap-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<!-- Custom JS -->
	<script src="<?= asset_url(); ?>ventas/js/custom.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108152284-1"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

	  	gtag('config', 'UA-108152284-1');
	</script>

</body>
</html>