<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <?php include_once 'modules/Header.php' ; ?>
    <style type="text/css">
        .market-content {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 12px;
        }
    </style>
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
                                <div class="title">Cargando ... Esto puede demorar hasta 3 minutos</div>
                            </div>
                            <div class="body">

                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Buscar moneda:</span>
                                            <div class="form-line">
                                                <input type="text" id="search-moneda" class="form-control" placeholder="Nombre de la moneda" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Actualizacion automatica en : <span id="timer"></span></p>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <h2 class="card-inside-title">Ordernar tabla por :</h2>
                                        <div class="demo-radio-button">
                                            <input name="acomodar-tabla" type="radio" id="radio-normal" value="normal" checked="">
                                            <label for="radio-normal">Por defecto</label>
                                            <input name="acomodar-tabla" type="radio" id="radio-mayor-variacion" value="mayor">
                                            <label for="radio-mayor-variacion">Mayor Variacion</label>
                                            <input name="acomodar-tabla" type="radio" id="radio-menor-variacion" value="menor">
                                            <label for="radio-menor-variacion">Menor Variacion</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">

                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="monitor-table">
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

                      
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <style type="text/css">
        .modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
    </style>

    

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-col-blue">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Cambios importantes (5 min)</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Moneda</th>
                                            <th>Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody class="alert-content">

                      
                                    </tbody>
                                </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">X</button>
                        </div>
                    </div>
                </div>
            </div>

    <?php include_once 'modules/Scripts.php' ; ?>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?= asset_url(); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script type="text/javascript">
        
        cargarInfo();

        document.getElementById('timer').innerHTML = 05 + ":" + 00;
        startTimer();

        window.setInterval(function(){
            $('.market-content').html('');
            $('.alert-content').html('');
            $('#monitor-body').addClass('__loading');
            cargarInfo();
            document.getElementById('timer').innerHTML = 05 + ":" + 00;
            startTimer();
        }, 300000);
        
        //window.setInterval(cargarInfo, 20000);

        var tabla_normal = "";

        $('input[type=radio][name=acomodar-tabla]').change(function() {


            var array_tabla = [];

            $('#monitor-table > tbody > tr').each(function(i){

                if((i+1)%2)
                {
                    var data = [];
                    data['linea'] = $(this)[0].outerHTML + $('#monitor-table > tbody > tr').eq(i+1)[0].outerHTML;
                    

                    var total_variacion = 0;
                    $(this).find('td').each(function(j){
                        if(j <= 2) { return true; }
                        total_variacion = total_variacion + parseFloat($(this).attr('moneda-variacion'));
                    })

                    $('#monitor-table > tbody > tr').eq(i+1).find('td').each(function(j){
                        if(j <= 2) { return true; }
                        total_variacion = total_variacion + parseFloat($(this).attr('moneda-variacion'));
                    })

                    data['variacion'] = total_variacion;

                    array_tabla.push(data);
                }
                
                

            })

            if($(this).val() == "normal")
            {
                array_tabla = null;
                $('.market-content').html(tabla_normal);
            }

            if($(this).val() == "mayor")
            {

                $('.market-content').html("");
                

                for (var i = 0; i < array_tabla.length; i++) {
                    for (var j = i+1; j < array_tabla.length; j++) {
                        if(array_tabla[i]['variacion'] < array_tabla[j]['variacion'])
                        {
                            var aux = array_tabla[i];
                            array_tabla[i] = array_tabla[j];
                            array_tabla[j] = aux;
                        }
                    }
                }

            }

            if($(this).val() == "menor")
            {
                $('.market-content').html("");

                for (var i = 0; i < array_tabla.length; i++) {
                    for (var j = i+1; j < array_tabla.length; j++) {
                        if(array_tabla[i]['variacion'] > array_tabla[j]['variacion'])
                        {
                            var aux = array_tabla[i];
                            array_tabla[i] = array_tabla[j];
                            array_tabla[j] = aux;
                        }
                    }
                }
            }


            $.each(array_tabla, function(i){
                $('.market-content').append(array_tabla[i]['linea']);
            })



        });

        $('*').on('click', '.search-this-moneda', function(e){

            e.preventDefault();
            e.stopImmediatePropagation();

            $('#search-moneda').val($(this).attr('moneda-nombre'));
            $('#search-moneda').trigger("input");

        })

            


        
        $('#search-moneda').on('input', function(e) { 


            e.preventDefault();
            e.stopImmediatePropagation();

            var coin_search = $(this).val();

            var coin_search = new RegExp("("+coin_search+")","gi"); 

            if($(this).val() == "")
            {
                $('#monitor-table > tbody > tr').each(function(){

                    if(parseInt($(this).attr('ocultar-siempre')) == 0)
                    {
                        $(this).removeClass('hidden');
                    }
                    else
                    {
                        $(this).addClass('hidden');
                    }
                    
    
                })
            }
            else
            {
                $('#monitor-table > tbody > tr').each(function(){

                
                    if ( $(this).attr('moneda-nombre').match(coin_search) ) {
                      $(this).removeClass('hidden');
                    } else {
                      $(this).addClass('hidden');
                    } 
                })
            }
   

            

            
        });


        function startTimer() {
            var presentTime = document.getElementById('timer').innerHTML;
            var timeArray = presentTime.split(/[:]+/);
            var m = timeArray[0];
            var s = checkSecond((timeArray[1] - 1));
            if(s==59){m=m-1}
            if(m<0){return;}
          
            document.getElementById('timer').innerHTML =
            m + ":" + s;
            setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
            if (sec < 0) {sec = "59"};
            return sec;
        }

        function cargarInfo()
        {

            var carga_monedas = $.get('https://academiadetrading.net/mercado/api_coins', function(response) 
            {
                $.each(response, function(i){


                    var fase1 = 0;
                    var fase2 = 0;
                    var fase3 = 0;
                    var fase4 = 0;

                    if(response[i].Actual == null){ console.log(response[i]); return true; }

                    if(response[i].Actual.Summary.BaseVolume > 0 && response[i].Actual.Summary.BaseVolume < 21){
                        var fase1 = 1;
                    }

                    if(response[i].Actual.Summary.BaseVolume > 20 && response[i].Actual.Summary.BaseVolume < 50){
                        var fase2 = 1;
                    }

                    if(response[i].Actual.Summary.BaseVolume > 49 && response[i].Actual.Summary.BaseVolume < 100){
                        var fase3 = 1;
                    }

                    if(response[i].Actual.Summary.BaseVolume > 100){
                        var fase4 = 1;
                    }

                    if(response[i].Actual.Summary.MarketName.substring(0, 3) != 'BTC'){ return true; }

                    if(response[i].Actual.Summary.BaseVolume < 50){ var ocultar = 1; } else { var ocultar = 0; }

                    if(response[i].OneDay == null){ return true; }

                    var moneda_split = response[i].Actual.Market.MarketName.split("-");

                    if(ocultar == 1)
                    {
                        $('.market-content').append('<tr moneda-nombre="'+response[i].Actual.Market.MarketName+'" ocultar-siempre="1" class="moneda-volumen-'+response[i].Actual.Market.MarketName+' hidden">\
                            <th scope="row" rowspan="2"><div class="btn-group">\
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">\
                                                '+response[i].Actual.Market.MarketName+' <span class="caret"></span>\
                                            </button>\
                                            <ul class="dropdown-menu">\
                                                <li><a href="https://www.tradingview.com/chart/?symbol=BITTREX%3A'+moneda_split[1]+moneda_split[0]+'" target="_blank" class="waves-effect waves-block">Trading View Chart</a></li>\
                                                <li><a href="https://bittrex.com/Market/Index?MarketName='+response[i].Actual.Market.MarketName+'" target="_blank" class=" waves-effect waves-block">Ver en Bittrex</a></li>\
                                            </ul>\
                                        </div></th>\
                            <td>Volumen<br>'+response[i].Actual.Summary.BaseVolume+' BTC</td>\
                        </tr>\
                        <tr moneda-nombre="'+response[i].Actual.Market.MarketName+'" ocultar-siempre="1" class="moneda-precio-'+response[i].Actual.Market.MarketName+' hidden">\
                            <td>Precio<br>'+response[i].Actual.Summary.Last.toFixed(10)+' BTC</th>\
                        </tr>');


                    }
                    else
                    {
                        $('.market-content').append('<tr moneda-nombre="'+response[i].Actual.Market.MarketName+'" ocultar-siempre="0" class="moneda-volumen-'+response[i].Actual.Market.MarketName+'">\
                            <th scope="row" rowspan="2"><div class="btn-group">\
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">\
                                                '+response[i].Actual.Market.MarketName+' <span class="caret"></span>\
                                            </button>\
                                            <ul class="dropdown-menu">\
                                                <li><a href="https://www.tradingview.com/chart/?symbol=BITTREX%3A'+moneda_split[1]+moneda_split[0]+'" target="_blank" class="waves-effect waves-block">Trading View Chart</a></li>\
                                                <li><a href="https://bittrex.com/Market/Index?MarketName='+response[i].Actual.Market.MarketName+'" target="_blank" class=" waves-effect waves-block">Ver en Bittrex</a></li>\
                                            </ul>\
                                        </div></th>\
                            <td>Volumen<br>'+response[i].Actual.Summary.BaseVolume+' BTC</td>\
                        </tr>\
                        <tr moneda-nombre="'+response[i].Actual.Market.MarketName+'" ocultar-siempre="0" class="moneda-precio-'+response[i].Actual.Market.MarketName+'">\
                            <td>Precio<br>'+response[i].Actual.Summary.Last.toFixed(10)+' BTC</th>\
                        </tr>');

                        
                    }

                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].FiveMin.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].TenMin.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].FifteenMin.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].ThirtyMin.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].OneHour.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].TwoHour.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].FourHour.Summary.BaseVolume));
                    $('.moneda-volumen-'+response[i].Actual.Market.MarketName).append(calculoPorcentajeVariacion(response[i].Actual.Summary.BaseVolume,response[i].OneDay.Summary.BaseVolume));

                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].FiveMin.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].TenMin.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].FifteenMin.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].ThirtyMin.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].OneHour.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].TwoHour.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].FourHour.Summary.Last));
                    $('.moneda-precio-'+response[i].Actual.Market.MarketName).append(calculoPrecioVariacion(response[i].Actual.Summary.Last,response[i].OneDay.Summary.Last));

                    var cambio_volumen = calcularPorcentaje(response[i].Actual.Summary.BaseVolume,response[i].FiveMin.Summary.BaseVolume);
                    var cambio_precio = calcularPorcentaje(response[i].Actual.Summary.Last.toFixed(10),response[i].FiveMin.Summary.Last);

                    if(fase1 == 1)
                    {

                        if(cambio_volumen > 50)
                        {
                            $('.alert-content').append('<tr><td><a href="javascript:void(0)" class="search-this-moneda" style="color: #ffffff;text-decoration: underline;" moneda-nombre="'+response[i].Actual.Market.MarketName+'">'+response[i].Actual.Market.MarketName+'</a></td><td>Cambio en el volumen de un '+cambio_volumen+'%</td></tr>');
                        }

                    }

                    if(fase2 == 1)
                    {

                        if(cambio_volumen > 30)
                        {
                            $('.alert-content').append('<tr><td><a href="javascript:void(0)" class="search-this-moneda" style="color: #ffffff;text-decoration: underline;" moneda-nombre="'+response[i].Actual.Market.MarketName+'">'+response[i].Actual.Market.MarketName+'</a></td><td>Cambio en el volumen de un '+cambio_volumen+'%</td></tr>');
                        }

                    }

                    if(fase3 == 1)
                    {

                        if(cambio_volumen > 20)
                        {
                            $('.alert-content').append('<tr><td><a href="javascript:void(0)" class="search-this-moneda" style="color: #ffffff;text-decoration: underline;" moneda-nombre="'+response[i].Actual.Market.MarketName+'">'+response[i].Actual.Market.MarketName+'</a></td><td>Cambio en el volumen de un '+cambio_volumen+'%</td></tr>');
                        }

                    }

                    if(fase4 == 1)
                    {

                        if(cambio_volumen > 10)
                        {
                            $('.alert-content').append('<tr><td><a href="javascript:void(0)" class="search-this-moneda" style="color: #ffffff;text-decoration: underline;" moneda-nombre="'+response[i].Actual.Market.MarketName+'">'+response[i].Actual.Market.MarketName+'</a></td><td>Cambio en el volumen de un '+cambio_volumen+'%</td></tr>');
                        }

                    }

                    var cambio_drastico_precio = calcularPorcentaje(response[i].Actual.Summary.Last.toFixed(10),response[i].TenMin.Summary.Last);

                    if(cambio_drastico_precio <= 0)
                    {
                        if(cambio_precio > 4)
                        {
                            $('.alert-content').append('<tr><td><a href="javascript:void(0)" class="search-this-moneda" style="color: #ffffff;text-decoration: underline;" moneda-nombre="'+response[i].Actual.Market.MarketName+'">'+response[i].Actual.Market.MarketName+'</a></td><td>Cambio en el precio de un '+cambio_precio+'%</td></tr>');
                        }
                    }

                    

                    
                })


            },"json").fail(function(xhr, status, error) {
                
                console.log(error);
                console.log(xhr.responseText);

            });

            carga_monedas.done(function() {
                $('#monitor-body').removeClass('__loading');
                tabla_normal = $('.market-content').html();
                if($('.alert-content > tr').length > 0)
                {
                    $('#defaultModal').modal('show');
                    var audio = new Audio('http://academiadetrading.net/assets/alert_1.mp3');
                    audio.play();
                }
                
                $('#search-moneda').trigger("input");

            });

        }

        

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


            if(porcentaje > 0)
            {
                var color = "rgba(124, 252, 0, 0.38)";
            }

            if(porcentaje > 5)
            {
                var color = "lawngreen";
            }

            if(porcentaje < 0)
            {
                var color = "rgba(255, 0, 0, 0.5)";
            }

            if(porcentaje < -5)            {
                var color = "rgba(255, 0, 0, 0.75)";
            }

            return '<td moneda-variacion="'+resultado['variacion']+'" style="color: black;background-color: '+color+';">Volumen: '+despues.toFixed(2)+' BTC<br>Variación: '+resultado['variacion']+'%<br>'+cambio+': '+resultado['diferencia']+' BTC</td>';
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
            resultado['variacion'] = porcentaje.toFixed(2);

            if(!isFinite(porcentaje))
            {
                resultado['variacion'] = 0;
            }

            if(porcentaje > 0)
            {
                var color = "rgba(124, 252, 0, 0.38)";
            }

            if(porcentaje > 5)
            {
                var color = "lawngreen";
            }
            
            if(porcentaje < 0)
            {
                var color = "rgba(255, 0, 0, 0.5)";
            }

            if(porcentaje < -5)            {
                var color = "rgba(255, 0, 0, 0.75)";
            }

            return '<td moneda-variacion="'+resultado['variacion']+'" style="color: black;background-color: '+color+'">Precio: '+despues.toFixed(10)+' BTC<br>Variación: '+resultado['variacion']+'%<br>'+cambio+': '+resultado['diferencia']+' BTC</td>';
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

        function calcularPorcentaje(antes, despues)
        {
            /*console.log(antes);
            console.log(despues);
            console.log('__________________');*/
            var porcentaje = ((antes - despues) / despues) * 100;



            return porcentaje.toFixed(2);
        }

        


      
    </script>
</body>

</html>