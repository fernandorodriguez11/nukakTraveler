var negrita1 = false;
var negrita2 = false;

var enlace1 = false;
var enlace2 = false;

$(function(){

    $("#eContent1").on('click', edit);
    $("#eContent2").on('click', edit2);

    $("#eNegritaC1").on('click', ponerNegrita3);
    $("#eNegritaC2").on('click', ponerNegrita4);

    $("#eEnlace1").on('click', ponerEnlace3);
    $("#eEnlace2").on('click', ponerEnlace4);

    $("#eSaltoLinea1").on('click', saltoLinea3);
    $("#eSaltoLinea2").on('click', saltoLinea4);

    /*
    var contenido1Inicial = $("#contenido1").text();
    var contenido2Inicial = $("#contenido2").text();

    $("#contenido1").focusout(function(){

        if(contenido1Inicial !==$("#contenido1").text()){
            $("#contentBoton").css("display", "block");
        }else{
            console.log("hola2");
            $("#contentBoton").css("display", "none");
        }


    });
    
    $("#contenido2").focusout(function(){

        if(contenido2Inicial !==$("#contenido2").text()){
            $("#contentBoton2").css("display", "block");
        }else{
            console.log("hola2");
            $("#contentBoton2").css("display", "none");
        }


    });*/

});

function edit(){

    var nuevoContenido = $("#contenido1").text();
    var id = $("#idOculto").val();
    
    $.ajax({
        url: 'index.php?comando=edit_content',
        method: 'POST',
        data: {
            'contenido1': nuevoContenido,
            'idPost': id
        },
        dataType: 'json',
        success: function(res){
            if(res === "correcto"){
                $("#mensaje").text("Contenido modificado correctamente");
                $("#mensaje").css("color", "green");
            }else{
                $("#mensaje").text("El contenido no se ha podido modificar correctamente");
                $("#mensaje").css("color", "red");
            }

            setTimeout(function(){
                $("#mensaje").text("");
            }, 3000);

        }
    });
}

function edit2(){

    var nuevoContenido = $("#contenido2").text();
    var id = $("#idOculto").val();
    
    $.ajax({
        url: 'index.php?comando=edit_content',
        method: 'POST',
        data: {
            'contenido2': nuevoContenido,
            'idPost': id
        },
        dataType: 'json',
        success: function(res){
            
            if(res === "correcto"){
                $("#mensaje1").text("Contenido modificado correctamente");
                $("#mensaje1").css("color", "green");
            }else{
                $("#mensaje1").text("El contenido no se ha podido modificar correctamente");
                $("#mensaje1").css("color", "red");
            }

            setTimeout(function(){
                $("#mensaje1").text("");
            }, 3000);
        }
    });
}

function ponerNegrita3(){
   
    if(negrita1 === false){
        $("#contenido1").text($("#contenido1").text()+"[sNeg]");
        $("#eNegritaC1").css("background-color", "black");
        $("#eNegritaC1").css("color", "white");
        negrita1 = true;
    }else{
        $("#contenido1").text($("#contenido1").text()+ "[/sNeg]");
        $("#eNegritaC1").css("background-color", "white");
        $("#eNegritaC1").css("color", "gray");
        negrita1 = false;
    }
    
}

function ponerNegrita4(){
   
    if(negrita2 === false){
        $("#contenido2").text($("#contenido2").text()+ "[sNeg]");
        $("#eNegritaC2").css("background-color", "black");
        $("#eNegritaC2").css("color", "white");
        negrita2 = true;
    }else{
        $("#contenido2").text($("#contenido2").text()+ "[/sNeg]");
        $("#eNegritaC2").css("background-color", "white");
        $("#eNegritaC2").css("color", "gray");
        negrita2 = false;
    }
    
}

function ponerEnlace3(){
   
    if(enlace1 === false){
        $("#contenido1").text($("#contenido1").text()+ "[ruta] [click]");
        $("#eEnlace1").css("background-color", "black");
        $("#eEnlace1").css("color", "white");
        enlace1 = true;
    }else{
        $("#contenido1").text($("#contenido1").text()+ "[/click][/ruta]");
        $("#eEnlace1").css("background-color", "white");
        $("#eEnlace1").css("color", "gray");
        enlace1 = false;
    }
    
}

function ponerEnlace4(){
   
    if(enlace2 === false){
        $("#contenido2").text($("#contenido2").text()+ "[ruta] [click]");
        $("#eEnlace2").css("background-color", "black");
        $("#eEnlace2").css("color", "white");
        enlace2 = true;
    }else{
        $("#contenido2").text($("#contenido2").text()+ "[/click][/ruta]");
        $("#eEnlace2").css("background-color", "white");
        $("#eEnlace2").css("color", "gray");
        enlace2 = false;
    }
    
}

function saltoLinea3(){

    $("#contenido1").text($("#contenido1").text()+ "[salto]");

}

function saltoLinea4(){

    $("#contenido2").text($("#contenido2").text()+ "[salto]");
    
}