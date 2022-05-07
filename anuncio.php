<?php 

    $id = $_GET['id'];
    
    require 'includes/app.php';
    // echo $id;
    //Conexion
    $db = conectarDB();
    //Consulta 
    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    //Obtener datos
    $resultado = mysqli_query( $db, $query );
    $propiedad = mysqli_fetch_assoc( $resultado );
   
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <?php ?>
        <h1><?php echo $propiedad['titulo']?></h1>
        
        <img  loading="lazy" src="imaganes/<?php echo $propiedad['imagen']?>" alt="Imagen de la propiedad">
       

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones']?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']?></p>


        </div>

    </main>

<?php incluirTemplate('header'); ?>