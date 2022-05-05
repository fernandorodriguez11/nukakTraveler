<?php

session_start();

require '../app/controladores/ControladorPost.php';
require '../app/controladores/ControladorUsuario.php';

require '../app/modelos/Usuario.php';
require '../app/modelos/Posts.php';
require '../app/modelos/Imagenes.php';
require '../app/modelos/Contenido.php';
require '../app/modelos/Comentarios.php';
require '../app/modelos/Etiquetas.php';
require '../app/modelos/Sesiones.php';

require '../app/utils/config.php';
require '../app/utils/funciones.php';
 
// Enrutamiento
$map = array(
    'inicio'=>array('controlador'=>'ControladorPost','metodo'=>'inicio', 'publica' => true),
    'cargar_post'=>array('controlador'=>'controladorPost', 'metodo'=> 'cargar_post', 'publica' => true),
    'posts_siguientes'=>array('controlador'=>'controladorPost', 'metodo'=> 'posts_siguientes', 'publica' => true),
    'primer_post'=>array('controlador'=>'controladorPost', 'metodo'=> 'primer_post', 'publica' => true),
    'last_post'=>array('controlador'=>'controladorPost', 'metodo'=> 'last_post', 'publica' => true),
    'descubre' => array('controlador' => 'ControladorPost', 'metodo' => 'descubre', 'publica' => true),
    'contacto' => array('controlador' => 'ControladorPost', 'metodo' => 'contacto', 'publica' => true),
    'aviso_legal' => array('controlador' => 'ControladorPost', 'metodo' => 'aviso_legal', 'publica' => true),
    'politica_privacidad' => array('controlador' => 'ControladorPost', 'metodo' => 'politica_privacidad', 'publica' => true),
    'politica_cookies' => array('controlador' => 'ControladorPost', 'metodo' => 'politica_cookies', 'publica' => true),
    'insertar_comentario' => array('controlador' => 'ControladorPost', 'metodo' => 'insertar_comentario', 'publica' => true),
    'insertar_respuesta' => array('controlador' => 'ControladorPost', 'metodo' => 'insertar_respuesta', 'publica' => true),
    'admin'=>array('controlador' => 'ControladorUsuario', 'metodo' => 'inicio_admin', 'publica' => true),
    'login'=>array('controlador' => 'ControladorUsuario', 'metodo' => 'login', 'publica' => true),
    'crear_post' => array('controlador' => 'ControladorPost', 'metodo' => 'crear_post', 'publica' => false),
    'config' => array('controlador' => 'ControladorPost', 'metodo' => 'config', 'publica' => false),
    'quitar_favorito' => array('controlador' => 'ControladorPost', 'metodo' => 'quitar_favorito', 'publica' => false),
    'poner_favorito' => array('controlador' => 'ControladorPost', 'metodo' => 'poner_favorito', 'publica' => false),
    'edit_post' => array('controlador' => 'ControladorPost', 'metodo' => 'edit_post', 'publica' => false),
    'edit_content' => array('controlador' => 'ControladorPost', 'metodo' => 'edit_content', 'publica' => false),
    'insertar' => array('controlador' => 'ControladorPost', 'metodo' => 'insertar', 'publica' => false),
    'cerrarSesion' => array('controlador' => 'ControladorUsuario', 'metodo' => 'cerrarSesion', 'publica' => false)
    );


//Comprobamos la cookie de usuario. Si tiene cookie pero todavía no lo hemos identificado,
//iniciamos sesión
/*
if(!Sesiones::existe_variable_sesion() && isset($_COOKIE['codigo_cookie'])){
    $usuario = new Personal();
    if($usuario->obtener_cookie($_COOKIE['codigo_cookie']))
    {
        Sesiones::iniciarSesion($usuario);
        //Si el comando es inicio lo cambiamos a listar_mensajes para que no le aparezca el formulario de login
        if($comando=='inicio')
            $comando='bienvenido';
    }
    else
    {
        guardar_mensaje(("No puedes acceder a esta sección de la web"));
        header("location: index.php");
        die();
    }
}*/

//Si ya ha iniciado sesión e intenta entrar en inicio lo redirigimos a listar_mensajes
/*if(Sesiones::existe_variable_sesion() && $map[$_GET['comando']]=='inicio')
{
    $comando = 'bienvenido';
}*/


/*
//Comprobamos la sesión. Si no ha iniciado sesión y la página no es pública redirigimos a index.php
if(!Sesiones::existe_variable_sesion() && !$map[$_GET['comando']]['publica']){
    //guardar_mensaje("Debes iniciar sesión para acceder a la página solicitada");
    //header("location: index.php");
    $comando = 'inicio';
    die();
}
*/

//Parseo de la ruta.
//Si el comando no existe o está vacío nos manda al inicio 
if(!isset($_GET['comando']) || empty($_GET['comando'])){
    $comando = 'inicio';
}
// Si no está en el mapa que es nuestro array muestra un mensaje de error.
elseif(!isset($map[$_GET['comando']])){
    //La pagina no existe
    guardar_mensaje("esta pagina no existe ". $_GET['comando']);
    $comando = 'inicio';
    
}else if(!Sesiones::existe_variable_sesion() && !$map[$_GET['comando']]['publica']){
    header("location: index.php");
    $comando = 'inicio';
    die();
}else{
    $comando = $_GET['comando'];
}

//Ejecución del controlador.
$nombre_clase = $map[$comando]['controlador'];
$nombre_metodo = $map[$comando]['metodo'];

$objeto = new $nombre_clase();
$objeto->$nombre_metodo();