<?php

class Etiquetas {

    private $id_etiquetas;
    private $etiqueta;
    private $idPosts;

    public function getIdEtiquetas(){
        return $this->id_etiquetas;
    }

    public function getEtiqueta(){
        return $this->etiqueta;
    }

    public function getIdPosts(){
        return $this->idPosts;
    }

    public function setEtiqueta($etiqueta){
        $this->etiqueta = $etiqueta;
    }
//8b26455eed5c7d2b5cc397e108e9b337.jpg
    public function setIdPosts($idPosts){
        $this->idPosts = $idPosts;
    }

    public function insertar_etiqueta(){
        $conexion = conexion_bd();

        $consulta = $conexion->prepare("INSERT INTO etiquetas (etiqueta, idPosts) VALUES (?,?);");

        $idPost = $this->getIdPosts();
        $etiqueta = $this->getEtiqueta();

        if(!$consulta->bind_param("si", $etiqueta, $idPost)){
            print_r("Error en la insercción de etiqueras");
            die();
        }

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

    public function obtener_etiquetas_post($idPost){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Select * from etiquetas where idPosts = ?");

        if(!$consulta->bind_param("i", $idPost)){
            print_r("Error en la consulta a la base de datos");
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