var cantidad = 0;
var ultimoPost = 0;
var primerPost = 0; 

$(function(){

    $(".home__contenedor__paginado__anterior").css("visibility", "hidden");
    $("#siguiente").on('click', siguiente);
    $("#anterior").on('click', anterior);

    

});

function siguiente(){
    cantidad = cantidad + 9;
    
    $(".home__contenedor__paginado__anterior").css("visibility", "visible");

    $.ajax({
        url: 'index.php?comando=posts_siguientes',
        data: {
            'limite': cantidad
        },
        type: "POST",
        dataType: 'json',
        success: function(resultado){

            $("#home__contenedor__posts").empty();

            for(var i= 0; i < resultado.length; i++){
                primerPost = resultado[i].idPosts;
                titulo = crearTitulo(resultado[i].tituloPost);
                enlace = creaEnlace(resultado[i].idPosts);
                fondo = capaConFondoImagen(resultado[i].idPosts, i, resultado[i].nombreImagen);
                
                titulo.appendTo(enlace);
                enlace.appendTo(fondo);
                fondo.appendTo($("#home__contenedor__posts"));
            }
        },
        complete: function(){
            $.ajax({
                url: 'index.php?comando=primer_post',
                type: "POST",
                dataType: 'json',
                success: function(result){

                    if(primerPost === parseInt(result.idPosts)){

                        $(".home__contenedor__paginado__siguiente").css("visibility", "hidden");
                    }else{

                        $(".home__contenedor__paginado__siguiente").css("visibility", "visible");
                    }
                }
            });
        }
    });
}

function anterior(){

    cantidad = cantidad - 9;

    $.ajax({
        url: 'index.php?comando=posts_siguientes',
        data: {
            'limite': cantidad
        },
        type: "POST",
        dataType: 'json',
        success: function(resultado){
            
            $("#home__contenedor__posts").empty();

            for(var i= 0; i < resultado.length; i++){
                ultimoPost = resultado[0].idPosts;
                titulo = crearTitulo(resultado[i].tituloPost);
                enlace = creaEnlace(resultado[i].idPosts);
                fondo = capaConFondoImagen(resultado[i].idPosts, i, resultado[i].nombreImagen);
                
                titulo.appendTo(enlace);
                enlace.appendTo(fondo);
                fondo.appendTo($("#home__contenedor__posts"));
            }
        },
        complete: function(){
            $.ajax({
                url: 'index.php?comando=last_post',
                type: "POST",
                dataType: 'json',
                success: function(result){

                    if(ultimoPost === parseInt(result.idPosts)){

                        $(".home__contenedor__paginado__anterior").css("visibility", "hidden");
                        $(".home__contenedor__paginado__siguiente").css("visibility", "visible");
        
                    }else{
                        $(".home__contenedor__paginado__anterior").css("visibility", "visible");
                        $(".home__contenedor__paginado__siguiente").css("visibility", "visible");
                    }
                }
            });
           
        }
    });
}

function capaConFondoImagen(idPost, contador,nombreImagen){
    var capa = $("<div/>", {
        id: "imagen"+idPost,
        class: "blanco-gris imagen"+contador,
        style: "background-image: url('../web/images/"+nombreImagen+"');"
    });

    return capa;
}

function creaEnlace(idPost){
    var enlace = $("<a/>", {
        href: "index.php?comando=cargar_post&idPosts="+idPost
    });

    return enlace;
}

function crearTitulo(titulo){
    var capaTexto =  $("<div/>", {
        class: "texto"
    });

    var texto = $("<p/>",{
        text: titulo
    });

    texto.appendTo(capaTexto);

    return capaTexto;
}