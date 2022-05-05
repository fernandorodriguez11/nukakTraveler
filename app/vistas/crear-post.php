<?php
ob_start();
?>
        <h1>Crea Tu Post</h1>
        <form class="crear-post" action="index.php?comando=insertar" method="post" enctype="multipart/form-data">

            <input type="text" class="tituloPost" name="titulo" placeholder="Introduce el titulo del post" required><br>

            <label class="favorito" for="favorito"> Post Favorito?<input type="checkbox" id="favorito" class="check" name="favorito" value="1"></label>

            <label class="imagenPrincipalL" for="imagenPrincipal">Selecciona la imagen principal
                <input type="file" name="imagenPrincipal" id="imagenPrincipal" class="imagenPrincipalI">
            </label><br>
            
            <div class="imagenPrincipal1">
                <img id="theImagen" src="#" alt="">
            </div>

            <label class="imagenesSecundariasL" for="secundaria0">
                <input type="file" name="secundaria0" id="secundaria0" class="imagenPrincipalI">
            </label><br>

            <label class="imagenesSecundariasL" for="secundaria1">
                <input type="file" name="secundaria1" id="secundaria1" class="imagenPrincipalI">
            </label><br>

            <label class="imagenesSecundariasL" for="secundaraia2">
                <input type="file" name="secundaria2" id="secundaria2" class="imagenPrincipalI">
            </label><br>

            <label class="imagenesSecundariasL" for="secundaria3">
                <input type="file" name="secundaria3" id="secundaria3" class="imagenPrincipalI">
            </label><br>

            <label class="imagenesSecundariasL" for="secundaria4">
                <input type="file" name="secundaria4" id="secundaria4" class="imagenPrincipalI">
            </label><br>

            <div class="imagenesSecundarias1">
                <div id="imagen00" class="imageS0">
                    <img src="#" id="imagen0">
                </div>
                <div id="imagen01" class="imageS1">
                    <img src="#" id="imagen1">
                </div>
                <div id="imagen02" class="imageS2">
                    <img src="#" id="imagen2">
                </div>
                <div id="imagen03" class="imageS3">
                    <img src="#" id="imagen3">
                </div>
                <div id="imagen04" class="imageS4">
                    <img src="#" id="imagen4">
                </div>
            </div>

            <div class="capas-content">
                <textarea class="contenido1" id="contenido1" name="contenido1" placeholder="Contenido parte 1"></textarea><br>
                <span id="negritaC1">Negrita</span>
                <span id="saltoLinea1">Salto Linea</span>
                <span id="enlace1">Enlace</span>
            </div>
            <div class="capas-content">
                <textarea class="contenido2" id="contenido2" name="contenido2" placeholder="Contenido parte 2"></textarea><br>
                <span id="negritaC2">Negrita</span>
                <span id="saltoLinea2">Salto Linea</span>
                <span id="enlace2">Enlace</span>
            </div><br>
            <div class="capa-etiquetas">
                <textarea class="etiquetas" id="etiquetas" name="etiquetas" placeholder="etiqueta1,etiqueta2,...."></textarea>
            </div><br>

            <div class="capa-programacion">
                <input type="date" name="fechaProgramada" id="programada" style="width: 15%">
                <input type="time" name="horaProgramada" id="post_programado" style="width: 15%">
            </div>
            
            <div class="botonCrear">
                <button  type="submit" class="boton-crear-post">Crear Post</button>
            </div>
            
        </form>
    
    <?php
//Guarda el contenido del buffer (el código html y php ya ejecutado) en la variable contenido
$contenido = ob_get_clean();
require '../app/vistas/plantilla.php';
?>