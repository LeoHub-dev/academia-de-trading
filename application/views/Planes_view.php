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
      <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="info-box bg-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Saldo Actual</div>
                    <div class="number " data-from="0" data-to="<?= $saldo; ?>" data-speed="1" data-fresh-interval="20"><?= $saldo; ?></div>
                </div>
            </div>
        </div>
      </div>

      <div class="row clearfix">

        <?php $respuesta = $this->session->flashdata('respuesta'); $resultado = $this->session->flashdata('resultado'); if ($respuesta) : if ($resultado) :?>

            <div class="alert alert-success">
              <?= $respuesta; ?>
            </div>
          <?php else: ?>
            <div class="alert alert-danger">
              <?= $respuesta; ?>
            </div>
          <?php endif; ?>

        <?php endif; ?>

        <?php if($info_usuario['data']->tipo != 5 && $info_usuario['data']->tipo != 6) : ?>
        

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header text-center">
              <h2>
                Plan Matriz ($150)
              </h2>
             
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
              <div class="row clearfix text-center">
                <a href="<?= site_url('planes/comprar_paquete/3') ?>" class="btn btn-primary m-t-15 waves-effect">Comprar</a>
              </div>
                    
            </div>
          </div>
        </div>

        
        

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header text-center">
              <h2>
                Plan Matriz $500 ($500)
              </h2>
             
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
              <div class="row clearfix text-center">
                <a href="<?= site_url('planes/comprar_paquete/8') ?>" class="btn btn-primary m-t-15 waves-effect">Comprar</a>
              </div>
                    
            </div>
          </div>
        </div>

        <?php elseif($info_usuario['data']->tipo != 6) : ?>

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header text-center">
                <h2>
                  Plan Inversion $1500 ($1500)
                </h2>
               
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
                <div class="row clearfix text-center">
                  <a href="<?= site_url('planes/comprar_paquete/5') ?>" class="btn btn-primary m-t-15 waves-effect">Comprar</a>
                </div>
                      
              </div>
            </div>
          </div>

          <?php elseif($info_usuario['data']->tipo != 5) : ?>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header text-center">
                  <h2>
                    Plan Masternode $500 ($500)
                  </h2>
                 
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
                  <div class="row clearfix text-center">
                    <a href="<?= site_url('planes/comprar_paquete/6') ?>" class="btn btn-primary m-t-15 waves-effect">Comprar</a>
                  </div>
                        
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header text-center">
                  <h2>
                    Plan Masternode $2000 ($2000)
                  </h2>
                 
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
                  <div class="row clearfix text-center">
                    <a href="<?= site_url('planes/comprar_paquete/7') ?>" class="btn btn-primary m-t-15 waves-effect">Comprar</a>
                  </div>
                        
                </div>
              </div>
            </div>


            <?php endif; ?>

      

    </div>
  </section>

<?php include_once 'modules/Scripts.php' ; ?>

</body>

</html>