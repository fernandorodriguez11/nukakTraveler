<?php
ob_start();
?>
<div class="home__contenedor__aviso">
    <h1>Aviso Legal</h1>
    
    <p>
        <span>En cumplimiento de la Ley 34/2002, de 11 de Julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico le comunicamos la siguiente información:
Titular de este sitio: </span>
    </p>

    <p>
        <span class="negrita"> <span class="negrita">NukakTraveler</span> </span>
    </p>
    <p>
        <span>C/ FRANCISCO DE QUEVEDO, Nº 21, HERENCIA(13640) CIUDAD REAL </span>
    </p>

    <p><span>
        TLF: 650 76 79 58
    </span></p>

    <p><span>
        e-mail: <a class="email" href="mailto:nukaktraveler@gmail.com"> nukaktraveler@gmail.com</a>
    </span></p>

    <p><span>
        La utilización del contenido y/o servicios del portal por parte del usuario supone la aceptación expresa de las siguientes condiciones:
    </span></p>

    <p>
        <span class="negrita"> Condiciones del uso del portal </span>
    </p>
    
    <p><span>
    <span class="negrita">NukakTraveler</span> se reserva el derecho de efectuar modificaciones en el contenido de este portal sin previo aviso, así como de su configuración y presentación. Este portal puede contener enlaces a páginas externas, no siendo <span class="negrita">NukakTraveler</span> responsable del contenido de dichas páginas externas ni de cualquier otro aspecto relacionado con las mismas.
    </span></p>
    
    <p><span>
    Los textos, imágenes, logotipos y resto de contenidos incluidos en este portal son propiedad de <span class="negrita">NukakTraveler</span> Queda prohibida la transmisión, distribución, reproducción o almacenamiento, total o parcial, excepto si se obtiene el previo consentimiento de <span class="negrita">NukakTraveler</span>, y salvo cuando se indique lo contrario.
    </span></p>

    <p><span>
    Para poder instalar o utilizar cualquier software que se encuentre disponible para su descarga desde este portal, deben aceptarse previamente los términos del contrato de licencia, si lo hubiera, que acompañe o se incluya en el software. <span class="negrita">NukakTraveler</span> no se hace responsable de los posibles daños que se pudieran producir por el hecho de utilizar versiones no actualizadas de navegadores, o de las consecuencias que se pudieran derivar del mal funcionamiento del navegador, ya sea por configuración inadecuada, presencia de virus informáticos o cualquier otra causa ajena a <span class="negrita">NukakTraveler.</span>
    </span></p>

    <p><span>
    Asimismo, para acceder a algunos de los servicios que NUKAK TRAVELER ofrece a través del website deberá proporcionar algunos datos de carácter personal. En cumplimiento de lo establecido en el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos le informamos que, mediante la cumplimentación de los presentes formularios, sus datos personales quedarán incorporados y serán tratados en los ficheros de NUKAK TRAVELER con el fin de poderle prestar y ofrecer nuestros servicios así como para informarle de las mejoras del sitio Web. Asimismo, le informamos de la posibilidad de que ejerza los derechos de acceso, rectificación, cancelación y oposición de sus datos de carácter personal, manera gratuita mediante
email a <span class="negrita"><a class="email" href="mailto:nukaktraveler@gmail.com">nukaktraveler@gmail.com</a></span>  

    </span></p>
</div>
<?php
$contenido = ob_get_clean(); 
require '../app/vistas/plantilla.php';
?>