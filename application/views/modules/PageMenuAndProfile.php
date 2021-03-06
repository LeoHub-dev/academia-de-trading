<section>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
      <div class="image">
        <img src="<?= asset_url(); ?>images/perfil/<?= $info_usuario['data']->imagen; ?>" width="48" height="48" class="imagen_perfil" alt="User" />
      </div>
      <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $info_usuario['data']->nombre; ?> <?= $info_usuario['data']->apellido; ?></div>
        <div class="email">Numero de referido : #<?= $info_usuario['data']->id_usuario; ?></div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="<?= site_url('perfil'); ?>"><i class="material-icons">person</i>Perfil</a></li>

            <li role="seperator" class="divider"></li>
            <li><a href="<?= site_url('auth/desconectarse'); ?>"><i class="material-icons">input</i>Desconectarse</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
      <ul class="list">
        <li class="header">MENU</li>



        <li class="active">
          <a href="<?= site_url('dashboard'); ?>">
            <i class="material-icons col-light-blue">home</i>
            <span>Dashboard</span>
          </a>
        </li>

        <?php if($info_usuario['data']->tipo != 6 && $info_usuario['data']->tipo != 5) : ?>
          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons col-light-blue">account_balance</i>
              <span>Academia</span>
            </a>
            <ul class="ml-menu">

              <?php if($info_usuario['data']->pago == 1) : ?>
                <li>
                  <a href="<?= site_url('clases'); ?>">
                    <i class="material-icons col-light-blue">local_library</i>
                    <span>Clases Basicas</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if($info_usuario['data']->tipo == 2 || $info_usuario['data']->tipo == 1 || $this->Matriz_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL || $this->Matriz_Pro_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL) : ?>
                <li>
                  <a href="<?= site_url('clases/vip'); ?>">
                    <i class="material-icons col-amber">local_library</i>
                    <span>Clases Vip</span>
                  </a>
                </li>
              <?php endif; ?>


              <?php if($info_usuario['data']->tipo == 2 || $info_usuario['data']->tipo == 1 || $this->Matriz_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL || $this->Matriz_Pro_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL) : ?>
                <li>
                  <a href="https://t.me/joinchat/AAAAAEHuh3_T6r8SYQnhZA" target="_blank">
                    <i class="material-icons fa fa-telegram col-red" style="font-size: 23px;"></i>
                    <span>Canal Señales VIP</span>
                  </a>
                </li>
              <?php endif; ?>

              <?php if($info_usuario['data']->pago == 1) : ?>
                <li>
                  <a href="<?= site_url('mastermind'); ?>">
                    <i class="material-icons">record_voice_over</i>
                    <span>Mastermind</span>
                  </a>
                </li>
              <?php endif; ?>
              <li>
                <a href="https://mega.nz/#!BIwSGT7a!2lNFSo_sngO8FG_2U4aCOEduNKWrKKs1fmVJFFS1a2M" target="_blank">
                  <i class="material-icons col-amber">book</i>
                  <span>Libro Gratis</span>
                </a>
              </li>
              <?php if($info_usuario['data']->tipo == 2 || $info_usuario['data']->tipo == 1 || $this->Matriz_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL) : ?>
                <li>
                  <a href="https://t.me/joinchat/F4Z0X0QgDsqhs4WUlEbUxw" target="_blank" class="waves-effect waves-block">
                    <i class="material-icons fa fa-telegram col-light-blue" style="font-size: 22px;" aria-hidden="true"></i>
                    <span>Telegram</span>
                  </a>
                </li>
              <?php endif; ?>
              <li>
                <a href="https://www.facebook.com/Academiadetrading-496295420749430" target="_blank" class="waves-effect waves-block">
                  <i style="font-size: 22px;" class="material-icons fa fa-facebook-official col-light-blue" aria-hidden="true"></i>
                  <span>Facebook</span>
                </a>
              </li>

            </ul>
          </li>


          <?php if($this->Matriz_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL) : ?>
            <li>
              <a href="<?= site_url('matriz'); ?>">
                <i class="material-icons col-red">call_split</i>
                <span>Matriz $100</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if($this->Matriz_Pro_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL) : ?>
            <li>
              <a href="<?= site_url('matrizpro'); ?>">
                <i class="material-icons col-red">call_split</i>
                <span>Matriz $500</span>
              </a>
            </li>
          <?php endif; ?>


          <?php if($this->Matriz_model->obtenerMatrizActiva($info_usuario['data']->id_usuario) != NULL || $info_usuario['data']->tipo == 6) : ?>
            <li>
              <a href="<?= site_url('ganancias'); ?>">
                <i class="material-icons col-amber">attach_money</i>
                <span>Ganancias</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if($info_usuario['data']->pago == 1) : ?>
            <li>
              <a href="<?= site_url('mercado'); ?>">
                <i class="material-icons col-red">store</i>
                <span>Mercado</span>
              </a>
            </li>
          <?php endif; ?>


          <?php if($info_usuario['data']->pago == 1) : ?>
            <li>
              <a href="<?= site_url('calculadora'); ?>">
                <i class="material-icons col-amber">extension</i>
                <span>Calculadora</span>
              </a>
            </li>
          <?php endif; ?>


          
            <li>
              <a href="<?= site_url('pago'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Recargar Saldo</span>
              </a>
            </li>

            <li>
              <a href="<?= site_url('planes'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Compra de planes</span>
              </a>
            </li>
         




          <?php if($info_usuario['data']->pago == 1) : ?>
            <li>
              <a href="<?= site_url('referido'); ?>">
                <i class="material-icons">people</i>
                <span>Referidos</span>
              </a>
            </li>

          <?php endif; ?>

          <?php if($info_usuario['data']->tipo == 1): ?>
            <li>
              <a href="<?= site_url('panel'); ?>">
                <i class="material-icons col-light-blue">settings</i>
                <span>Panel</span>
              </a>
            </li>

          <?php endif; ?>


        <?php elseif($info_usuario['data']->tipo == 5) : ?>

          <?php if($info_usuario['data']->pago == 1) : ?>
              <li> 
                <a href="<?= site_url('clases/biginversionistas'); ?>"> 
                  <i class="material-icons col-amber">local_library</i> 
                  <span>Clases Inversionistas</span> 
                </a> 
              </li> 
          <?php endif; ?>

          <?php if($info_usuario['data']->pago == 1) : ?>
          <li>
            <a href="<?= site_url('ganancias'); ?>">
              <i class="material-icons col-amber">attach_money</i>
              <span>Ganancias</span>
            </a>
          </li>
            <li>
                <a href="<?= site_url('calendario'); ?>">
                    <i class="material-icons col-indigo">date_range</i>
                    <span>Calendario</span>
                </a>
            </li>
          <?php endif; ?>

          <li>
              <a href="<?= site_url('pago'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Recargar Saldo</span>
              </a>
            </li>

            <li>
              <a href="<?= site_url('planes'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Compra de planes</span>
              </a>
            </li>

        <?php elseif($info_usuario['data']->tipo == 6) : ?>

          <li>
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons col-light-blue">account_balance</i>
              <span>Academia</span>
            </a>
            <ul class="ml-menu">

              <?php if($info_usuario['data']->pago == 1) : ?>
              <li> 
                <a href="<?= site_url('clases/inversionistas'); ?>"> 
                  <i class="material-icons col-amber">local_library</i> 
                  <span>Clases Inversionistas</span> 
                </a> 
              </li> 
              <?php endif; ?>

              <li>
                <a href="https://www.facebook.com/Academiadetrading-496295420749430" target="_blank" class="waves-effect waves-block">
                  <i style="font-size: 22px;" class="material-icons fa fa-facebook-official col-light-blue" aria-hidden="true"></i>
                  <span>Facebook</span>
                </a>
              </li>

            </ul>
          </li>

          <li>
              <a href="<?= site_url('pago'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Recargar Saldo</span>
              </a>
            </li>

            <li>
              <a href="<?= site_url('planes'); ?>">
                <i class="material-icons col-light-blue">attach_money</i>
                <span>Compra de planes</span>
              </a>
            </li>

        <?php endif; ?>







      </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
      <div class="copyright">
        &copy; 2017 <a href="http://www.adrianalvarez.net/">www.AdrianAlvarez.net</a>.
      </div>
      <div class="version">
        <b>Version: </b> 1.0.5
      </div>
    </div>
    <!-- #Footer -->
  </aside>
  <!-- #END# Left Sidebar -->
  <!-- Right Sidebar -->

  <!-- #END# Right Sidebar -->
</section>