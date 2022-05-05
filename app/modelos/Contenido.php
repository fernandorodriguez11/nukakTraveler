<?php

class Contenido {

// <editor-fold defaultstate="collapsed" desc="Variables">
    private $idPosts;
    private $idContenido;
    private $parte1;
    private $parte2;

    function getIdPosts() {
        return $this->idPosts;
    }

    function getIdContenido() {
        return $this->idContenido;
    }

    function getParte1() {
        return $this->parte1;
    }

    function getParte2() {
        return $this->parte2;
    }

    function setIdPosts($idPosts) {
        $this->idPosts = $idPosts;
    }

    function setParte1($parte1) {
        $this->parte1 = $parte1;
    }

    function setParte2($parte2) {
        $this->parte2 = $parte2;
    }

    /*
    * Función en la que inserto el post
    */
    public function insertar_contenido(){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Insert into contenido (parte1, parte2, idPosts) values(?, ?, ?)");

        $idPosts = $this->getIdPosts();
        $parte1 = $this->getParte1();
        $parte2 = $this->getParte2();

        $consulta->bind_param('ssi', $parte1, $parte2, $idPosts);

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

    /**
     * Función para obtener todos los posts de La Lety
     * @return \Posts
     */
    public function obtener_contenido_post($id) {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Select * from contenido where idPosts = ?');

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

    public function modificar_contenido1($id, $contenido){
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Update contenido set parte1 = ? where idPosts = ?');

        if(!$consulta){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if(!$consulta->bind_param('si',$contenido,$id)){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if (!$consulta->execute()) {
            echo 'Error en la ejecución' . $consulta->error;
            die();
        }

        $num_filas_actualizadas = $conexion->affected_rows;
        $conexion->close();
        $consulta->close();

        if ($num_filas_actualizadas == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function modificar_contenido2($id, $contenido){
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Update contenido set parte2 = ? where idPosts = ?');

        if(!$consulta){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if(!$consulta->bind_param('si',$contenido,$id)){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if (!$consulta->execute()) {
            echo 'Error en la ejecución' . $consulta->error;
            die();
        }

        $num_filas_actualizadas = $conexion->affected_rows;
        $conexion->close();
        $consulta->close();

        if ($num_filas_actualizadas == 1) {
            return true;
        } else {
            return false;
        }

    }
}