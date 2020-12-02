

$(document).ready(function(){
    console.log("Hello toi");
    console.log($('.nav-item').length);

    $('.nav-item').off();
    $('.nav-item').on('click',function(){
        $('.nav-item button.btn-success').removeClass('btn-success');
        $('button', this).addClass('btn-success')
    });
    
    /*$('.btn-menu').off();
    $('.btn-menu').on('click',function(){
        $.post('{{ (path('+gestion_devis_controller+')) }}',{'test':$(this).attr('id')},function(data){console.log(data)})
    });*/

});
