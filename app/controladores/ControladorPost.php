<?php

class ControladorPost {
    
    /*
     * Función que carga la home con todo los posts publicados.
     */
    public function inicio() {
        $post = new Posts();

        $posts_limitados = $post->obtenerPrimeros9(0);
        
        $posts = $post->obtener_todos_posts();
        
        require '../app/vistas/home.php';
    }

    public function cargar_post(){

        $post = new Posts();
        $contenido = new Contenido();
        $imagenes = new Imagenes();
        $comentarios = new Comentarios();
        $etiquetas = new Etiquetas();

        $id = $_GET['idPosts'];
        
        $content = $contenido->obtener_contenido_post($id);
        $image = $imagenes->obtener_imagenes_post($id);
        $thePost = $post->obtener_the_post($id);
        $tags = $etiquetas->obtener_etiquetas_post($id);

        $comentarios->setIdPosts(intval($id));

        $todosComents = $comentarios->obtener_todos_comentarios_post();

        require '../app/vistas/post_seleccionado.php';

    }

    public function edit_post(){

        $post = new Posts();
        $contenido = new Contenido();
        $imagenes = new Imagenes();
        $etiquetas = new Etiquetas();

        $id = $_GET['idPosts'];
        
        $content = $contenido->obtener_contenido_post($id);
        $image = $imagenes->obtener_imagenes_post($id);
        $thePost = $post->obtener_the_post($id);
        $tags = $etiquetas->obtener_etiquetas_post($id);

        require '../app/vistas/edit-post.php';

    }

    function posts_siguientes(){
        
        $post = new Posts();
        $cantidad = $_POST['limite'];

        $posts_limitados = $post->obtenerPrimeros9($cantidad);
        
        print_r(json_encode($posts_limitados));
    }

    function primer_post(){
        $post = new Posts();

        $numero = $post->ObtenerPrimerIdPost();
        
        print_r(json_encode($numero));
    }

    function last_post(){
        $post = new Posts();

        $numero = $post->ObtenerUltimoIdPost();
        
        print_r(json_encode($numero));
    }

    public function descubre(){
        $post = new Posts();

        $posts_destacados = $post->obtener_posts_destacados();

        require '../app/vistas/descubre.php';
    }

    public function contacto(){
        require '../app/vistas/contacto.php';
    }

    public function crear_post(){
        require '../app/vistas/crear-post.php';
    }

    public function aviso_legal(){

        require '../app/vistas/aviso-legal.php';

    }
    
    public function politica_privacidad(){

        require '../app/vistas/politica-privacidad.php';

    }

    public function politica_cookies(){
        require '../app/vistas/politica-cookies.php';
    }

    public function config(){
        
        $post = new Posts();
        $the_posts = $post->obtener_todos_posts();

        require '../app/vistas/configuracion.php';
    }

    public function quitar_favorito(){
        $post = new Posts();
        $post->quitarFavorito($_GET['idPosts']);
        header('location:'.RUTA.'config');
    }

    public function poner_favorito(){
        $post = new Posts();
        $post->ponerFavorito($_GET['idPosts']);
        header('location:'.RUTA.'config');
    }

