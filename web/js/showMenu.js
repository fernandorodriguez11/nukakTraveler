var abierto = false;

$(function(){
    $("#cookies").css('display', 'none');
    $("#boton_menu").on('click', abreMenu);
    $("#aceptar").on('click', cierraCookies);
    $("#rechazar").on('click', cierraCookies);
    $("#show__cookies").on('click', abreCookies);
});

function cierraCookies(){

    $("#cookies").css('display', 'none');
    $("#show__cookies").css('display', 'block');
}

function abreCookies(){

    $("#cookies").css('display', 'flex');
    $("#show__cookies").css('display', 'none');
}


function abreMenu(){
    
    if(abierto){
        $("#menu").css("display", "none");
        abierto = false;
    }else{
        $("#menu").css("display", "block");
        abierto = true;
    }
    
}