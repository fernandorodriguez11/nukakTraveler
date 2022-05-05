<?php

class Imagenes {

// <editor-fold defaultstate="collapsed" desc="Variables">
    private $idPosts;
    private $idImagenes;
    private $nombreImagen;

    function getIdPosts() {
        return $this->idPosts;
    }

    function getIdImagenes() {
        return $this->idImagenes;
    }

    function getNombreImagen() {
        return $this->nombreImagen;
    }

    function setIdPosts($idPosts) {
        $this->idPosts = $idPosts;
    }

    function setNombreImagen($nombreImagen) {
        $this->nombreImagen = $nombreImagen;
    }

    /*
    * Función en la que inserto el post
    */
    public function insertar_imagen(){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Insert into imagenes (nombreImagen, idPosts) values(?,?)");

        $idPosts = $this->getIdPosts();
        $nombreImagen = $this->getNombreImagen();

        $consulta->bind_param('si', $nombreImagen, $idPosts);

        if (!$consulta->execute()) {
            echo "Ha ocurrido un error en el insert" . $consulta->error;
            die();  //Paramos la ejecución;
        }

        $num_filas_insertadas = $conexion->affected_rows;
        $conexion->close();
        $consulta->close();
        if ($num_filas_insertadas == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function obtener_imagenes_post($id) {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Select * from imagenes where idPosts = ?');

        if(!$consulta->bind_param('i',$id)){
            die();
        }

        if (!$consulta->execute()) {
            echo "Error al ejecutar la consulta: " . $conexion->error;
            die();
        }
        
        if (!$filas = $consulta->get_result()->fetch_all(MYSQLI_ASSOC)) {
            return false;
        }

        $conexion->close();
        $consulta->close();

        return $filas;
    }
}