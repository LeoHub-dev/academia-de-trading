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
                            <form action="#" class="">

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Comprar a :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-ganancia monto-compra" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Stop Limit (%) :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-ganancia stop-limit-porcentaje" value="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Stop limit (Cant) :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-ganancia stop-limit-cantidad" value="0" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                            <div class="form-line"><input type="text" placeholder="% Personalizado" class="form-control calc-ganancia ganancia-porcentaje-personalizado" value="10"></div>
                                            <span class="input-group-addon">% (Editable)</span>
                                        </div></div></td>
                                                <td><input type="text" class="form-control cantidad-porcentaje-personalizado" value="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-block">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Herramienta - Calculo de BTC</small>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <form action="#" class="">

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Cantidad de BTC :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-btc cantidad-btc" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Precio del BTC ($) :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-btc precio-btc" value="6000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">Total ($) :</span>
                                            <div class="form-line">
                                                <input type="text" class="form-control calc-btc total" value="0">
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
    <script type="text/javascript">

        /*var currencies = "BTC";

        var xmlhttp = new XMLHttpRequest();
        var url = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=" + currencies + "&tsyms=USD,BTC";

        xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 
            var coinList = JSON.parse(xmlhttp.responseText).RAW;
            $('.precio-btc').val(coinList["BTC"].USD.PRICE);
            calcularBtc(1);
            console.log(coinList);
          }
        }

        xmlhttp.open("GET", url, true);
        xmlhttp.send();*/

        $.get('https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=USD,BTC', function(response) {
            var coinList = response.RAW;
            $('.precio-btc').val(coinList["BTC"].USD.PRICE);
            calcularBtc(1);
        });

        calcularGanancias();
        

        $('.calc-ganancia').on('input', function(e) { 

            calcularGanancias();
            
        });

        $('.calc-btc').on('input', function(e) { 

            if($(this).hasClass('cantidad-btc'))
            {
                calcularBtc(1);
            }
            else if($(this).hasClass('total'))
            {
                calcularBtc(2);
            }
            else
            {
                calcularBtc(3);
            }

        });

        $('.cantidad-porcentaje-personalizado').on('input', function(e) { 

            var monto_a_comprar = $('.monto-compra').val().replace(",",".");
            monto_a_comprar =  monto_a_comprar.replace(/[^0-9.,]*/g, '');
            $('.monto-compra').val(monto_a_comprar);
            monto_a_comprar = parseFloat(monto_a_comprar);
            monto_a_comprar = (isNaN(monto_a_comprar) ? '0' : monto_a_comprar);


            var cantidad_ganancia = $(".cantidad-porcentaje-personalizado").val().replace(",",".");

            $('.ganancia-porcentaje-personalizado').val((((cantidad_ganancia*100) / monto_a_comprar) - 100).toFixed(2));



            
        });


        function calcularGanancias()
        {
            var monto_a_comprar = $('.monto-compra').val().replace(",",".");
            monto_a_comprar =  monto_a_comprar.replace(/[^0-9.,]*/g, '');
            $('.monto-compra').val(monto_a_comprar);
            monto_a_comprar = parseFloat(monto_a_comprar);
            monto_a_comprar = (isNaN(monto_a_comprar) ? '0' : monto_a_comprar);


            var porcentaje_stop_loss = $('.stop-limit-porcentaje').val().replace(",",".");
            porcentaje_stop_loss = porcentaje_stop_loss.replace(/[^0-9.,]*/g, '');
            $('.stop-limit-porcentaje').val(porcentaje_stop_loss);
            porcentaje_stop_loss = parseFloat(porcentaje_stop_loss);
            porcentaje_stop_loss = (isNaN(porcentaje_stop_loss) ? '0' : porcentaje_stop_loss);


            var cantidad_stop = (monto_a_comprar - (monto_a_comprar*(porcentaje_stop_loss/100)));
            var cantidad_stop = (isNaN(cantidad_stop) ? '0' : cantidad_stop);
            $(".stop-limit-cantidad").val(cantidad_stop.toFixed(8));

            $('.ganancia-porcentaje-estatico').each(function(i)
            {
                $(this).val((monto_a_comprar + (monto_a_comprar *(parseFloat($(this).attr('percent')/100)))).toFixed(8));
            })

            var porcentaje_ganancia = $('.ganancia-porcentaje-personalizado').val().replace(",",".");
            porcentaje_ganancia = porcentaje_ganancia.replace(/[^0-9.,]*/g, '');
            $('.ganancia-porcentaje-personalizado').val(porcentaje_ganancia);

            porcentaje_ganancia = parseFloat(porcentaje_ganancia);
            var cantidad_ganancia = (monto_a_comprar + (monto_a_comprar*(porcentaje_ganancia/100)));
            var cantidad_ganancia = (isNaN(cantidad_ganancia) ? '0' : cantidad_ganancia);
            $(".cantidad-porcentaje-personalizado").val(cantidad_ganancia.toFixed(8));
        }

        function calcularBtc(j)
        {
            var cantidad_btc = $('.cantidad-btc').val().replace(",",".");
            cantidad_btc =  cantidad_btc.replace(/[^0-9.,]*/g, '');
            $('.cantidad-btc').val(cantidad_btc);
            cantidad_btc = parseFloat(cantidad_btc);
            cantidad_btc = (isNaN(cantidad_btc) ? '0' : cantidad_btc);


            var precio_btc = $('.precio-btc').val().replace(",",".");
            precio_btc =  precio_btc.replace(/[^0-9.,]*/g, '');
            $('.precio-btc').val(precio_btc);
            precio_btc = parseFloat(precio_btc);
            precio_btc = (isNaN(precio_btc) ? '0' : precio_btc);

            var total = $('.total').val().replace(",",".");
            total =  total.replace(/[^0-9.,]*/g, '');
            $('.total').val(total);
            total = parseFloat(total);
            total = (isNaN(total) ? '0' : total);

            if(j == 1)
            {
                $('.total').val(precio_btc*cantidad_btc);
            }
            else if(j == 2)
            {
                console.log((total/precio_btc));
                $('.cantidad-btc').val((total/precio_btc));
            }
            else
            {
                $('.total').val(precio_btc*cantidad_btc);
                //$('.cantidad-btc').val((total/precio_btc));
            }
        }
    </script>
</body>

</html>