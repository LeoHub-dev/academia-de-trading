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
                                Market Monitor</small>
                            </h2>
                           
                        </div>
                        <div id="monitor-body" class="body __loading">
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
                                <div class="title">Cargando ... Esto puede demorar hasta 10 minutos o mas</div>
                            </div>
                            <div class="row clearfix">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Market</th>
                                            <th>0 min</th>
                                            <th>5 min</th>
                                            <th>10 min</th>
                                            <th>15 min</th>
                                            <th>30 min</th>
                                            <th>1 hora</th>
                                            <th>2 hora</th>
                                            <th>4 hora</th>
                                            <th>1 Día</th>
                                        </tr>
                                    </thead>
                                    <tbody class="market-content">

                                        <!--<tr>
                                            <th scope="row" rowspan="2">BTC-XMR</th>
                                            <td>Volumen</td>
                                            <td>Vol 5min</td>
                                            <td>Vol 15min</td>
                                            <td>Vol 30min</td>
                                            <td>Vol 1h</td>
                                            <td>Vol 2h</td>
                                            <td>Vol 4h</td>
                                            <td>Vol 1dia</td>
                                        </tr>
                                        <tr>
                                            <td>Precio</th>
                                            <td>Prec 5min</td>
                                            <td>Prec 15min</td>
                                            <td>Prec 30min</td>
                                            <td>Prec 1h</td>
                                            <td>Prec 2h</td>
                                            <td>Prec 4h</td>
                                            <td>Prec 1dia</td>
                                        </tr>-->
                                        
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

        

        var mostrar_contenido = 0;


        $.get('http://192.168.1.2/circulo/mercado/api_coins', function(response) {
            var coinList = response.result;

            //console.log(coinList);

            var limite_monedas = 0;
            var contador_monedas = 0;

            $.each(coinList, function(i){

                if(coinList[i].Market.MarketName.substring(0, 3) != 'BTC'){ return true; }

                if(coinList[i].Summary.BaseVolume < 50){ return true; }

                $moneda = coinList[i].Market.MarketName.split("-");

                $.get('https://min-api.cryptocompare.com/data/histominute?fsym='+$moneda[1]+'&tsym='+$moneda[0]+'&limit=600&aggregate=5&e=BitTrex', function(response) {

                    if(response.Type === 99 || response.Response == "Error" || response.Aggregated == false) { return false; }

                    limite_monedas++;

                    $('.market-content').append('<tr class="moneda-volumen-'+coinList[i].Market.MarketName+'">\
                        <th scope="row" rowspan="2">'+coinList[i].Market.MarketName+'</th>\
                        <td>Volumen<br>'+coinList[i].Summary.BaseVolume+' BTC</td>\
                    </tr>\
                    <tr class="moneda-precio-'+coinList[i].Market.MarketName+'">\
                        <td>Precio<br>'+coinList[i].Summary.Last.toFixed(10)+' BTC</th>\
                    </tr>');

                    
                    var tickList = response.Data;

                    var total_volume_5min = 0;
                    var high_price_5min = [];

                    for (var j = 0; j <= 287; j++) {
                        total_volume_5min = total_volume_5min + tickList[j].volumeto;
                        high_price_5min.push(tickList[j].high);
                           
                        
                    }

                    var total_volume_10min = 0;
                    var high_price_10min = [];

                    for (var j = 1; j <= 288; j++) {
                        total_volume_10min = total_volume_10min + tickList[j].volumeto;
                        high_price_10min.push(tickList[j].high);
                        
                    }

                    var total_volume_15min = 0;
                    var high_price_15min = [];

                    for (var j = 2; j <= 289; j++) {
                        total_volume_15min = total_volume_15min + tickList[j].volumeto;
                        high_price_15min.push(tickList[j].high);
                        
                    }

                    var total_volume_30min = 0;
                    var high_price_30min = [];

                    for (var j = 5; j <= 293; j++) {
                        total_volume_30min = total_volume_30min + tickList[j].volumeto;
                        high_price_30min.push(tickList[j].high);
                        
                    }

                    var total_volume_1h = 0;
                    var high_price_1h = [];

                    for (var j = 11; j <= 299; j++) {
                        total_volume_1h = total_volume_1h + tickList[j].volumeto;
                         high_price_1h.push(tickList[j].high);
                        
                    }

                    var total_volume_2h = 0;
                    var high_price_2h = [];

                    for (var j = 23; j <= 311; j++) {
                        total_volume_2h = total_volume_2h + tickList[j].volumeto;
                        high_price_2h.push(tickList[j].high);
                        
                    }

                    var total_volume_4h = 0;
                    var high_price_4h = [];

                    for (var j = 47; j <= 335; j++) {
                        total_volume_4h = total_volume_4h + tickList[j].volumeto;
                        high_price_4h.push(tickList[j].high);
                        
                    }

                    /*console.log(high_price_5min);
                    console.log(high_price_10min);
                    console.log(high_price_15min);
                    console.log(high_price_30min);
                    console.log(high_price_1h);
                    console.log(high_price_2h);
                    console.log(high_price_4h);

                    console.log(total_volume_5min);
                    console.log(total_volume_10min);
                    console.log(total_volume_15min);
                    console.log(total_volume_30min);
                    console.log(total_volume_1h);
                    console.log(total_volume_2h);
                    console.log(total_volume_4h);*/

                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_5min));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_10min));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_15min));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_30min));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_1h));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_2h));
                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_4h));

                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_5min)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_10min)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_15min)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_30min)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_1h)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_2h)));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_4h)));

                    




                },"json").fail(function(xhr, status, error) {
                    
                    console.log(error);
                    console.log(xhr.responseText);

                });

                $.get('https://min-api.cryptocompare.com/data/histominute?fsym='+$moneda[1]+'&tsym='+$moneda[0]+'&limit=300&aggregate=5&e=BitTrex', function(response) {

                    if(response.Type === 99 || response.Response == "Error" || response.Aggregated == false) { return false; }

                    console.log(response)
                    var tickList = response.Data;

                    var total_volume_1d = 0;
                    var high_price_1d = [];

                    for (var j = 0; j <= 288; j++) {
                        total_volume_1d = total_volume_1d + tickList[j].volumeto;
                        high_price_1d.push(tickList[j].high);
                    }



                    
                   console.log(total_volume_1d);


                    $('.moneda-volumen-'+coinList[i].Market.MarketName).append(calculoPorcentajeVariacion(coinList[i].Summary.BaseVolume,total_volume_1d));
                    $('.moneda-precio-'+coinList[i].Market.MarketName).append(calculoPrecioVariacion(coinList[i].Summary.Last,calcularMedia(high_price_1d)));




                },"json").fail(function(xhr, status, error) {
                    
                    console.log(error);
                    console.log(xhr.responseText);

                });

                if(limite_monedas == $('.market-content').find('tr').length)
                {
                    $('#monitor-body').removeClass('__loading');
                }

                

                //return false;
                

            })



            
            console.log(coinList);


        },"json").fail(function(xhr, status, error) {
            
            console.log(error);
            console.log(xhr.responseText);

        });

        

        function calculoPorcentajeVariacion(antes, despues)
        {
            var diferencia = antes - despues;

            if(diferencia > 0)
            {
                var cambio = "Aumento";
                
            }
            else if(diferencia < 0)
            {
                var cambio = "Disminuyo";
            }
            else
            {
                var cambio = "Estable";
            }

            var porcentaje = ((antes - despues) / despues) * 100;

            var resultado = [];
            resultado['diferencia'] = diferencia.toFixed(2);
            resultado['variacion'] = porcentaje.toFixed(2);

            if(!isFinite(porcentaje))
            {
                resultado['variacion'] = 0;
            }


            if(porcentaje >= 1)
            {
                var color = "rgba(124, 252, 0, 0.38)";
            }

            if(porcentaje > 5)
            {
                var color = "lawngreen";
            }

            if(porcentaje < 0)
            {
                var color = "rgba(255, 0, 0, 0.56)";
            }

            return '<td style="color: black;background-color: '+color+';">Volumen: '+despues.toFixed(2)+' BTC<br>Variación: '+resultado['variacion']+'%<br>'+cambio+': '+resultado['diferencia']+' BTC</td>';
        }

        function calculoPrecioVariacion(antes, despues)
        {
            var diferencia = antes - despues;

            if(diferencia > 0)
            {
                var cambio = "Aumento";
                
            }
            else if(diferencia < 0)
            {
                var cambio = "Disminuyo";
            }
            else
            {
                var cambio = "Estable";
            }

            var porcentaje = ((antes - despues) / despues) * 100;

            var resultado = [];
            resultado['diferencia'] = diferencia.toFixed(10);
            resultado['variacion'] = porcentaje.toFixed(10);

            if(!isFinite(porcentaje))
            {
                resultado['variacion'] = 0;
            }

            if(porcentaje >= 1)
            {
                var color = "rgba(124, 252, 0, 0.38)";
            }

            if(porcentaje > 5)
            {
                var color = "lawngreen";
            }
            else if(porcentaje < 0)
            {
                var color = "rgba(255, 0, 0, 0.56)";
            }

            return '<td style="color: black;background-color: '+color+'">Precio: '+despues.toFixed(10)+' BTC<br>Variación: '+resultado['variacion']+'%<br>'+cambio+': '+resultado['diferencia']+' BTC</td>';
        }

        function calcularMedia(lista)
        {
            var total = 0;
            $.each(lista, function(i){
                total = total + lista[i];
            })

            var total = total / lista.length;

            return total;
        }

        



        







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