    function edit_content(){
        $id = $_POST['idPost'];
        $contenido = new Contenido();
        if(isset($_POST['contenido1'])){

            if($contenido->modificar_contenido1($id, $_POST['contenido1'])){
                print_r(json_encode("correcto"));
            }else{
                print_r(json_encode("incorrecto"));
            }

        }else if(isset($_POST['contenido2'])){

            if($contenido->modificar_contenido2($id, $_POST['contenido2'])){
                print_r(json_encode("correcto"));
            }else{
                print_r(json_encode("incorrecto"));
            }

        } 
        
    }
    /** 
     * Función que obtiene por post: El titulo del post, la imagen principal e imagnenes secundarias del post, los contenidos del post
     * y las etiqueras que tendrá el post. 
     * Si las imagenes no tienen el formato correcto no se crea el post. Si las imagenes secundarias seleccionadas no llegan a 3
     * no se crea el post.
     */
    public function insertar(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $post = new Posts();
            $array_de_imagenes = array();
            
            if(empty($_FILES['secundaria0']['name'])){
                
            }else{

                if($_FILES['secundaria0']['type'] != 'image/gif' && $_FILES['secundaria0']['type'] != 'image/png' &&
                $_FILES['secundaria0']['type'] != 'image/jpeg' && $_FILES['secundaria0']['type'] != 'image/jpg' ){

                    guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                    print_r("Imagen 1 no tiene el formato adecuado png jpg");
                    require '../app/vistas/crear-post.php';
                    die();
                }

                $imagen0 = $post->guardar_foto_disco($_FILES['secundaria0']['tmp_name'],$_FILES['secundaria0']['name'], 'images');
                array_push($array_de_imagenes, $imagen0);
            }

            if(empty($_FILES['secundaria1']['name'])){
                
            }else{
                if($_FILES['secundaria1']['type'] != 'image/gif' && $_FILES['secundaria1']['type'] != 'image/png' &&
                $_FILES['secundaria1']['type'] != 'image/jpeg' && $_FILES['secundaria1']['type'] != 'image/jpg' ){

                    guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                    print_r("Imagen 2 no tiene el formato adecuado png jpg");
                    require '../app/vistas/crear-post.php';
                    die();
                }
                $imagen1 = $post->guardar_foto_disco($_FILES['secundaria1']['tmp_name'],$_FILES['secundaria1']['name'], 'images');
                array_push($array_de_imagenes, $imagen1);
            }

            if(empty($_FILES['secundaria2']['name'])){
                
            }else{
                if($_FILES['secundaria2']['type'] != 'image/gif' && $_FILES['secundaria2']['type'] != 'image/png' &&
                $_FILES['secundaria2']['type'] != 'image/jpeg' && $_FILES['secundaria2']['type'] != 'image/jpg' ){

                    guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                    print_r("Imagen 3 no tiene el formato adecuado png jpg");
                    require '../app/vistas/crear-post.php';
                    die();
                }
                $imagen2 = $post->guardar_foto_disco($_FILES['secundaria2']['tmp_name'],$_FILES['secundaria2']['name'], 'images');
                array_push($array_de_imagenes, $imagen2);
            }

            if(empty($_FILES['secundaria3']['name'])){
                
            }else{
                if($_FILES['secundaria3']['type'] != 'image/gif' && $_FILES['secundaria3']['type'] != 'image/png' &&
                $_FILES['secundaria3']['type'] != 'image/jpeg' && $_FILES['secundaria3']['type'] != 'image/jpg' ){

                    guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                    print_r("Imagen 4 no tiene el formato adecuado png jpg");
                    require '../app/vistas/crear-post.php';
                    die();
                }
                $imagen3 = $post->guardar_foto_disco($_FILES['secundaria3']['tmp_name'],$_FILES['secundaria3']['name'], 'images');
                array_push($array_de_imagenes, $imagen3);
            }

            if(empty($_FILES['secundaria4']['name'])){
                
            }else{

                if($_FILES['secundaria4']['type'] != 'image/gif' && $_FILES['secundaria4']['type'] != 'image/png' &&
                $_FILES['secundaria4']['type'] != 'image/jpeg' && $_FILES['secundaria4']['type'] != 'image/jpg' ){

                    guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                    print_r("Imagen 5 no tiene el formato adecuado png jpg");
                    require '../app/vistas/crear-post.php';
                    die();
                }
                $imagen5 = $post->guardar_foto_disco($_FILES['secundaria4']['tmp_name'],$_FILES['secundaria4']['name'], 'images');
                array_push($array_de_imagenes, $imagen5);
            }

            //Compruebo que tengamos el mínimo de imagenes
            if(count($array_de_imagenes) < 3){
                print_r("Debes de seleccionar 3 4 o 5 imagenes");
                require '../app/vistas/crear-post.php';
                die();
            }

            $titulo = $_POST['titulo'];
            $post->setTituloPost($titulo);

            if($_FILES['imagenPrincipal']['type'] != 'image/gif' && $_FILES['imagenPrincipal']['type'] != 'image/png' &&
                  $_FILES['imagenPrincipal']['type'] != 'image/jpeg' && $_FILES['imagenPrincipal']['type'] != 'image/jpg' ){

                guardar_mensaje("El archivo no tiene un formato válido (png,jpeg,gif,jpg)");
                print_r("Debes de seleccionar una imagen principal");
                require '../app/vistas/crear-post.php';
                die();
            }
            
            //Guardo la imagen en la carpeta con formato md5 y obtengo el nombre para guardarlo en la base de datos.
            $imagenPrincipal = $post->guardar_foto_disco($_FILES['imagenPrincipal']['tmp_name'], 
                                                         $_FILES['imagenPrincipal']['name'], 'images');
            
            $post->setNombreImagen($imagenPrincipal);

            if(!empty($_POST['favorito'])){
                $post->setFavorito(intval($_POST['favorito']));
            }else{
                $post->setFavorito(0);
            }

            
            $dateTime;
            
            if(empty($_POST['fechaProgramada']) && empty($_POST['horaProgramada']) ){
            
                $dateTime = date('Y-m-d H:i');
            }else{
                $dateTime = $_POST['fechaProgramada']. ' '. $_POST['horaProgramada'];
            }

            $post->setFechaProgramada($dateTime);

            if($post->insertar_post()){

                $imagen = new Imagenes();
                $contenido = new Contenido();
                $etiquetas = new Etiquetas();

                $idPost = $post->ObtenerUltimoIdPost()['idPosts'];
                
                $contenido1 = $_POST['contenido1'];
                $contenido2 = $_POST['contenido2'];

                $contenido->setIdPosts($idPost);
                $contenido->setParte1($contenido1);
                $contenido->setParte2($contenido2);

                foreach($array_de_imagenes as $imagenN){
                    $imagen->setIdPosts($idPost);
                    $imagen->setNombreImagen($imagenN);

                    if($imagen->insertar_imagen()){
                        guardar_mensaje("Imagen Insertada Correctamente");
                    }else{
                        guardar_mensaje("Error al subir la imagen");
                        require '../app/vistas/crear-post.php';
                        die();
                    }
                }

                $etiquetasC = explode(",",$_POST['etiquetas']);

                foreach($etiquetasC as $etiqueta){
                    $etiquetas->setEtiqueta($etiqueta);
                    $etiquetas->setIdPosts($idPost);

                    if($etiquetas->insertar_etiqueta()){
                        guardar_mensaje("Etiqueta Insertada Correctamente");
                    }else{
                        guardar_mensaje("Error al subir la etiqueta");
                        require '../app/vistas/crear-post.php';
                        die();
                    }
                }

                if($contenido->insertar_contenido()){
                    guardar_mensaje("Contenido Insertado Correctamente");
                }else{
                    echo("Error al subir el contenido");
                    require '../app/vistas/crear-post.php';
                    die();
                }

                print_r("Post insertado correctamente");
                require '../app/vistas/crear-post.php';

            }else{
                print_r ('No se ha podido crear el post');
                guardar_mensaje("Error al insertar el post");
                require '../app/vistas/crear-post.php';
                die();
            }

        }
    }

    public function insertar_comentario(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $comentario = new Comentarios();

            $contenido_comentario = limpiar_datos($_POST['comentario']);
            $userName =  limpiar_datos($_POST['nombreUsuario']);
            $emailUsuario = limpiar_datos($_POST['emailUsuario']);
            $id =  $_POST['idPost'];

            if (!preg_match("/^[a-zA-Z  ]*$/", $userName)) {
                guardar_mensaje("El usuario solo debe de tener caracteres");
                die();
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                $comentario->setNombreUsuario($userName);
            }
            
            if (!filter_var($emailUsuario, FILTER_VALIDATE_EMAIL)) {
                guardar_mensaje("El email no tiene un formato válido");
                header("location: index.php?comando=cargar_post&idPosts=$id");
                die();
            }else{
                $comentario->setEmailUsuario($emailUsuario);
            }
            
            $comentario->setIdPosts($id);
            
            if (!preg_match("/^[0-9a-zA-Z  ]*$/", $contenido_comentario)) {
                die();
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                $comentario->setComentario($contenido_comentario);
            }
            

            if($comentario->insertar_comentario()){
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                //con error
            }

        }
    }

    public function insertar_respuesta(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $comentario = new Comentarios();

            $comentario_respuesta = $_POST['comentarioR'];
            $userNameR =  $_POST['nombreUsuarioR'];
            $emailUsuarioR = $_POST['emailUsuarioR'];
            $idComentario =  $_POST['idComentario'];
            $id =  $_POST['idPost'];

            if (!preg_match("/^[a-zA-Z  ]*$/", $userNameR)) {
                guardar_mensaje("El usuario solo debe de tener caracteres");
                die();
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                $comentario->setNombreUsuario($userNameR);
            }
            
            if (!filter_var($emailUsuarioR, FILTER_VALIDATE_EMAIL)) {
                guardar_mensaje("El email no tiene un formato válido");
                header("location: index.php?comando=cargar_post&idPosts=$id");
                die();
            }else{
                $comentario->setEmailUsuario($emailUsuarioR);
            }
            
            $comentario->setIdComentario(intval($idComentario));
            
            if (!preg_match("/^[0-9a-zA-Z  ]*$/", $comentario_respuesta)) {
                die();
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                $comentario->setComentario($comentario_respuesta);
            }
            

            if($comentario->insertar_respuesta()){
                header("location: index.php?comando=cargar_post&idPosts=$id");
            }else{
                //con error
            }

        }
    }
}