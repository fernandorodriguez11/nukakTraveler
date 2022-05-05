<?php
    ob_start(); //Envía la salida a un buffer (memoria) en vez de al usuario
?>
    <div id="home__contenedor__posts" class="home__contenedor__posts">
    
        <?php 
        $i = 0;
        $cantidad = count($posts);
        foreach($posts_limitados as $post):?>
            <div id="imagen<?= $post['idPosts'] ?>" class="imagen<?= $i ?> blanco-gris"
            style="background-image: url('<?= RUTA?>web/images/<?= $post['nombreImagen']; ?>');" name="<?= $post['tituloPost'];?>">
                <?php $titulo = str_replace(" ", "-",$post["tituloPost"]); ?>
                <a href="<?= RUTA?>cargar_post/<?= $titulo?>/<?= $post['idPosts'] ?>">
                    <div class="texto">
                        <p><?= $post['tituloPost']; ?></p>
                    </div>
                </a>
            </div>
            

            <?php 
                if( $i < 8){
                    $i++;
                }else{
                    $i = 0;
                }
            ?>

        <?php endforeach ?>

    </div>
    <?php if($cantidad > 10): ?>
        <div class="home__contenedor__paginado"> 
            <div class="home__contenedor__paginado__anterior">
                <p id="anterior"> Anterior </p>
            </div>
            <div class="home__contenedor__paginado__siguiente">
                <p id="siguiente"> Siguiente </p>
            </div>
        </div>
    <?php endif ?>
    
    
<?php
//Guarda el contenido del buffer (el código html y php ya ejecutado) en la variable contenido
$contenido = ob_get_clean();
require '../app/vistas/plantilla.php';
?>