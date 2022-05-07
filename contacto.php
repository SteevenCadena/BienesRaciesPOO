<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>

        <h2 class="h2form">Llene el formulario de contacto</h2>

        <form class="formulario" action=""> 
            <fieldset>
                <legend>Información Personal</legend>
                
                <label for="nombre">Nombre</label>
                <input type="text" name="text" id="nombre" placeholder="Tu nombre">
                
                <label for="email">Email</label>
                <input type="email" name="text" id="email" placeholder="Tu email">
                
                <label for="telefono">Teléfono</label>
                <input type="tel" name="text" id="telefono" placeholder="Tu teléfono">
                
                <label for="mensaje">Mensaje</label>
                <textarea name="" id="mensaje" cols="30" rows="10"></textarea>

            </fieldset>

            <fieldset>
                <legend>Infoirmación sobre la propiedad</legend>
                <label for="opciones">Vende o Compra</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="text" id="presupuesto" placeholder="Tu precio o Presupuesto">

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Cómo desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>

                <p>Si eligío teléfono, elija la fecha y hora para ser contactado</p>
                <label for="fecha">Fecha</label>
                <input type="date" name="text" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" name="text" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="ENVIAR" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer') ?>