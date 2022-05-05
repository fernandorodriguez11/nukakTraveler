<?php

class Posts {

// <editor-fold defaultstate="collapsed" desc="Variables">
    private $idPosts;
    private $tituloPost;
    private $nombreImagen;
    private $fechaPublicacion;
    private $favorito;
    private $fecha_programada;
    // </editor-fold>
//<editor-fold defaultstate="collapsed" desc="Propiedades">

    function getIdPosts() {
        return $this->idPosts;
    }

    function getTituloPost() {
        return $this->tituloPost;
    }

    function getNombreImagen() {
        return $this->nombreImagen;
    }

    function getFavorito() {
        return $this->favorito;
    }

    function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    function getFechaProgramada() {
        return $this->fecha_programada;
    }

    function setTituloPost($tituloPost) {
        $this->tituloPost = $tituloPost;
    }

    function setNombreImagen($nombreImagen) {
        $this->nombreImagen = $nombreImagen;
    }

    function setFavorito($favorito) {
        $this->favorito = $favorito;
    }

    function setFechaPublicacion($fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    function setFechaProgramada($fecha_programada) {
        $this->fecha_programada = $fecha_programada;
    }
// </editor-fold>
//<editor-fold defaultstate="collapsed" desc="Funciones">

    /*
    * Función en la que inserto el post
    */
    public function insertar_post(){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Insert into posts (tituloPost, nombreImagen, favorito, fecha_programada, fechaPublicacion)".
        " values(?,?,?,?, now())");

        $tituloPost = $this->getTituloPost();
        $nombreImagen = $this->getNombreImagen();
        $favorito = $this->getFavorito();
        $dateTime = $this->getFechaProgramada();

        if(empty($tituloPost)){
            return false;
        }

        $consulta->bind_param('ssis', $tituloPost, $nombreImagen, $favorito, $dateTime);

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
    public function obtener_todos_posts() {
        
        $posts = array();

        $conexion = conexion_bd();

        $consulta = 'Select * from posts';

        if (!$result = $conexion->query($consulta)) {
            echo "Error en la consulta: " . $conexion->error;
            die();
        }

        if(!$filas = $result->fetch_all(MYSQLI_ASSOC)){
            return false;
        }

        $conexion->close();

        return $filas;
    }

    /**
     * Función para obtener todos los posts de La Lety
     * @return \Posts
     */
    public function obtener_posts_destacados() {
        
        $conexion = conexion_bd();

        $consulta = 'Select * from posts where favorito = 1 and fecha_programada <= NOW() order by idPosts desc Limit 3;';

        if (!$result = $conexion->query($consulta)) {
            echo "Error en la consulta: " . $conexion->error;
            die();
        }

        if(!$filas = $result->fetch_all(MYSQLI_ASSOC)){
            return false;
        }

        $conexion->close();

        return $filas;
    }

    public function obtener_the_post($id) {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Select * from posts where idPosts = ?');

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

    public function obtener_post_byName($titulo) {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Select * from posts where tituloPost = ?');

        if(!$consulta->bind_param('s',$titulo)){
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

    public function ObtenerPrimerIdPost(){
        
        $conexion = conexion_bd();

        $consulta = 'SELECT idPosts FROM posts LIMIT 1;';

       if (!$result = $conexion->query($consulta)) {
           echo "Error en la consulta: " . $conexion->error;
           die();
       }

       $filas = $result->fetch_all(MYSQLI_ASSOC);

       $conexion->close();

       if (count($filas)>0){
           return $filas[0];
       }else{
           return 1;
       }
   }

    /*
     * Función para obtener el id del último documento.
     */
    public function ObtenerUltimoIdPost(){
        
        $conexion = conexion_bd();

        $consulta = 'SELECT idPosts FROM posts ORDER BY idPosts DESC LIMIT 1;';

       if (!$result = $conexion->query($consulta)) {
           echo "Error en la consulta: " . $conexion->error;
           die();
       }

       $filas = $result->fetch_all(MYSQLI_ASSOC);

       $conexion->close();

       if (count($filas)>0){
           return $filas[0];
       }else{
           return 1;
       }
   }

   /*
     * Función para obtener los últimos 9 posts creados
     */
    public function obtenerPrimeros9($cantidad){
        
        $conexion = conexion_bd();

        $consulta =  $conexion->prepare("SELECT * FROM posts where fecha_programada <= now()  order by idPosts desc LIMIT ? , 9;");

        if(!$consulta->bind_param("i", $cantidad)){
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
    

   /**
     * Guarda la foto en disco en la carpeta indicada. 
     * El nombre del archivo será aleatorio (md5) y mantendrá la extensión original
     * @param type $nombre_temporal Nombre temporal del archivo
     * @param type $nombre_original Nombre original del archivo
     * @param string $carpeta Nombre de la carpeta donde se guardará la foto
     * @return mixed Devuelve el nombre de archivo con el que se ha guardado en disco
     */
    public function guardar_foto_disco($nombre_temporal, $nombre_original, $carpeta) {

        //Cogemos la extensión del archivo para guardarlo con la misma extensión        
        $info_foto = pathinfo($nombre_original);
        //Extraigo la extensiond del archivo
        

        if(!isset($info_foto['extension'])){
            print_r("Es necesario seleccionar fotos");
            require '../app/vistas/crear-post.php';
            die();
        }else{
            $extension = $info_foto['extension'];
        }

        //Creo un nombre de foto con nombre random
        $nombre_foto = md5(time() + rand(0, 9999));

        while (file_exists("$carpeta/$nombre_foto.$extension")) {
            $nombre_foto = md5(time() + rand());
        }

        //Muevo el archivo de su ruta temporal a la carpeta definitiva
        move_uploaded_file($nombre_temporal, "$carpeta/$nombre_foto.$extension");

        //Cargo la imagen desde el disco
        $recurso_imagen = imagecreatefromjpeg("$carpeta/$nombre_foto.$extension");
        //Redimensiono la imagen
        $recurso_imagen_escalado = imagescale($recurso_imagen, 300);
        
        //Guardamos la imagen redimensionada en disco
        //if (!imagejpeg($recurso_imagen_escalado, "$carpeta/redim/$nombre_foto.$extension")) {
        //    guardar_mensaje("Fallo al redimensionar la imagen");
        //}

        return "$nombre_foto.$extension";

    }

    public function ponerFavorito($idPost){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Update posts set favorito = 1 where idPosts = ?;");

        if(!$consulta){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if(!$consulta->bind_param('i',$idPost)){
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
    public function quitarFavorito($idPost){
        
        $conexion = conexion_bd();
        
        $consulta = $conexion->prepare("Update posts set favorito = 0 where idPosts = ?;");

        if(!$consulta){
            echo 'Error en la consulta: '. $conexion->error;
            die();
        }
        
        if(!$consulta->bind_param('i',$idPost)){
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

// </editor-fold>
}