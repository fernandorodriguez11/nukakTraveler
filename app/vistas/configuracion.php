<?php
    ob_start();
?>

    <div style="width: 100%; margin-top: 6%">
        <?php foreach($the_posts as $post): ?>
             
            
            <?php if(intval($post['favorito']) === 1): ?>
                <div style="width: 100%; display: flex; flex-wrap: wrap; border-bottom: 2px solid #D82C06; margin: 2% 0; padding-bottom: 1%;">
                    <p style="width: 33%"><?= $post['tituloPost']; ?></p>
                    <p style="width: 33%"><?= $post['fechaPublicacion']; ?></p>
                    <p style="width: 16.5%"> <a style="padding: 3%; background-color: #D82C06; color: black; border-radius: 8px" href="index.php?comando=quitar_favorito/<?= $post['idPosts'] ?>">NO FAVORITO</a></p>
                    <p style="width: 16.5%"> <a style="padding: 3%; background-color: skyblue; color: black; border-radius: 8px" href="index.php?comando=edit_post&idPosts=<?= $post['idPosts'] ?>">Editar</a></p>
                </div>
            <?php elseif(intval($post['favorito']) === 0): ?>
                <div style="width: 100%; display: flex; flex-wrap: wrap; border-bottom: 2px solid #3DCD76; margin: 2% 0; padding-bottom: 1%;">
                    <p style="width: 33%"><?= $post['tituloPost']; ?></p>
                    <p style="width: 33%"><?= $post['fechaPublicacion']; ?></p>
                    <p style="width: 16.5%"> <a style="padding: 3%; background-color: #3DCD76; color: black; border-radius: 8px" href="index.php?comando=poner_favorito/<?= $post['idPosts'] ?>">FAVORITO</a></p>
                    <p style="width: 16.5%"> <a style="padding: 3%; background-color: skyblue; color: black; border-radius: 8px" href="index.php?comando=edit_post&idPosts=<?= $post['idPosts'] ?>">Editar</a></p>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>

<?php
    $contenido = ob_get_clean(); 
    require '../app/vistas/plantilla.php';
?>