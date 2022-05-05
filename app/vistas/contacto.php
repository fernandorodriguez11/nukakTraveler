<?php
ob_start();
?>
<script src="<?= RUTA?>web/js/usuarioInstagram.js" type="text/javascript"></script>
<div class="home__contenedor__contacto">

    <div class="home__contenedor__contacto__cabecera">

        <div class="home__contenedor__contacto__cabecera__contenedor">
            <div class="home__contenedor__contacto__cabecera__contenedor__dosImagenes movil1">
                <div class="imagenCollage1">
                    <div class="img1">
                    </div>
                </div>

                <div class="imagenCollage2">
                    <img src="<?= RUTA?>web/images/collage/Tezza_2020_04_15_150242219.jpg">
                </div>
            </div>

            <div class="home__contenedor__contacto__cabecera__contenedor__dosImagenes">
                <div class="imagenCollage3">
                    <img src="<?= RUTA?>web/images/collage/img1605888619419.jpg">
                </div>

                <div class="imagenCollage8">
                    <img src="<?= RUTA?>web/images/collage/Tezza_2020_05_12_212640680.jpg">
                </div>
            </div>

            <div class="home__contenedor__contacto__cabecera__contenedor__dosImagenes">
                <div class="imagenCollage4">
                    <img src="<?= RUTA?>web/images/collage/img1605888335036.jpg">   
                </div>

                <div class="imagenCollage6">
                    <img src="<?= RUTA?>web/images/collage/img1605888531493.jpg">
                </div>
            </div>

            <div class="home__contenedor__contacto__cabecera__contenedor__dosImagenesR">
                <div class="imagenCollage10">
                    <img src="<?= RUTA?>web/images/collage/Tezza_2020_11_22_130755836.jpg">
                </div>
                
                <div class="imagenCollage11">
                    <img src="<?= RUTA?>web/images/collage/Tezza_2020_11_20_171039321.jpg">
                </div>
            </div>
        </div>

        <div class="home__contenedor__contacto__cabecera__contenedor1">
            <div class="imagenCollage7">
                <img src="<?= RUTA?>web/images/collage/img1605888361800.jpg">
            </div>

            <div class="imagenCollage5">
                <img src="<?= RUTA?>web/images/collage/img1602510517219.jpg">
            </div>

            <div class="imagenCollage9">
                <img src="<?= RUTA?>web/images/collage/Tezza_2020_10_23_191028966.jpg">
            </div>
        </div>
    </div>
    
    <div class="home__contenedor__contacto__sobremi">
        <h1>SOBRE MÍ</h1>
        <div class="sobremi__descripcion">
            <p>¡Hola! Soy Leticia</p>
            <p>Mi alma es viajera y el mar mi segundo hogar. Me apasiona viajar y estar al tanto de las últimas tendencias de destinos, 
                alojamientos y estilos de viajes. Y, es por ello, que profesionalmente soy <span class="negrita">Travel Designer</span>.
            </p>
            <p>Sí, he hecho de mi pasión mi profesión. Mis pilares base para que un viaje sea irrepetible son:</p>
            <ul>
                <li>Diseñar viajes y experiencias únicas personalizadas en función de los gustos de cada viajera/o.</li>
                <li>Innovar constantemente.</li>
                <li>Viajar de una forma respetuosa con el entorno, fauna y flora.</li>
            </ul>
            <p>Convencida de que viajar enriquece a las personas, quiero inspirarte para recorrer el mundo en busca de su esencia 
                y vivencias únicas.</p>
        </div>

        <div class="sobremi__contacto">
            <h1>CONTÁCTAME</h1>
            <div class="contacto__informacion">
                <p>Email: <span class="negrita"><a href="mailto:infotravel@nukaktraveler.com" style="color: #444E52">infotravel@nukaktraveler.com</a></span></p>
            </div>
        </div>
    </div>
    <div class="home__contenedor__contacto__instagram">
        <a href="https://www.instagram.com/leticiia.ro/?hl=es" target="_blank"> 
            <div class="perfil__instagram">
                <div class="imagen__perfil">
                    <div class="foto__instagram">
                    <img src="<?= RUTA?>web/images/instagram.svg">
                    </div>
                </div>
                <div class="informacion__usuario">
                    <div class="nombre__instagram">
                        <span>leticiia.ro</span>
                    </div>
                    <div class="descripcion__instagram">
                        <div class="tresprimeros">
                            <span>Travel Designer</span>
                            <span>Traveller Soul</span>
                            <span>#LuxuryTravel</span>
                        </div>
                        <div class="dosUltimos">
                            <span>#ExperientialTravel</span>
                            <span>#TravelInspiration</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <div  id="instafeed-container" class="ultimos__posts">
        
        </div>
        <a href="https://www.instagram.com/leticiia.ro/?hl=es" target="_blank">
            <div class="footer__instagram">

                <div class="boton_seguir">
                    <div class="icono__insta__footer">
                        <img src="<?= RUTA?>web/images/instagram.png">
                    </div>

                    <div class="texto__insta__footer">
                        <span>Sígueme en Instagram</span>
                    </div>
                    
                </div>
            </div>
        </a>
        
    </div>
    <div class="home__contenedor__contacto__footer">
        <div class="datos" >
            &copy; Leticia Rodríguez | NukakTraveler
        </div>
        <div class="enlaces">
            <a href="index.php?comando=aviso_legal">Aviso Legal</a> · <a href="index.php?comando=politica_privacidad">Política de Privacidad</a> · 
            <a href="index.php?comando=politica_cookies">Política de Cookies</a>
        </div>
    </div>
</div>

<?php
$contenido = ob_get_clean(); 
require '../app/vistas/plantilla.php';
?>