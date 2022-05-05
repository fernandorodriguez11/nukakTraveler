<?php 

class Comentarios{

    private $id_comentario;
    private $idPosts;
    private $fecha_comentario;
    private $nombre_usuario;
    private $email_usuario;
    private $comentario;
    private $respuestas = false;

    function getIdComentario() {
        return $this->id_comentario;
    }

    function getIdPosts() {
        return $this->idPosts;
    }

    function getNombreUsuario() {
        return $this->nombre_usuario;
    }

    function getEmailUsuario() {
        return $this->email_usuario;
    }

    function getComentario(){
        return $this->comentario;
    }

    function getFechaComentario() {
        return $this->fecha_comentario;
    }

    function setIdPosts($idPosts) {
        $this->idPosts = $idPosts;
    }

    function setIdComentario($id_comentario) {
        $this->id_comentario = $id_comentario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombre_usuario = $nombreUsuario;
    }

    function setEmailUsuario($emailUsuario) {
        $this->email_usuario = $emailUsuario;
    }

    function setComentario($comentario){
        $this->comentario = $comentario;
    }

    function setFechaComentario($fechaComentario) {
        $this->fecha_comentario = $fechaComentario;
    }

    /**
     * Funcion que inserta un comentario en la base de datos
     */
    public function insertar_comentario(){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Insert into comentarios (idPosts ,nombre_usuario, email_usuario, comentario, fecha_comentario)".
        " values(?,?,?,?, now())");

        $idPosts = $this->getIdPosts();

        //Faltan validadciones
        $nombreUsuario = $this->getNombreUsuario();
        $emailUsuario = $this->getEmailUsuario();
        $comentario = $this->getComentario();

        $consulta->bind_param('isss', $idPosts, $nombreUsuario, $emailUsuario, $comentario);

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
     * Función para obtener todos los comentarios del post
     * @return \Posts
     */
    public function obtener_todos_comentarios_post() {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare('Select * from comentarios where idPosts = ?');

        $id = $this->getIdPosts();

        if(!$consulta->bind_param('i', $id)){
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
     * Función para obtener todos las respuestas al comentario
     * @return \Posts
     */
    public function obtener_respuestas_comentarios($id_comentario) {
        
        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Select * from respuestas where id_comentario = ?");
        
        if(!$consulta->bind_param("i", $id_comentario)){
            die();
        }

        if (!$result = $conexion->query($consulta)) {
            echo "Error en la consulta: " . $conexion->error;
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
     * Función para insertar las respuestas a un comentario
     */
    public function insertar_respuesta(){

        $conexion = conexion_bd();

        $consulta = $conexion->prepare("Insert into respuestas (id_comentario, nombre_ususario, email_usuario, comentario_respuesta, fecha_respuesta)".
        " values(?,?,?,?, now())");

        $idComentario = $this->getIdComentario();
        $nombreUsuario = $this->getNombreUsuario();
        $emailUsuario = $this->getEmailUsuario();
        $comentarioRespuesta = $this->getComentario();

        if(!$consulta->bind_param('isss', $idComentario, $nombreUsuario, $emailUsuario, $comentarioRespuesta)){
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

}