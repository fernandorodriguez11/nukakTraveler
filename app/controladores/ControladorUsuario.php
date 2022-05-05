<?php

class ControladorUsuario {

    public function inicio_admin(){
        require '../app/vistas/login_admin.php';
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = new Usuario();
            
            $email = limpiar_datos($_POST['email']);
            $password = limpiar_datos($_POST['password']);

            if(!$usuario->obtener_email($email)){
                header("location:".RUTA."admin");
            }else if( $password === $usuario->getPasswordAdmin()){
                Sesiones::iniciarSesion($usuario);
                header("location: index.php?comando=crear_post");
            }else{
                header("location:".RUTA."admin");
            }

        }
    }

    public function cerrarSesion(){
        Sesiones::cerrarSesion();
        header('location:'.RUTA);
    }

}