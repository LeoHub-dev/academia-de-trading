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
    <meta property="og:image" content="<?= asset_url(); ?>/home/img/banner-social.jpg" />      
    <meta property="og:url" content="http://academiadetrading.net/" />

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,600i" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>/home/css/social-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>/home/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url(); ?>/home/css/style.css">

    <link rel="icon" type="image/png" href="<?= asset_url(); ?>/home/img/logo.png" />
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
		        <li><a class="smoothScroll" href="#explicacion">Explicación</a></li>
		        <li><a class="smoothScroll" href="#planes">Planes</a></li>
		        <li><a class="smoothScroll" href="#equipo">Equipo</a></li>
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
							<p style=""><img src="<?= asset_url(); ?>/home/img/logofull.png" class="img-responsive" style="max-height:200px; display: initial;"></p>

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



		<section id="explicacion">



			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">¿ COMO FUNCIONA ?</h2>

							

						</div>

					</div>

				</div>
				<div class="services-container">

				
		
						<div class="row text-center">
							<p>Te enseñaremos a hacer trading.</p>
							<p>Te regalaremos Señales por una (1) semana.</p>
							<p>Una vez obtengas ganancias te puedes hacer miembro con tan solo 20 dolares al mes.</p>
							<p>Si invitas a 3 personas, tu mensualidad es gratis.</p>
						</div>
				</div>

	
				
			</div> <!-- /.container -->

			<div class="we-make-section">

				<div class="overlay_soft"></div>
				
				<div class="container">
					
					<div class="row reorder-sm">
						
						<div class="col-md-5">

							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/238181071?title=0&amp;byline=0&amp;portrait=0;autoplay=0" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
							  <!--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yeiYJ57DrH4?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>-->
							</div>
							
						</div> <!-- /.col -->

						<div class="col-md-7">

							<div class="features-container">

								<h3>EL CURSO EN LÍNEA QUE CAMBIARÁ TU VIDA ECONÓMICA</h3>

								<p>Nuestro amplio curso en línea desarrollado por traders para traders consta de más de 20 clases de video que cubren todo, desde lo básico a las estrategias avanzadas de comercio criptográfico. Estudia desde la comodidad de tu casa a tu propio ritmo y en tu propio horario con nuestras clases pregrabadas a las cuales tendrás acceso dentro de nuestro portal web.</p>

								<ul class="features-list">
									<li>Puedes hacer trading desde casa y generar de $25 a 40 dolares por día.</li>
									<li>No importa la edad que tengas ni con cuanto dinero decidas comenzar.</li>
									<li>No necesitas ser un experto para comenzar a ganar.</li>
								</ul>

							</div> <!-- /.features-container -->
							
						</div> <!-- /.col -->

					</div> <!-- /.row -->

				</div> <!-- /.container -->

			</div> <!-- /.we-make-section -->

			<div class="services-cta-container">

				<a href="<?= site_url('auth'); ?>#_registro" class="btn btn-default white-yellow">Iniciar Ahora</a>

			</div>

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

					<div class="wn-plan col-xs-12 wn-plan--success wn-plan--first col-md-4 col-sm-6">
		                <div class="wn-plan__box">
		                    <div class="wn-plan__header">
		                        <div class="wn-header wn-header--reduce wn-header--center wn-header--wysiwyg">
		                            <h3 class="wn-header__text">Plan Gratis</h3>
		                        </div>
		                    </div>
		                    <div class="wn-plan__number">
		                        <div class="wn-number wn-number--price">
		                            <div class="wn-number__num">
		                                <div class="wn-number__group">
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">0</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption">por mes</div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details">
		                    	<ul>
			                    	<li><strong>Aprende</strong> el trading basico</li>
			                    	<li><strong>7 Dias</strong> de señales gratis</li>
			                    	<li>Se parte de la <strong>comunidad</strong></li>
			                    	<li>Membresia <strong>gratis</strong> con 3 referidos (Pagos)</li>
		                    	</ul>
		                    </div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>
		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite col-md-4 col-sm-6">
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
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">20</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption">por mes</div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
			                    	<li><strong>Aprende</strong> el trading basico</li>
			                    	<li><strong>1 a 3</strong> señales por dia</li>
			                    	<li>Apoyo por <strong>Skype o Telegram</strong></li>
			                    	<li>Se parte de la <strong>comunidad</strong></li>
			                    	<li>Membresia <strong>gratis</strong> con 3 referidos (Pagos)</li>
		                    	</ul></div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>
		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--last col-md-4 col-sm-6">
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
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">150</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption"><small style="text-decoration: line-through;"><font color="red">$250 </font></small></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
			                    	<li>Un <strong>SOLO</strong> pago</li>
			                    	<li>Acceso a <strong>todo</strong> el paquete basico</li>
			                    	<li>Señales <strong>ilimitadas</strong> todo el dia</li>
			                    	<li><strong>Clases</strong> de analisis tecnico</li>
			                    	<li>Curso de trading <strong>fundamental</strong></li>
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

						<a href="#" class="btn btn-default white-yellow">Entrar AHora</a>

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
						        <div class="at-user__avatar"><img src="http://academiadetrading.net/assets/images/team_adrian.png"></div>
						        <div class="at-user__name">Adrian Alvarez</div>
						        <div class="at-user__title">CEO &amp; Fundador</div>

						      </div>
						    </div>

						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="http://academiadetrading.net/assets/images/team_ernesto.png"></div>
						        <div class="at-user__name">Ernesto Rodriguez</div>
						        <div class="at-user__title">Master Trader</div>

						      </div>
						    </div>

						   
						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="http://academiadetrading.net/assets/images/team_gerson.png"></div>
						        <div class="at-user__name">Gerson</div>
						        <div class="at-user__title">Master Trader</div>
						 
						      </div>
						    </div>


						    


						     <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="http://academiadetrading.net/assets/images/team_liangely.png"></div>
						        <div class="at-user__name">Liangely sanchez</div>
						        <div class="at-user__title">Customer Service</div>
						 
						      </div>
						    </div>

						    <div class="at-column">
						      <div class="at-user">
						        <div class="at-user__avatar"><img src="http://academiadetrading.net/assets/images/team_sugey.png"></div>
						        <div class="at-user__name">Sugey Reyes</div>
						        <div class="at-user__title">Customer Service</div>
						 
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

		<section id="inversiones">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 class="section-title">Inversiones</h2>

							

						</div>

					</div>

				</div> <!-- /.row -->

				<div class="row about-team">

					<div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite wn-plan--first col-md-6 col-sm-6">
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
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">500</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption"></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details">
		                    	<ul>
			                    	<li>En 90 dias habiles te regresamos <strong>$800</strong></li>
			                    	<li>Una ganancia de mas del <strong>60%</strong></li>
		                    	</ul>
		                    </div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
		                    </div>
		                </div>
		            </div>
		            <div class="wn-plan col-xs-12 wn-plan--success wn-plan--favorite col-md-6 col-sm-6">
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
		                                    <sup class="wn-number__left">$</sup><span class="wn-number__value">1000</span>
		                                </div>
		                            </div>
		                            <div class="wn-number__caption"></div>
		                        </div>
		                    </div>
		                    <div class="wn-plan__details"><ul>
			                    	<li>En 90 dias habiles te regresamos <strong>$1600</strong></li>
			                    	<li>Una ganancia de mas del <strong>60%</strong></li>
		                    	</ul></div>
		                    <div class="wn-plan__buttons">
		                        <div class="wn-buttons wn-buttons--center"><a href="<?= site_url('auth'); ?>#_registro" class="wn-buttons__btn btn btn-wrap btn-xs-lg btn-default">Comprar Ahora</a></div>
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

							<p>Aqui todas nuestras señales que se cumplieron.</p>



						</div>

					</div>

				</div> <!-- /.row -->



			</div> <!-- /.container -->

			<div class="container">

				<div class="panel-group" id="accordion1">

					<?php 

						$lista_senal = NULL;

						foreach((array) $lista_indicios as $indicio) : 

						if($indicio->seccion == 1) continue;

						$factura_final = new DateTime($indicio->fecha, new DateTimeZone(TIMEZONE));
                        setlocale(LC_TIME,"es_ES");
                        $f = strftime("%d de %B",  $factura_final->getTimestamp());  

                        $lista_senal[$indicio->fecha]["fecha"] = $f;
                        $lista_senal[$indicio->fecha]["imagenes"][] = $indicio->imagen;

                        endforeach;
                    ?>
       
          
                    


                    <?php $n = 0; foreach((array) $lista_senal as $indicio) : ?>

			        <div class="panel panel-default">
			          <div class="panel-heading">
			            <h5 class="panel-title">
			              <a class="accordion-toggle <?php if($n != 0) { echo 'collapsed'; } ?>" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?= $n; ?>"><?= $indicio['fecha']; ?> - Cantidad de señales : <?= count($indicio['imagenes']); ?></a>
			            </h5>
			          </div>
			          <div id="accordion1_<?= $n; ?>" class="panel-collapse collapse <?php if($n == 0) { echo 'in'; } ?>">
			            <div class="panel-body">
			            	<?php foreach((array) $indicio['imagenes'] as $imagen) : ?>
			             	<a href="<?= asset_url(); ?>images/indicios/<?= $imagen; ?>" target="_blank"><img src="<?= asset_url(); ?>images/indicios/<?= $imagen; ?>" class="img-responsive" style="height: 400px; margin-bottom:5px; display: inline;"></a>
			             	<?php endforeach; ?>
			            </div>
			          </div>
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
						<li><a href="https://www.facebook.com/Academia-De-Trading-496295420749430/?fref=ts"><i class="si social-facebook" aria-hidden="true"></i></a></li>
					</ul>

					<p class="copyright"> © Copyright <span id="year">2017</span> <span class="text-yellow">Academia De Trading</span>. All Rights Reserved</p>

				</div>
 
			</div> <!-- /.row -->

		</div> <!-- /.container -->

	</footer>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>/home/js/smooth-scroll.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>/home/js/modernizr.mq.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>/home/js/mixitup.min.js"></script>
	<script type="text/javascript" src="<?= asset_url(); ?>/home/js/slick.min.js"></script>
	<script src="<?= asset_url(); ?>/home/js/wow.js"></script>

	<style type="text/css">
		
	</style>

	<script src="http://matthew.wagerfield.com/parallax/deploy/jquery.parallax.js"></script>

	<script type="text/javascript">
		var scene = $('#scene');
		scene.parallax();
		
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