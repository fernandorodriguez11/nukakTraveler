<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>NukakTraveler</title>
        <link type="text/css" href="<?= RUTA?>web/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="<?= RUTA?>web/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/showMenu.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/editPost.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/paginado.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/negrita.js"></script>
        <script type="text/javascript" src="<?= RUTA?>web/js/previsualizacionImagenes.js"></script>
        <meta name="description" content="¿Buscas un viaje personalizado y especial? Inspírate a través de nuestras experiencias únicas y exclusivas.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <section id="show__cookies" class="show__cookies" >
            <p>COOKIES</p>
        </section>
        <section id="cookies" class="cookies">
            <div class="cookies__informacion">
                <p>
                    El sitio web www.nukaktraveler.com utiliza cookies propias y de terceros para recopilar información que ayuda a optimizar su 
                    visita a sus páginas web. No se utilizarán las cookies para recoger información de carácter personal. Usted puede permitir su 
                    uso o rechazarlo. Encontrará más información haciendo click en "Leer más".
                </p>
            </div>
            <div class="cookies__confirmacion">
                <div class="cookies__confirmacion__aceptar">
                    <button id="aceptar" type="button"> Sí, acepto las cookies </button>
                </div>
                <div class="cookies__confirmacion__rechazar">
                    <button id="rechazar" type="button"> No, gracias, solo las necesarias</button>
                </div>
                <div class="cookies__confirmacion__leerMas">
                    <a href="index.php?comando=politica_cookies">Leer más</a>
                </div>
            </div>
        </section>
        <div class="home">
            <div class="home__menu">
                <div class="logo">
                    <a href="index.php?comando=inicio"><img src="<?= RUTA?>web/images/nukak-traveLLer.png" alt="logo nukak traveler"></a>
                </div>
                <div class="texto_informativo">
                    <p>
                        ¿Buscas un viaje personalizado y especial? <br>Inspírate a través de nuestras experiencias únicas y exclusivas. 
                    </p>
                </div>
                <div class="nav">
                    <div id="boton_menu" class="nav__boton-menu">
                        MENU <span class="nav__boton-menu__flechita">&darr;</span>
                    </div>
                    <ul id="menu">
                        <li class="descubre"> <a href="index.php?comando=descubre"> Descubre</a></li>
                        <li class="descubre"> <a href="index.php?comando=contacto"> Contacto </a></li>
                        <?php if(Sesiones::existe_variable_sesion()):?>
                            <li class="descubre"> <a href="index.php?comando=crear_post"> Crear Posts</a></li>
                            <li class="descubre"> <a href="index.php?comando=config"> Configuracion</a></li>
                            <li class="descubre"> <a href="index.php?comando=cerrarSesion"> Cerrar Sesión </a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div id="footer" class="footer">
                    <div class="footer__instagram">
                        <a href="https://www.instagram.com/leticiia.ro/?hl=es" target="_blank">
                            <img  class="blanco-gris" src="<?= RUTA?>web/images/instagram.png" alt="logo de instagram">
                        </a>
                    </div>
                    
                </div>
            </div>

            <div class="home__contenedor">
                <?php echo $contenido ?>
            </div>

        </div>

        
    </body>
</html>

