<?php ob_start(); ?>

    <div class="home__contenedor__elPost">
        
        <div class="home__contenedor__elPost__post"> 
            <h1 name="<?= $thePost[0]['tituloPost'];?>"><?= $thePost[0]['tituloPost'];?></h1>

            <?php if(!empty($tags)): ?>
                <div class="capaEtiquetas">
                    <?php foreach($tags as $etiqueta): ?>
                        <p class="etiquetas"><?= $etiqueta['etiqueta']; ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>

            <div class="contenido1">
                <?php 
                    $aperturaEnlace = str_replace("[ruta]","<a href='",$content[0]['parte1']);
                    $textoEnlace = str_replace("[click]","' target='_blank'>",$aperturaEnlace);
                    $cierreTEnlace = str_replace("[/click]"," ",$textoEnlace);
                    $cierreEnlace = str_replace("[/ruta]","</a>",$cierreTEnlace);
                    $aperturaNegrita = str_replace("[sNeg]","<span class='negrita'>",$cierreEnlace);
                    $cierreNegrita = str_replace("[/sNeg]","</span>",$aperturaNegrita);
                    $saltoLinea = str_replace("[salto]","<br><br>",$cierreNegrita);
                ?>
                <p><?= $saltoLinea;?> </p>
            </div>

            <div class="imagenPrincipal">
                <img src="<?= RUTA?>web/images/<?= $thePost[0]['nombreImagen']; ?>" alt="">
            </div>

            <div class="contenido2">
                <?php 
                    $aperturaEnlace = str_replace("[ruta]","<a href='",$content[0]['parte2']);
                    $textoEnlace = str_replace("[click]","' target='_blank'>",$aperturaEnlace);
                    $cierreTEnlace = str_replace("[/click]"," ",$textoEnlace);
                    $cierreEnlace = str_replace("[/ruta]","</a>",$cierreTEnlace);
                    $aperturaNegrita = str_replace("[sNeg]","<span class='negrita'>",$cierreEnlace);
                    $cierreNegrita = str_replace("[/sNeg]","</span>",$aperturaNegrita);
                    $saltoLinea = str_replace("[salto]","<br><br>",$cierreNegrita);
                ?>
                <p><?= $saltoLinea;?> </p>
            </div>

            <div class="imagenesSecundarias">
                <?php if($image != ""): ?>
                    <?php if(count($image) === 5 || count($image) === 4): ?>
                        <?php 
                            $i = 0;
                            foreach( $image as $imagenes): ?>
                            <div class="imageS<?= $i ?>">
                                <img src="<?= RUTA?>web/images/<?= $imagenes['nombreImagen']; ?>">
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    <?php elseif(count($image) === 3): ?>
                        <?php 
                            $i = 2;
                            foreach( $image as $imagenes): ?>
                            <div class="imageS<?= $i ?>">
                                <img src="<?= RUTA?>web/images/<?= $imagenes['nombreImagen']; ?>">
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endif ?>
            </div>

        </div>
        
        <div class="home__contenedor__elPost__comentariosUsuario">
            <?php if($todosComents == ""): ?>
                <p class="cantidadComentarios">NINGÚN COMENTARIO EN "<?= $thePost[0]['tituloPost']; ?>" </p>
            <?php else: ?>
                <p class="cantidadComentarios"><?= count($todosComents); ?> RESPUESTAS EN "<?= $thePost[0]['tituloPost']; ?>" </p>

                <div class="home__contenedor__elPost__comentariosUsuario__userComentario">
                <?php foreach($todosComents as $comentarios): ?>
                    <div class="estructura_comentario">
                        <div class="nameAndDate">
                            <div class="datos">
                                <div class="nombreComent"><?= $comentarios['nombre_usuario']; ?></div>
                                <div class="fechaComent"><?= $comentarios['fecha_comentario']; ?></div>
                            </div>
                        
                            
                        </div>
                        <p><?= $comentarios['comentario']; ?> </p>
                    </div>

                <?php endforeach ?>

            <?php endif ?>

        </div>
        </div>
        <?php if(!Sesiones::existe_variable_sesion()):?>
            <div class="home__contenedor__elPost__comentarios" >
                
                <form action="index.php?comando=insertar_comentario" method="post" class="form_comentario">
                    <textarea name="comentario" class="comentario" placeholder=" Introduce aquí tu comentario." required maxlength="500"></textarea>
                    <div class="camposUsuario">
                        <div class="camposUsuario__nombre">
                            <input type="text" name="nombreUsuario" class="nombreUsuario" placeholder="Introduce tú Nombre" required>
                        </div>
                        <div class="camposUsuario__email">
                            <input type="email" name="emailUsuario" id="emailUsuario" placeHolder="example@gmail.com" required>
                        </div>
                    </div>
                    <input style="display: none;" name="idPost" value="<?= $id; ?>" type="text">
                    <button class="enviarComentario" type="submit" name="publicar">PUBLICAR</button>
                </form>
            </div>
        <?php endif ?>
    </div>

<?php
    $contenido = ob_get_clean();
    require '../app/vistas/plantilla.php';
?>