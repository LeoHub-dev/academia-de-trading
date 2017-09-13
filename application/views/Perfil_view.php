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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Link para invitar Referidos
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line disabled">
                                            <input value="<?= site_url('api/c/'.$info_usuario['data']->id_usuario); ?>" type="text" class="form-control" placeholder="Disabled" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Perfil<small>Edita tu información de perfil</small>
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
                            <form action="<?= site_url('perfil/editar'); ?>" id="perfil_form">
                                <h2 class="card-inside-title">Usuario</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?= $info_usuario['data']->usuario; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Password</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" class="form-control" placeholder="Password" value="<?= $info_usuario['data']->password; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Nombre</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?= $info_usuario['data']->nombre; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Apellido</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?= $info_usuario['data']->apellido; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Wallet</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="wallet" class="form-control" placeholder="Wallet" value="<?= $info_usuario['data']->wallet; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title">Imagen de perfil</h2>
                                <div class="row clearfix">
                                    <div class="form-group">
                                        <div class="col-md-12 clearfix">
                                          <label>Editar imagen de perfil</label>
                                          <div id="imageupload">Subir</div>
                                          <input type="hidden" name="image" id="image_input" value="<?= $info_usuario['data']->imagen; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix"><p class="img_upload_error" style="color: red"></p></div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Editar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>
    <script type="text/javascript">
        $('#mostrar_pw').on('click', function(e){
            $(this).parent().parent().find('input').attr('type','text');
        });
    </script>
    <script>

    $("#imageupload").uploadFile({
      url:"perfil/uploadimg/",
      dragDropStr: "<span><b>Arrastra & Suelta tu Imagen</b></span>",
      uploadStr:"Subir",
      fileName:"imgPerfil",
      showPreview:true,
      maxFileCount:1,
      previewHeight: "100px",
      previewWidth: "100px",
      acceptFiles:"image/*",
      showDelete: true,
      deleteCallback: function (data, pd) {
        $("#image_input").val('<?= $info_usuario['data']->imagen; ?>');
      },
      onSuccess:function(files,data,xhr,pd)
      {

        console.log(data);

        var error = JSON.parse(data);
        console.log(error);

        if(error.error)
        {

            $(".img_upload_error").html(error.error)
        }
        else
        {
            var img = JSON.parse(data);
            $(".img_upload_error").html("");
            $("#image_input").val(img);
            //$(".imagen_perfil").attr('src','<?= asset_url(); ?>images/perfil/'+img);
        }
        

        
      }
    });
  </script>
</body>

</html>