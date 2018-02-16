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
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>home/css/social-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>home/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>home/css/style.css">
    <script src="https://use.fontawesome.com/a7fd4b808d.js"></script>
    <link rel="icon" type="image/png" href="<?= asset_url(); ?>home/img/logo.png" />

    
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
		        <li class="active"><a class="smoothScroll" href="#home">Home <span class="sr-only">(current)</span></a></li>
		        <li><a class="smoothScroll" href="http://tradingcoin.us/">TradingCoin</a></li>
		        <li><a class="smoothScroll" href="#planes">Planes</a></li>
		       

		      		<li><a target="_blank" href="http://criptobitcoins.com/news/">Noticias</a></li>
		      	<li id="brand-desktop">
					<a class="navbar-brand smoothScroll" href="#home">
						<img alt="Academia De Trading" src="<?= asset_url(); ?>/home/img/logo.png">
					</a>
		      	</li>
		      	<li><a class="smoothScroll" href="#inversiones">Inversiones</a></li>
		        <li><a class="smoothScroll" href="#senales">Señales</a></li>
		        <li class="active"><a class="" href="<?= site_url('auth'); ?>">Login</a></li>
		        <li class="active"><a class="" href="<?= site_url('auth'); ?>#_registro">Registro</a></li>
		      </ul>
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


		<section id="explicacion">



			<div class="container">

				<div class="row">
					
			

					<div class="title-content clearfix">

						<div id="home-video-text">
							<div class="col-md-8" id="home-video">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/252055460?title=0&amp;byline=0&amp;portrait=0;autoplay=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
								  
								</div>
								
							</div> <!-- /.col -->
							<div class="col-md-4">
								<h2 id="home-title" class="section-title clearfix">9 de Cada 10 de Nuestros Estudiantes de Trading Están Ganando Dinero DIARIAMENTE</h2>
							</div> <!-- /.col -->
						</div>
						

						

					</div>

					<h3 class="clearfix" style="margin-top: 40px; margin-bottom: 40px;text-align: center">Aún Sin Tener Experiencia, Lograrás Maximizar Tus Ganancias Mientras Minimizas los Riesgos de Inversión en Trading de Criptomonedas</h3>

					

				</div>
			</div>
		</section>

		<section id="home">

			<!-- Section title -->
			<h1 class="sr-only">Home</h1>

			<div id="carousel-hero" class="carousel slide" data-ride="carousel">

				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-hero" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-hero" data-slide-to="1"></li>
					<li data-target="#carousel-hero" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
			
					<div   class="item active bg-1">

						<div class="overlay"></div>

						<div class="carousel-caption">
										
							<!--<span class="h3">Bienvenido a la <span class="text-yellow">Academia De Trading</span></span>

							<!--<span class="h1">Brands</span>

							<p>TRANSFORMAMOS EMPRENDEDORES EN TRADERS PROFESIONALES.</p>-->
							<p style=""><img src="<?= asset_url(); ?>/home/img/logofull.png" class="img-responsive" style="max-height:100px; display: initial;"></p>

							<!--<a href="<?= site_url('auth'); ?>#_registro" class="btn btn-default white-yellow">Inscribete</a>-->

						</div>

					</div> <!-- /.item -->

					<div class="item bg-2">

						<div class="overlay"></div>

						<div class="carousel-caption">
										
							<!--<span class="h4">Hello,we are <span class="text-yellow">Academia De Trading</span>, and we create</span>-->

							<span class="h1">Tutoriales</span>

							<p>Dentro de nuestro sistema podras aprender a como tradear y poder generar tu propio ingreso.</p>

							<a href="<?= site_url('auth'); ?>#_registro" class="btn btn-default white-yellow">Inscribete</a>

						</div>

					</div> <!-- /.item -->

					<div class="item bg-3">

						<div class="overlay"></div>

						<div class="carousel-caption">

							<span class="h1">Señales</span>

							<p>Tendras acceso a una amplia opcion de señales para ayudarte a tu trading.</p>

							<a href="<?= site_url('auth'); ?>#_registro" class="btn btn-default white-yellow">Inscribete</a>

						</div>

					</div> <!-- /.item -->
				
				</div> <!-- /.carousel-inner -->

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-hero" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-hero" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div> <!-- /.carousel -->

		</section>

		<section id="">
			<div class="container">
				<div class="services-container" style="margin-bottom: 0px;margin-top:80px;">

				
		
						<div class="row text-center">
							<div class="services-container" style="margin-bottom: 40px; margin-top: 0px"><h2>Herramientas Avanzadas que disfrutaras al ser parte de nuestra Academia</h2></div>
							<div class="col-md-6">
								<img src="https://i.imgur.com/kK0ZN4T.png" class="img-responsive">
							</div>
							<div class="col-md-6">
								<div class="col-md-12">
									<h3>Monitor de Mercado</h3>
									<a href="https://i.imgur.com/6EhuWlE.png" target="_blank"><img src="https://i.imgur.com/6EhuWlE.png" class="img-responsive"></a>
								</div>
								<div class="col-md-12">
									<h3>Calculadora de Ganancias</h3>
									<a href="https://i.imgur.com/ZQCQ9qd.png" target="_blank"><img src="https://i.imgur.com/ZQCQ9qd.png" class="img-responsive"></a>
								</div>
							</div>

							
							
							
							
							
						</div>
				</div>

	
				
			</div> <!-- /.container -->

		</section>

		

		<section id="">

			<div class="we-make-section">

				<div class="overlay_soft"></div>
				
				<div class="container">
					
					<div class="row reorder-sm">
						
						
						<div class="col-md-12">

							<div class="features-container">

								<h3>¿Qué encontrarás en Academia de Trading?</h3>

								<!--<p>Nuestro amplio curso en línea desarrollado por traders para traders consta de más de 20 clases de video que cubren todo, desde lo básico a las estrategias avanzadas de comercio criptográfico. Estudia desde la comodidad de tu casa a tu propio ritmo y en tu propio horario con nuestras clases pregrabadas a las cuales tendrás acceso dentro de nuestro portal web.</p>-->

								<ul class="features-list">
									<li>-	Curso Básico de Trading: ideal para personas que no tienen experiencia en trabajar con trading o Criptomonedas. Aprenderás el idioma de trading, secretos y estrategias de expertos en trading.</li>
									<li>-	Señales y Alertas de Trading Poloniex y Bittrex: obtendrás en vivo y directo, datos detallados acerca de oportunidades de inversión en trading de Criptomonedas detectadas por nuestro staff de expertos quienes están estudiando las tendencias del mercado las 24 horas del día. Las inversiones las realizarás en las plataformas POLONIEX y BITTREX.</li>
									<li>-	Acceso a Soporte por Skype o Telegram: diariamente recibirás ayuda e información valiosa, oportuna y privilegiada que te harán multiplicar tus ingresos. Además, podrás intercambiar experiencias con otros miembros de nuestra comunidad.</li>
									<li>-	Clases de Análisis Técnico: aprenderás con mayor profundidad cómo analizar el mercado de Criptomonedas para maximizar tus ganancias y minimizar los riesgos de inversión.</li>
									<li>-	Acceso a Herramientas Avanzadas: tendrás acceso a nuestra calculadora de ganancias y monitor del mercado que te permitirán monitorear el comportamiento de varias Criptomonedas de manera simultánea y calcular los márgenes de ganancias para reducir al máximo todo riesgo de inversión.</li>
									<li>-	Te ayudaremos a tomar control de tus inversiones en Criptomonedas haciendo Trading en Poloniex y Bittrex.</li>
									<li>-	Siempre sentirás el apoyo de nuestro equipo de expertos y otros miembros de la comunidad. Nunca estarás solo en el camino.</li>
									<li>-	Invertirás tu dinero con la seguridad de obtener ganancias gracias al análisis de nuestro staff de expertos que minimizan todo riesgo de inversión.</li>
									<li>-	Recibirás señales y alertas sobre oportunidades de inversión en vivo y directo, que te ayudarán a multiplicar tus ingresos.</li>
									<li>-	No necesitarás tener experiencia para aprender a generar buenos ingresos haciendo trading.</li>
									<li>-	Y mucho más…</li>

								</ul>

							</div> <!-- /.features-container -->
							
						</div> <!-- /.col -->

					</div> <!-- /.row -->

				</div> <!-- /.container -->

			</div> <!-- /.we-make-section -->

			<div class="services-cta-container">

				<a href="#planes" class="btn btn-default white-yellow smoothScroll">Aprender Trading AHORA</a>

			</div>

		</section>

		

		<section style="margin-top: 30px; margin-bottom: 40px; overflow: hidden;">

			<div class="row">
					
				<div class="col-md-8 col-md-offset-2">

					<div class="title-content">
						
						<h2 class="section-title">Testimonios</h2>

						

					</div>

				</div>

			</div>

			<div class="about-team slider-container">

				<div class="team-member grabbable">

					<div class="container">

						<div class="row" style="display: flex;align-items: center;justify-content: center;">

							<div class="col-md-4">

								<div class="img-container">	
									<!--<img src="https://i.imgur.com/J1mOynB.jpg" alt="Alfredo Gutierrez Uzcanga" class="circle-img">-->
									<div class="round">
							            <img src="https://i.imgur.com/J1mOynB.jpg" />
							        </div>
								</div>

							</div>

							<div class="col-md-8">

								<div class="description">

									<span class="h4">Alfredo Gutierrez Uzcanga</span>


									<div class="biography">

										<p>Estoy en una plataforma dónde estoy a prendiendo hacer trading y lo mejor que tenemos un gran equipo de amigos que nos ayudan air mejorando paso a paso y que uno mismo tiene la responsabilidad de manejar su propio dinero.     </p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

						</div> <!-- /.row -->

					</div> <!-- /.container -->

				</div> <!-- /.team-member -->

				<div class="team-member grabbable">

					<div class="container">

						<div class="row" style="display: flex;align-items: center;justify-content: center;">

							<div class="col-md-4">

								<div class="img-container">	
									<!--<img src="https://i.imgur.com/J1mOynB.jpg" alt="Alfredo Gutierrez Uzcanga" class="circle-img">-->
									<div class="round">
							            <img src="https://i.imgur.com/vpIgPlC.jpg" />
							        </div>
								</div>

							</div>

							<div class="col-md-8">

								<div class="description">

									<span class="h4">Jose Rondon</span>


									<div class="biography">

										<p>El mejor trabajo en equipo, ayuda y orentación en el mercado de trading de cryptomonedas.</p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

						</div> <!-- /.row -->

					</div> <!-- /.container -->

				</div> <!-- /.team-member -->


				<div class="team-member grabbable">

					<div class="container">

						<div class="row" style="display: flex;align-items: center;justify-content: center;">

							<div class="col-md-4">

								<div class="img-container">	
									<!--<img src="https://i.imgur.com/J1mOynB.jpg" alt="Alfredo Gutierrez Uzcanga" class="circle-img">-->
									<div class="round">
							            <img src="https://i.imgur.com/FVnXGd5.jpg" />
							        </div>
								</div>

							</div>

							<div class="col-md-8">

								<div class="description">

									<span class="h4">Gerardo Sanchez</span>


									<div class="biography">

										<p>Mi experiencia en esta gran academia de trading que gracias a Dios conocí, me a dado tanto en aprendisaje que la verdad no sabria como pagarles. Este camino a sido de gran bendicion y crecimiento como en el tranding como personal. Me a enseñado a pensar en grande a soñar y perseguir mis sueños a un que es un logro pequeño pero gigante para mi.</p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

						</div> <!-- /.row -->

					</div> <!-- /.container -->

				</div> <!-- /.team-member -->

				<div class="team-member grabbable">

					<div class="container">

						<div class="row" style="display: flex;align-items: center;justify-content: center;">

							<div class="col-md-4">

								<div class="img-container">	
									<!--<img src="https://i.imgur.com/J1mOynB.jpg" alt="Alfredo Gutierrez Uzcanga" class="circle-img">-->
									<div class="round">
							            <img src="https://i.imgur.com/MGWiP7Om.png" />
							        </div>
								</div>

							</div>

							<div class="col-md-8">

								<div class="description">

									<span class="h4">Osmel Cedeño</span>


									<div class="biography">

										<p>Si todas las Academias de Trading fueran como este, creo que menos gente perdería dinero en los mercados. Definitivamente mi operativa ha mejorado y apenas llevo 2 semanas. Entrar a la Academia me ayudo a establecer unas bases más solidad a las que tenía. Pensé que me las sabía todas y no tenía por qué pagar 20$ pero definitivamente esto fue lo mejor que hice pase en poco tiempo de perdedor a ganador.</p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

						</div> <!-- /.row -->

					</div> <!-- /.container -->

				</div> <!-- /.team-member -->

				<div class="team-member grabbable">

					<div class="container">

						<div class="row" style="display: flex;align-items: center;justify-content: center;">

							<div class="col-md-4">

								<div class="img-container">	
									<!--<img src="https://i.imgur.com/J1mOynB.jpg" alt="Alfredo Gutierrez Uzcanga" class="circle-img">-->
									<div class="round">
							            <img src="https://i.imgur.com/k05RZcp.jpg" />
							        </div>
								</div>

							</div>

							<div class="col-md-8">

								<div class="description">

									<span class="h4">Angel Guerrero</span>


									<div class="biography">

										<p>Estoy muy contento de haber ingresado a la academia son muy profesionales y están atentos en ayudar.... Vamos por más gracias amigos.</p>


									</div>

					

								</div> <!-- /.desctiption -->

							</div>

						</div> <!-- /.row -->

					</div> <!-- /.container -->

				</div> <!-- /.team-member -->

				
				
			</div> <!-- /.about-team -->


		</section>

		<section class="business-section" id="equipo">
			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title" style="color: white;">SEÑALES Y ALERTAS TRADING POLONIEX Y BITTREX</h2>

							

						</div>

					</div>

				</div>
				<div class="services-container clearfix">

					<div class="col-md-4 benefits-box">
		
						<div class="row text-center">
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

					<div class="col-md-4">
		
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



		<section id="planes">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">Planes</h2>

							

						</div>

					</div>

				</div> <!-- /.row -->

				<div class="row about-team">


		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite col-md-6 col-sm-6">
		                <div class="wn-plan__box">
		                    <div class="wn-plan__header">
		                        <div class="wn-header wn-header--reduce wn-header--center wn-header--wysiwyg">
		                            <h3 class="wn-header__text">Plan Basico</h3>
		                        </div>
		                    </div>
		                    <div class="wn-plan__number">
		                        <div class="wn-number wn-number--price">
		                            <div class="wn-number__num">
		                                <div class="wn-number__group">
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">40</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption">Por Mes </font><!--<br><br><small style="text-decoration: line-through;"><font color="red">$40 / Mes </font></small>--></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
			                    	<li><strong>Aprende</strong> el trading basico</li>
			                    	<li><strong>1 a 3</strong> señales por dia</li>
			                    	<li>Apoyo por <strong>Skype o Telegram</strong></li>
			                    	<li>Se parte de la <strong>comunidad</strong></li>
			                    	<li>Acceso a las <strong>herramientas</strong> de la pagina</li>
			                    	<li>Invita <strong>3 referidos (Activos)</strong> y obten el mes gratis</li>
		                    	</ul></div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>
		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite wn-plan--last col-md-6 col-sm-6">
		                <div class="wn-plan__box">
		                    <div class="wn-plan__header">
		                        <div class="wn-header wn-header--reduce wn-header--center wn-header--wysiwyg">
		                            <h3 class="wn-header__text">ENTERPRISE</h3>
		                        </div>
		                    </div>
		                    <div class="wn-plan__number">
		                        <div class="wn-number wn-number--price">
		                            <div class="wn-number__num">
		                                <div class="wn-number__group">
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">250</span> 
		                                </div>
		                            </div>
		                            <div class="wn-number__caption">Pago Unico<!--<br><br><small style="text-decoration: line-through;"><font color="red">$497</font></small>--></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
			                    	<li>Un <strong>SOLO</strong> pago</li>
			                    	<li>Acceso a <strong>todo</strong> el paquete basico</li>
			                    	<li>Señales <strong>ilimitadas</strong> todo el dia</li>
			                    	<li><strong>Clases</strong> de analisis tecnico</li>
			                    	<li>Curso de trading <strong>fundamental</strong></li>
			                    	<li>Acceso a las <strong>herramientas</strong> de la pagina</li>
		                    	</ul></div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>

				</div> <!-- /.row -->


			</div> <!-- /.container -->

			

			<div class="business-section">

				<div class="container">

					<div class="row">

						<h3>Academia De Trading es perfecto para aprender</h3>

						<p><i>Entra a nuestra plataforma y aprende todo sobre trading.</i></p>

						<a href="#planes" class="btn btn-default white-yellow smoothScroll">Quiero ser Trader YA</a>

					</div> <!-- /.row -->

					<div class="row">

						<div class="col-md-10 col-md-offset-1">

							<div class="img-container">

								<img src="<?= asset_url(); ?>/home/img/meeting-peoples.png" alt="Browsers image">

							</div>

						</div>

					</div> <!-- /.row -->

				</div><!-- /.container -->

			</div> <!-- /.business-section -->

		</section>



		<section id="equipo">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">Equipo</h2>

						</div>

					</div>

				</div> <!-- /.row -->

			</div> <!-- /.container -->

			<div class="container" style="margin-top: 89px">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="at-grid" data-column="3">
						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/team_adrian.png"></div>
						        <div class="at-user__name">Adrian Alvarez</div>
						        <div class="at-user__title">CEO &amp; Fundador</div>

						      </div>
						    </div>

						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/team_ernesto.png"></div>
						        <div class="at-user__name">Ernesto Rodriguez</div>
						        <div class="at-user__title">Master Trader</div>

						      </div>
						    </div>

						   
						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="https://i.imgur.com/BZPkhMG.jpg"></div>
						        <div class="at-user__name">Gabriel Blanco</div>
						        <div class="at-user__title">Chief of Marketing</div>
						 
						      </div>
						    </div>


						    


						     <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/team_liangely.png"></div>
						        <div class="at-user__name">Liangely sanchez</div>
						        <div class="at-user__title">Customer Service</div>
						 
						      </div>
						    </div>

						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/team_sugey.png"></div>
						        <div class="at-user__name">Sugey Reyes</div>
						        <div class="at-user__title">Customer Service</div>
						 
						      </div>
						    </div>

						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="https://i.imgur.com/TeBUVNI.png"></div>
						        <div class="at-user__name">Willy Tirado</div>
						        <div class="at-user__title">Master Trader / Republica Dominicana</div>
						 
						      </div>
						    </div>


						    	    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/leonardo-jimenez.jpg"></div>
						        <div class="at-user__name">Leonardo Jimenez</div>
						        <div class="at-user__title">IT Department</div>
						 
						      </div>
						    </div>




						    	    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="<?= asset_url(); ?>images/douglas-nieves.jpg"></div>
						        <div class="at-user__name">Douglas Nieves</div>
						        <div class="at-user__title">IT Department</div>
						 
						      </div>
						    </div>





					  	</div>

					</div>

				</div> <!-- /.row -->

			</div> <!-- /.container -->

			
			

			<div class="services-cta-container">

				<a href="<?= site_url('auth'); ?>#_registro" class="btn btn-default white-yellow">Iniciar Ahora</a>

			</div>

		</section>

		<!--<section>

			



