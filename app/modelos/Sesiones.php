<?php


class Sesiones{
    
    /*
     * Función para comvertir el objeto Personal en una variable sesión 
     */
    static public function iniciarSesion($usuario){
        $_SESSION['usuario'] = serialize($usuario);
    }

     /*
     * Función para eliminar la variable sesión
     */
    static public function cerrarSesion(){
        session_destroy();
        session_unset();
    }

    /*
     * Función para comprobar si existe la variable sesión
     */
    static public function existe_variable_sesion(){
        return isset($_SESSION['usuario']);
    }

    static public function obtener_idAministrador(){
        $usuario = unserialize($_SESSION['usuario']);
        return $usuario->getIdAministrador();
    }

    /*
     * Función para obtener el nombre del usuario que inicia sesión
     */
    static public function obtener_nombre(){
        $usuario = unserialize($_SESSION['usuario']);
        return $usuario->getNombre();
    }
     /*
     * Función para obtener el email del usuario que inicia sesión
     */
    static public function obtener_email(){
        $usuario = unserialize($_SESSION['usuario']);
        return $usuario->getEmail();
    }
}