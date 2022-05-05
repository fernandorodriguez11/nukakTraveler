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
            <form class="crear-post" action="index.php?comando=edit_content" method="post" enctype="multipart/form-data">
                <textarea name="parte1" value="<?= $content[0]['parte1'];?>"></textarea><br>
                <input type="submit" value="Guardar" id="aa" class="eContent" name="eContent1">
            </form>
            <div class="contenedorContenido">
                <div id="contenido1" class="contenido1" contenteditable="true">
                    <?= $content[0]['parte1'];?>
                </div>
                <div id="contentBoton" class="contentBoton">
                    <button type="button" id="eContent1" class="eContent" name="">Guardar</button>
                </div>
            </div>
            <div class="mensaje">
                <span id="mensaje"></span>
            </div>
            <div class="capaEstilos" style="margin-bottom: 5%">
                <span id="eNegritaC1">Negrita</span>
                <span id="eSaltoLinea1">Salto Linea</span>
                <span id="eEnlace1">Enlace</span>
            </div>

            <input type="hidden" id="idOculto" value="<?= $_GET['idPosts']?>">

            <div class="imagenPrincipal">
                <img src="<?= RUTA?>web/images/<?= $thePost[0]['nombreImagen']; ?>" alt="">
            </div>

            <div class="contenedorContenido">
                <div id="contenido2" class="contenido2" contenteditable="true">
                <?= $content[0]['parte2'];?>
                </div>
                <div id="contentBoton2" class="contentBoton">
                    <button type="button" id="eContent2" class="eContent" name="eContent2">Guardar</button>
                </div>
            </div>
            <div class="mensaje1">
                <span id="mensaje1"></span>
            </div>
            <div class="capaEstilos" style="margin-bottom: 5%">
                <span id="eNegritaC2">Negrita</span>
                <span id="eSaltoLinea2">Salto Linea</span>
                <span id="eEnlace2">Enlace</span>
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
        
    </div>

<?php
    $contenido = ob_get_clean();
    require '../app/vistas/plantilla.php';
?>