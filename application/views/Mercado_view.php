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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Herramienta - Calculo de Ganancias</small>
                            </h2>
                           
                        </div>
                        <div class="body">

                            <div class="row clearfix">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ganancias</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1%</th>
                                            <td><input type="text" class="form-control ganancia-porcentaje-estatico" percent="1" readonly="true" value="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2%</th>
                                            <td><input type="text" class="form-control ganancia-porcentaje-estatico" percent="2" readonly="true" value="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3%</th>
                                            <td><input type="text" class="form-control ganancia-porcentaje-estatico" percent="3" readonly="true" value="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4%</th>
                                            <td><input type="text" class="form-control ganancia-porcentaje-estatico" percent="4" readonly="true" value="0"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5%</th>
                                            <td><input type="text" class="form-control ganancia-porcentaje-estatico" percent="5" readonly="true" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td><div class="col-md-5" style="margin:0; padding: 0;"><div class="input-group">
                                        <div class="form-line"><input type="text" placeholder="% Personalizado" class="form-control calc-ganancia ganancia-peroncentaje-personalizado" value="10"></div>
                                        <span class="input-group-addon">% (Editable)</span>
                                    </div></div></td>
                                            <td><input type="text" class="form-control calc-ganancia cantidad-porcentaje-personalizado" readonly="true" value="0"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            
            
        </div>
    </section>

    <?php include_once 'modules/Scripts.php' ; ?>

    <script type="text/javascript">

        /*$( document ).ajaxStart(function() {
          alert("ajax iniciando");
        });

        $(document).ajaxSuccess(function() {
          alert("ajax fin");
        });*/


        $.get('http://192.168.1.2/circulo/mercado/api_coins', function(response) {
            var coinList = response.result;

            $.each(coinList, function(i){

                $.get('http://192.168.1.2/circulo/mercado/api_tick/'+coinList[i].Market.MarketName, function(response) {
                    //var coinList = response.result;
                    console.log(response);

                    

                },"json").fail(function(xhr, status, error) {
                    
                    console.log(error);
                    console.log(xhr.responseText);

                });

            })
            console.log(coinList);

            



        },"json").fail(function(xhr, status, error) {
            
            console.log(error);
            console.log(xhr.responseText);

        });



        /*var xmlhttp = new XMLHttpRequest();
        var url = "https://bittrex.com/api/v1.1/public/getmarketsummaries";

        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 
            var coinList = xmlhttp.responseText.result;

            console.log(coinList);
          }
        }

        xmlhttp.open("GET", url, true);
        xmlhttp.send();*/

      
    </script>
</body>

</html>