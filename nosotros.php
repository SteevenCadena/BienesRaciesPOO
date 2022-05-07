<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion seccion-nosotros">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpeg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <section class="contenido-nosotros">
                <h2>25 Años de experiencia</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid architecto explicabo a adipisci dolor sapiente suscipit recusandae voluptatem quisquam provident maxime praesentium blanditiis atque ad obcaecati optio, expedita quod, hic, voluptate impedit velit omnis facilis! Placeat suscipit veritatis veniam doloremque culpa maiores, hic porro quaerat neque, voluptas repellendus ad iste quos, quidem repellat et repudiandae velit ex consequatur voluptatem. Ullam corporis commodi ratione impedit dicta animi facilis exercitationem minus corrupti voluptates. Modi maiores ex praesentium sequi, id at, laborum nemo commodi deleniti aliquam adipisci debitis esse facilis reiciendis quidem beatae quisquam nihil, vero minus ratione atque tenetur ut? Quae, veritatis?</p>
            </section>
        </div>
    </main>


    <div class="contenedor seccion">
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
    </div>

<?php incluirTemplate('footer'); ?>