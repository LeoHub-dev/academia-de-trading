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
                <?php if($info_usuario['data']->pago == 1) : ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">pie_chart</i>
                            <span>Circulos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= site_url('circulo'); ?>" class=" waves-effect waves-block">Vista Basica</a>
                            </li>
                            <li>
                                <a href="<?= site_url('circulo/avanzado'); ?>" class=" waves-effect waves-block">Vista General</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= site_url('clases'); ?>">
                            <i class="material-icons">local_library</i>
                            <span>Clases</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('referido'); ?>">
                            <i class="material-icons">people</i>
                            <span>Referidos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('ganancias'); ?>">
                            <i class="material-icons">attach_money</i>
                            <span>Ganancias</span>
                        </a>
                    </li>
                    <?php if($info_usuario['data']->mineria == 0): ?>
                    <li>
                        <a href="<?= site_url('mineria'); ?>">
                            <i class="material-icons col-light-blue">account_circle</i>
                            <span>Cuenta en Mineria</span>
                        </a>
                    </li>
                    <?php endif; ?>
                <?php else : ?>
                    <li>
                        <a href="<?= site_url('pago'); ?>">
                            <i class="material-icons">attach_money</i>
                            <span>Donar entrada</span>
                        </a>
                    </li>
                <?php endif; ?>
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