<img src="<?= asset_url(); ?>images/networkmarketing.jpg"  alt="" width="100%">


			<div class="clearfix s" style="color: white ">


<style type="text/css" media="screen">
#plan {

	 left: 50%;
    top: 90%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    z-index: 1;
    position: absolute;
}

@media screen and (max-width: 500px) {

#plan {

position: relative;
float: left;
}


}
	
</style>
<div id="plan" style="">


<a href="<?= site_url('compensacion'); ?>" class="btn btn-lg btn-warning">Plan de compensación</a>
</div>


				<div class="col-md-6 text-center" style="padding-bottom: 50px; padding-top: 50px; background-color: #1158d8;">
					<h2><?= count($lista_old_matriz); ?> Ciclados</h2>

				</div>


				<div class="col-md-6 text-center" style="padding-bottom: 50px; padding-top: 50px; background-color: #000a3f">

					<h2>$ <?= count($lista_old_matriz)*500; ?> Repartidos</h2>

				</div>

			</div> 

		</section>-->

		<section id="inversiones">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">Curso de contratos ICO's</h2>

							

						</div>

					</div>

				</div> <!-- /.row -->

				<div class="row about-team">

					
		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite col-md-12 col-sm-12">
		                <div class="wn-plan__box">
		                    <div class="wn-plan__header">
		                        <div class="wn-header wn-header--reduce wn-header--center wn-header--wysiwyg">
		                            <h3 class="wn-header__text">Paquete de</h3>
		                        </div>
		                    </div>
		                    <div class="wn-plan__number">
		                        <div class="wn-number wn-number--price">
		                            <div class="wn-number__num">
		                                <div class="wn-number__group">
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">1500</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption"></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
		                    	<li> <h2>TEMARIO</h2></li>
			                   <li>Blockchain security</li>
			                   <li>Requerimientos</li>
			                   <li>Bajar cartera</li>
			                   <li>Instalar cartera</li>
			                   <li>Masternode public address</li>
			                   <li>Fundar tu cartera con la moneda</li>
			                   <li>Instalar y Setup de VPS</li>
			                   <li>Cargar los file de la moneda en el servidor</li>
			                   <li>Servidor</li>
			                   <li>Conectar el servidor con la wallet</li>
			                   <li>Recibir ganancias</li>
		                    	</ul></div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center">
                            
                              <a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-xs-lg btn-default">Comprar Ahora</a>
                            </div>
		                    </div>
		                </div>
		            </div>
		           

				</div> <!-- /.row -->


			</div> <!-- /.container -->



		</section>

		<section id="senales">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">Señales</h2>

							<h3>Aqui las ultimas señales que se cumplieron.</h3>



						</div>

					</div>

				</div> <!-- /.row -->



			</div> <!-- /.container -->

			<div class="container">

				<div class="services-container clearfix text-center">

					<?php 

						$lista_senal = NULL;

						foreach((array) $lista_indicios as $indicio) : 

						if($indicio->seccion == 1) continue;

						$factura_final = new DateTime($indicio->fecha, new DateTimeZone(TIMEZONE));
						$final = $factura_final->format("Y-m-d");
                        setlocale(LC_TIME,"es_ES");
                        $f = strftime("%d de %B",  $factura_final->getTimestamp());  

                        $data_fecha_hoy = new DateTime(NULL, new DateTimeZone(TIMEZONE));
        				$data_fecha_hoy->modify('-15 days');
        				$fecha_actual = $data_fecha_hoy->format("Y-m-d");


        				if($fecha_actual < $final)
        				{
	                        $lista_senal[str_replace(' ', '', $indicio->fecha)]["fecha"] = $f;
	                        $lista_senal[str_replace(' ', '', $indicio->fecha)]["fecha_raw"] = str_replace(' ', '', $indicio->fecha);
	                        $lista_senal[str_replace(' ', '', $indicio->fecha)]["imagenes"][] = $indicio->imagen;
	                    }

           

                        endforeach;
                    ?>
       
     

			      	<?php $n = 0; foreach((array) $lista_senal as $indicio) : ?>



			      	<div class="col-md-4 text-center">
			      		<div class="col-md-12">
			      			<?= $indicio['fecha']; ?>
			      		</div>
			      		<div class="col-md-12">
			      			<a href="<?= asset_url(); ?>images/indicios/<?= $indicio['imagenes'][0]; ?>" target="_blank"><img src="<?= asset_url(); ?>images/indicios/<?= $indicio['imagenes'][0]; ?>" class="img-responsive" style="height: 400px; margin-bottom:5px; display: inline;"></a>
			      		</div>
			      		<?php if(count($indicio['imagenes']) - 1 > 0) : ?>
			      		<div class="col-md-12">
			      			<div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('inicio/ver_indicio/'); ?><?= str_replace(' ', '', $indicio['fecha_raw']); ?>" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Ver mas (<?= count($indicio['imagenes']) - 1; ?>)</a></div>
		                    </div>
			      		</div>
			      		<?php else : ?>
			      		<div class="col-md-12">
			      			<div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Ir a la academia</a></div>
		                    </div>
			      		</div>
			      		<?php endif; ?>
			      	</div>

			      	<?php $n++; endforeach; ?>
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
	<script type="text/javascript" src="<?= asset_url(); ?>home/js/smooth-scroll.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>home/js/modernizr.mq.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>home/js/mixitup.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>home/js/slick.min.js"></script>
	<script src="<?= asset_url(); ?>home/js/wow.js"></script>
	<script src="<?= asset_url(); ?>home/js/bootstrap-notify.min.js"></script>



	

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
	<script src="<?= asset_url(); ?>/home/js/custom.js"></script>

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