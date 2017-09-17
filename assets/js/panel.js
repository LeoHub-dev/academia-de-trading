$(function () {

    var base_url = window.location.protocol + "//" + window.location.host + "/circulo/";

    $('*').on('click', '.cargar-usuario', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var panel_body = $('#usuario-info-container');

        panel_body.show();


        $(panel_body).find('.tabla-ganancias').DataTable().clear().destroy();
        $(panel_body).find('#lista_circulo_1').html('');
        $(panel_body).find('#lista_circulo_2').html('');

        divLoadingStatus(panel_body);

        $.post(base_url+'api/admin_usuario/'+$(this).attr('id-usuario'), function(data) {

            console.log(data);
            if(data.response == true) { 

                divNormalStatus(panel_body);

                $('.usuario_label').html(data.usuario.usuario);

                $.each( data.usuario, function( key, value ) {
                  $(panel_body).find('input[name='+key+']').val(value);
                });

                $.each( data.ganancias, function( i ) {
                    if(data.ganancias[i].pagada == 0)
                    {
                        $(panel_body).find('#tabla_ganancias_pagar').find('tbody').append('<tr role="row">\
                            <td>'+i+'</td>\
                            <td>'+data.ganancias[i].razon+'</td>\
                            <td>'+data.ganancias[i].monto+'</td>\
                            <td>'+i+'</td>\
                        </tr>');
                    }
                    else 
                    {
                        $(panel_body).find('#tabla_ganancias_pagadas').find('tbody').append('<tr role="row">\
                            <td>'+i+'</td>\
                            <td>'+data.ganancias[i].razon+'</td>\
                            <td>'+data.ganancias[i].monto+'</td>\
                        </tr>');
                    }

                    $(panel_body).find('#tabla_ganancias_total').find('tbody').append('<tr role="row">\
                        <td>'+i+'</td>\
                        <td>'+data.ganancias[i].razon+'</td>\
                        <td>'+data.ganancias[i].monto+'</td>\
                        <td>'+i+'</td>\
                    </tr>');
                    
                });

                $(panel_body).find('.tabla-ganancias').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    buttons: [
                        'excel', 'pdf', 'print'
                    ]
                });

                $.each( data.circulo_1, function( i ) {


                    $(panel_body).find('#lista_circulo_1').append('<div class="col-xs-6 col-md-2">\
                        <div class="thumbnail">\
                            <img src="'+base_url+'assets/images/perfil/'+data.circulo_1[i].imagen+'">\
                            <div class="caption">\
                                <h3>'+data.circulo_1[i].nombre+' '+data.circulo_1[i].apellido+'</h3>\
                            </div>\
                        </div>\
                    </div>');
                    
                });


                $.each( data.circulo_2, function( i ) {


                    $(panel_body).find('#lista_circulo_2').append('<div class="col-xs-6 col-md-2">\
                        <div class="thumbnail">\
                            <img src="'+base_url+'assets/images/perfil/'+data.circulo_2[i].imagen+'">\
                            <div class="caption">\
                                <h3>'+data.circulo_2[i].nombre+' '+data.circulo_2[i].apellido+'</h3>\
                            </div>\
                        </div>\
                    </div>');
                    
                });

            }

        },"json").fail(function(xhr, status, error) {
            divNormalStatus(panel_body); 
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });


    })

    $("*").on("click",".marcar-pagado",function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('Desea confirmar el pago de este usuario?')) {
            
          } else {
            return;
          }

        var td = $(this).parent();

        $.post(base_url+'panel/marcar_pago', {id_ganancia : $(this).attr('data-id')}, function(data) {
            console.log(data);
            if(data.response == true)
            {   
                swal(data.response_title, data.response_text, "success");
                td.html('Pagado');

            }
            if(data.response == false)
            { 
                swal({title:'Error', type: "error", text: data.errors, html: true});  
            }

        },'json').fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });

    })

});