<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <p class="infromacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img  loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis soluta temporibus quaerat impedit repellat eos fuga odio nisi perspiciatis itaque, obcaecati enim, at reprehenderit tempore quis alias perferendis quia eligendi, voluptates dolores. Mollitia ut fuga, et quam nobis laborum hic quaerat in inventore iure explicabo, deserunt laudantium magnam ipsum consequatur.</p>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum doloremque sapiente libero suscipit non! Ut consectetur quaerat ratione rerum officiis?</p>
        </div>

    </main>

<?php incluirTemplate('footer') ?>