$(function () {

    var base_url = window.location.protocol + "//" + window.location.host + "/";



    $('#login-form').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);
        
        divLoadingStatus($('.auth_card')); 
        
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){   swal(data.response_title, data.response_text, "success").then(function () { window.location.replace(base_url+"dashboard/"); }); setTimeout(function(){ window.location.replace("./dashboard"); }, 2000); } else {  divNormalStatus($('.auth_card')); showFormError(form,data.errors); }
        },"json").fail(function(xhr, status, error) {

            divNormalStatus($('.auth_card'));

            console.log(error);
            console.log(xhr.responseText);

        });
    });

    $('#register-form').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);
        
        divLoadingStatus($('.auth_card')); 
        
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){  swal(data.response_title, data.response_text, "success").then(function () { window.location.replace(base_url+"dashboard/"); }); setTimeout(function(){ window.location.replace(base_url+"dashboard"); }, 2000); } else {  divNormalStatus($('.auth_card')); showFormError(form,data.errors); }
        },"json").fail(function(xhr, status, error) {

            divNormalStatus($('.auth_card'));

            console.log(error);
            console.log(xhr.responseText);

        });
    });

    $('#forgot-form').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);
        
        divLoadingStatus($('.auth_card')); 
        
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){  swal(data.response_title, data.response_text, "success").then(function () { window.location.replace(base_url+"auth/"); }); setTimeout(function(){ window.location.replace(base_url+"auth"); }, 2000); } else {  divNormalStatus($('.auth_card')); showFormError(form,data.errors); }
        },"json").fail(function(xhr, status, error) {

            divNormalStatus($('.auth_card'));

            console.log(error);
            console.log(xhr.responseText);

        });
    });

    $('#reset-form').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        var form = $(this);
        
        divLoadingStatus($('.auth_card')); 
        
        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){  swal(data.response_title, data.response_text, "success").then(function () { window.location.replace(base_url+"auth/"); }); setTimeout(function(){ window.location.replace(base_url+"auth"); }, 2000); } else {  divNormalStatus($('.auth_card')); showFormError(form,data.errors); }
        },"json").fail(function(xhr, status, error) {

            divNormalStatus($('.auth_card'));

            console.log(error);
            console.log(xhr.responseText);

        });
    });

    $('#input_referido').on('input', function(e) { 

        var input_group = $(this).parent().parent();
        var span = input_group.find('.referido_nombre');

        e.preventDefault();
        e.stopImmediatePropagation();

        if($(this).val() == "")
        {
            span.html('Referido');
        }
        else
        {
            $.post(base_url+'api/referido/'+$(this).val(), function(data) {
                console.log(data);
                if(data.response == true){ span.html('<font color="#3c763d">'+data.data.nombre+'</font>'); } else { span.html('<font color="#a94442">No existe el referido</font>'); }
            },"json").fail(function(xhr, status, error) {

                //divNormalStatus($('.auth_card'));

                console.log(error);
                console.log(xhr.responseText);

            });
        }

        
    });



    $('#input_referido').trigger('input');

    $('*').on('click', '.pagar-con-btc', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();

        if (confirm('¿ Esta seguro que desea pagar ?  \n Debe de tener su billetera a mano y con saldo suficiente')) {
        } else {
            return;
        }

        var pagos_con_btc = $(this).parent().parent().parent().children('form');

        var panel_body = $(this).parent().parent().parent();

        
        divLoadingStatus(panel_body);

        $.post(base_url+'pago/get_coinbase_hash',  {tipo: $(this).attr('id-tipo')}, function(data) {
            console.log(data);
            if(data.response == true) { 

                divNormalStatus(panel_body); 


                $(pagos_con_btc).show();
                $(pagos_con_btc).find('.btc-monto').val(data.payment_amount); 
                $(pagos_con_btc).find('.btc-address').val(data.data.address); 
                

                window.setInterval(function(){
                    $.post(base_url+'api/verificar_pago/'+data.data.address, null, function(payment) {

                            console.log(payment);

                            if(payment.amount_paid >= data.payment_amount)
                            {
                                location.reload();
                            }
                            $(pagos_con_btc).find('.btc-pagado').val(payment.amount_paid);

                        },"json").fail(function(xhr, status, error) {
                        console.log(error);
                        console.log(xhr.responseText);
                        console.log(status);
                    });
                }, 5000);



            }
        },"json").fail(function(xhr, status, error) {
            divNormalStatus(panel_body); 
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });
    })

    $('#perfil_form').on('submit', function(e){

        e.preventDefault();
        e.stopImmediatePropagation();   

        var form = $(this);

        $.post($(this).attr('action'), $(this).serialize(), function(data) {
            console.log(data);
            if(data.response == true){  swal(data.response_title, data.response_text, "success"); $('.imagen_perfil').attr('src',base_url+'assets/images/perfil/'+$("#image_input").val()); } else {  swal({title:'Error', type: "error", html: data.errors});    }

        },"json").fail(function(xhr, status, error) {
            console.log(error);
            console.log(xhr.responseText);
            console.log(status);
        });


    })



});
 

function parseURLParams(url) {
    var queryStart = url.indexOf("?") + 1,
        queryEnd   = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === url || query === "") return;

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=", 2);
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) parms[n] = [];
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}

function showFormSuccess(form,message)
{
    $(form).find('#success_message').show();
    $(form).find('#success_message').html(message);
    setTimeout(function(){ $(form).find('#success_message').fadeOut(function() { $(form).find('#success_message').hide(); }) }, 4000);
}

function showFormError(form,message)
{
    $(form).find('#error_message').show(); 
    $(form).find('#error_message').html(message);
    setTimeout(function(){ $(form).find('#error_message').fadeOut(function() { $(form).find('#error_message').hide(); }) }, 4000);
}

function divLoadingStatus(loading)
{
    loading.addClass('__loading');
    loading.find('input').prop('readonly',true);
    loading.find('textarea').prop('readonly',true);
    loading.find('button').prop('disabled',true);
}

function divNormalStatus(loading)
{
    loading.removeClass('__loading');
    loading.find('input').prop('readonly',false);
    loading.find('textarea').prop('readonly',false);
    loading.find('button').prop('disabled',false);
}