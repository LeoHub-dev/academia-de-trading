<!DOCTYPE html>
<html>
<head>
    <title>Nuestro Blog</title>
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
    <script src="https://use.fontawesome.com/a7fd4b808d.js"></script>
    <link rel="icon" type="image/png" href="<?= asset_url(); ?>/home/img/logo.png" />
<style type="text/css" media="screen">

.coupon #footer {
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

#title .visible-xs {
    font-size: 12px;
}

.coupon #title img {
    font-size: 30px;
    height: 30px;
    margin-top: 5px;
}

@media screen and (max-width: 500px) {
    .coupon #title img {
        height: 15px;
    }
}

.coupon #title span {
    float: right;
    margin-top: 5px;
    font-weight: 700;
    text-transform: uppercase;
}

.coupon-img {
    width: 100%;
    margin-bottom: 15px;
    padding: 0;
}

.items {
    margin: 15px 0;
}

.usd, .cents {
    font-size: 20px;
}

.number {
    font-size: 40px;
    font-weight: 700;
}

sup {
    top: -15px;
}

#business-info ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
    text-align: center;
}

#business-info ul li { 
    display: inline;
    text-align: center;
}

#business-info ul li span {
    text-decoration: none;
    padding: .2em 1em;
}

#business-info ul li span i {
    padding-right: 5px;
}

.disclosure {
    padding-top: 15px;
    font-size: 11px;
    color: #bcbcbc;
    text-align: center;
}

.coupon-code {
    color: #333333;
    font-size: 11px;
}

.exp {
    color: #f34235;
}

.print {
    font-size: 14px;
    float: right;
}



/*------------------dont copy these lines----------------------*/
body {
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", 
    "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
    font-weight: 300;
}
.row {
    margin: 30px 0;
}

#quicknav ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
    text-align: center;
}

#quicknav ul li { 
    display: inline; 
}

#quicknav ul li a {
    text-decoration: none;
    padding: .2em 1em;
}

.btn-danger, 
.btn-success, 
.btn-info, 
.btn-warning, 
.btn-primary {
    width: 105px;
}

.btn-default {
    margin-bottom: 40px;
}
	
</style>
    <!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5a0d036dbb0c3f433d4c97be/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
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
		<h1 class="sr-only">Academia de Trading | Blog</h1>
		
		<nav id="main-navigation" class="navbar navbar-default navbar-fixed-top">


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
		        <li class="active"><a class="smoothScroll" href="<?= site_url('inicio'); ?>#home">Inicio <span class="sr-only">(current)</span></a></li>
		        <li><a class="smoothScroll" href="<?= site_url('inicio'); ?>#explicacion">Explicación</a></li>
		        <li><a class="smoothScroll" href="<?= site_url('inicio'); ?>#planes">Planes</a></li>
		        <li><a target="_blank" href="https://academiadtrading.blogspot.com/">Blog</a></li>
		      	<li id="brand-desktop">
					<a class="navbar-brand smoothScroll" href="#home">
						<img alt="Academia De Trading" src="<?= asset_url(); ?>/home/img/logo.png">
					</a>
		      	</li>
		      	<li><a class="smoothScroll" href="<?= site_url('inicio'); ?>#inversiones">Inversiones</a></li>
		        <li><a class="smoothScroll" href="<?= site_url('inicio'); ?>#senales">Señales</a></li>
		        <li class="active"><a class="" href="<?= site_url('auth'); ?>">Login</a></li>
		        <li class="active"><a class="" href="<?= site_url('auth'); ?>#_registro">Registro</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container -->
		</nav>

	</header>

	<main>


		<section id="equipo">

			<div class="container">

				<div class="row">
					
					<div class="col-md-8 col-md-offset-2">

						<div class="title-content">
							
							<h2 style="font-size: 40px" class="section-title">Blog</h2>

						</div>

					</div>

				</div> <!-- /.row -->

				<div class="container-fluid ">

					

			     
    
    
   
    
    
    
    <div class="row" id="blue">
        <div class="col-md-6">
            <div class="panel panel-primary coupon">
              <div class="panel-heading" id="head">
                <div class="panel-title" id="title">
                    <i class="fa fa-github fa-2x"></i>
                    <span class="hidden-xs">Automatic Transmission Service</span>
                    <span class="visible-xs">Automatic Transmission Service</span>
                </div>
              </div>
              <div class="panel-body">
                <img src="http://i.imgur.com/e07tg8R.png" class="coupon-img img-rounded">
                <div class="col-md-9">
                    <ul class="items">
                        <li>Add up to 5 quarts of motor oil (per specification)</li>
                        <li>Complimentary multi-point inspection</li>
                        <li>Drain and refill trnasmission fluid</li>
                        <li>System inspection</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="offer text-primary">
                        <span class="usd"><sup>$</sup></span>
                        <span class="number">39</span>
                        <span class="cents"><sup>95</sup></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="disclosure">Using Genuine Oil Filter and 
                    multigrade oil up to vehicle specification. Lube as 
                    necessary. Ester Oil or Synthetic available at additional 
                    cost. Excludes hazardous waste fee, tax and shop supplies, 
                    where applicable. Offer not valid with previous charges or 
                    with any other offers or specials. Customer must offer at 
                    time of write-up. No cash value.</p>
                </div>
              </div>
              <div class="panel-footer">
                <div class="coupon-code">
                    Code: GBWO2
                    <span class="print">
                        <a href="#" class="btn btn-link"><i class="fa fa-lg fa-print"></i> Print Coupon</a>
                    </span>
                </div>
                <div class="exp">Expires: Sep 30, 2016</div>
              </div>
            </div>
        </div>





         <div class="col-md-6">
            <div class="panel panel-primary coupon">
              <div class="panel-heading" id="head">
                <div class="panel-title" id="title">
                    <i class="fa fa-github fa-2x"></i>
                    <span class="hidden-xs">Automatic Transmission Service</span>
                    <span class="visible-xs">Automatic Transmission Service</span>
                </div>
              </div>
              <div class="panel-body">
                <img src="http://i.imgur.com/e07tg8R.png" class="coupon-img img-rounded">
                <div class="col-md-9">
                    <ul class="items">
                        <li>Add up to 5 quarts of motor oil (per specification)</li>
                        <li>Complimentary multi-point inspection</li>
                        <li>Drain and refill trnasmission fluid</li>
                        <li>System inspection</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="offer text-primary">
                        <span class="usd"><sup>$</sup></span>
                        <span class="number">39</span>
                        <span class="cents"><sup>95</sup></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="disclosure">Using Genuine Oil Filter and 
                    multigrade oil up to vehicle specification. Lube as 
                    necessary. Ester Oil or Synthetic available at additional 
                    cost. Excludes hazardous waste fee, tax and shop supplies, 
                    where applicable. Offer not valid with previous charges or 
                    with any other offers or specials. Customer must offer at 
                    time of write-up. No cash value.</p>
                </div>
              </div>
              <div class="panel-footer">
                <div class="coupon-code">
                    Code: GBWO2
                    <span class="print">
                        <a href="#" class="btn btn-link"><i class="fa fa-lg fa-print"></i> Print Coupon</a>
                    </span>
                </div>
                <div class="exp">Expires: Sep 30, 2016</div>
              </div>
            </div>
        </div>
    </div>
    
    <p class="text-center"><a href="#" class="btn btn-default">Back to top <i class="fa fa-chevron-up"></i></a></p>

					

					 


						
					</div>

				</div> <!-- /.row -->


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
					<p class="copyright"> <a href="<?= site_url('legal'); ?>">Terminos & Condiciones </a></p>

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