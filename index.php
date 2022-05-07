<?php 
    
    require 'includes/app.php';

    incluirTemplate('header', $inicio = true, $textoIndex = true);


?>

    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, totam velit laudantium facilis obcaecati suscipit ea molestiae quibusdam, error fuga dolore cum deleniti iure explicabo officiis debitis officia porro nostrum?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>El mejor precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, totam velit laudantium facilis obcaecati suscipit ea molestiae quibusdam, error fuga dolore cum deleniti iure explicabo officiis debitis officia porro nostrum?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, totam velit laudantium facilis obcaecati suscipit ea molestiae quibusdam, error fuga dolore cum deleniti iure explicabo officiis debitis officia porro nostrum?</p>
            </div>
        </div>
    </main>


    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>



        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigop a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion-inferior">
        <section class="blog ">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="infromacion-meta">Escrito el: <span>03/03/2022</span> por: <span>Admin</span></p>
                    </a>

                    <p>Consejos para construir una terraza con los mejores materiales y ahorrando dinero</p>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para decorar tu hogar</h4>
                        <p class="infromacion-meta">Escrito el: <span>03/03/2022</span> por: <span>Admin</span></p>
                    </a>

                    <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente froma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Carlos Cadena</p>
            </div>
        </section>
    </div>

<?php incluirTemplate('footer') ?>