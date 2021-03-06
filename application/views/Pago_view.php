<!DOCTYPE html>
<html>
<head>
    <?php include_once 'modules/Header.php' ; ?>
</head>
<body class="theme-blue">
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
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php include_once 'modules/PageNavBar.php' ; ?>
    <!-- #Top Bar -->
    <?php include_once 'modules/PageMenuAndProfile.php' ; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="material-icons">home</i> Home
                    </li>
                </ol>
            </div>

        </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="info-box bg-green hover-expand-effect">
                          <div class="icon">
                              <i class="material-icons">attach_money</i>
                          </div>
                          <div class="content">
                              <div class="text">Saldo Actual</div>
                              <div class="number " data-from="0" data-to="<?= $saldo; ?>" data-speed="1" data-fresh-interval="20" class="btc-pagado"><?= $saldo; ?></div>
                          </div>
                      </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Recarga tu saldo <small>Recuerda solo enviar las monedas respectivas segun selecciones</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
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
                            <div class="row clearfix">
                                <!--<div class="col-md-12" >
                                   
                                        <button type="button" class="btn btn-primary waves-effect pagar-con-btc" id-tipo="1">Donar con BTC</button>
                                   

                                        
                                    

                                </div>-->

                                <div class="col-md-12" style="display: flex;align-items: center;justify-content: center;"> 
                                    
                                        <button type="button" class="btn btn-primary waves-effect pagar-con-btc" id-tipo="1">Recargar con </button> 
                                    
 
                                        <select class="form-control show-tick" id="moneda_pago"> 
                                            <option value="BTC">BTC (Bitcoin)</option>
                                            <option value="LTC">LTC (Litecoin)</option>
                                            <option value="BCH">BCH (BitcoinCash)</option>
                                        </select> 
                                     
 
                                </div>
                            </div>
                            <form style="display: none">
                     

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="direccion">Enviar tu recarga a esta wallet</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="direccion" class="form-control btc-address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </section>



    <?php include_once 'modules/Scripts.php' ; ?>
</body>

</html>