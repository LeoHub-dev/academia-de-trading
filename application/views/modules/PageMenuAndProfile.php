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
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                    
                    <li>
                        <a href="<?= site_url('indicios'); ?>">
                            <i class="material-icons">trending_up</i>
                            <span>Señales</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('clases'); ?>">
                            <i class="material-icons">local_library</i>
                            <span>Clases</span>
                        </a>
                    </li>
                    <?php if($info_usuario['data']->pago == 1) : ?>
                    <li>
                        <a href="<?= site_url('herramientas'); ?>">
                            <i class="material-icons">extension</i>
                            <span>Herramientas</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="https://mega.nz/?fref=gc&dti=1307459162715356#!alhTmCpL!amiJE7KqthJGfEvEfgNPnrLArwDgH_mJILE9XXcsKiI" target="_blank">
                            <i class="material-icons col-amber">book</i>
                            <span>Libro Gratis</span>
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
                            <i class="material-icons col-light-blue">people</i>
                            <span>Panel</span>
                        </a>
                    </li>
                    <?php endif; ?>
                
                    <?php if($info_usuario['data']->pago == 0) : ?>
                    <li>
                        <a href="<?= site_url('pago'); ?>">
                            <i class="material-icons col-light-blue">attach_money</i>
                            <span>Pagar mensualidad</span>
                        </a>
                    </li>
                    <?php endif; ?>


                    

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">pie_chart</i>
                            <span>Canales</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="https://t.me/joinchat/F4Z0XwyjP08YO8vSnj4TDw" target="_blank" class="waves-effect waves-block">Telegram</a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/Academiadetrading-496295420749430" target="_blank" class="waves-effect waves-block">Facebook</a>
                            </li>
                        </ul>

                        
                    </li>


            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 <a href="www.adrianalvarez.online">www.AdrianAlvarez.online</a>.
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