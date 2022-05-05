<?php
ob_start();
?>
<div class="home__contenedor__contenido">
    <div class="home__contenedor__contenido__informacion">
        <h1>DESCUBRE EL MUNDO NUKAK</h1>
        <div class="informacion">
            <div class="informacion__texto">
                <p>La filosofía de Nukak es: <span class="negrita">“La felicidad no es un lugar, sino la manera de conocerlo”</span>, por ello un viaje tiene que contar con una gran variedad de experiencias culturales, inspiradoras, de aventura, gastronomía, etc... para crear recuerdos inolvidables.<br> <br> 
                    A través de este espacio busco compartir vivencias únicas y exclusivas, que os inspiren y despierten en vosotras/os una conexión muy especial con vuestro futuro viaje.
                    <br><br>  ¿Comenzamos a transformar lo cotidiano del día a día en una experiencia?
                    
                </p>
            </div>
        </div>
    </div>
    <?php foreach($posts_destacados as $post): ?>
    <div class="home__contenedor__contenido__postsDestacados">

                <h1><?= $post["tituloPost"]?></h1>
                <?php 
                    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç",
                    "Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e",
                    "i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                    $abre = str_replace("¿", "",$post["tituloPost"]);
                    $cierra = str_replace("?", "",$abre);
                    $texto = str_replace($no_permitidas, $permitidas,$cierra);
                    $titulo = str_replace(" ", "-",$texto); ?>
                <div class="postsDestacados">
                    <div class="postsDestacados__fotoPost">
                    <a href="index.php?comando=cargar_post/<?= $titulo?>/<?= $post['idPosts'] ?>">
                        <img class="blanco-gris" src="<?= RUTA?>web/images/<?= $post['nombreImagen']; ?>">
                    </a>
                    </div>
                </div>
                
    </div>
    <?php endforeach; ?>

</div>
<?php
//Guarda el contenido del buffer (el código html y php ya ejecutado) en la variable contenido
$contenido = ob_get_clean();
require '../app/vistas/plantilla.php';
?>