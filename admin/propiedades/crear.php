<?php 
    require '../../includes/app.php';

    use App\Propiedad;

    // debuguear($propiedad);
    
    estaAutenticado();
    //base de datos

    $db = conectarDB();

    //Consultar para obtener los vendedores

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores

    $errores   = [];

    $titulo      = '';
    $precio      = '';
    // $imagen      = $_POST['imagen'];
    $descripcion = '';

    $habitaciones    = '';
    $wc              = '';
    $estacionamiento = '';
    
    $vendedorId = '';

    //Ejecutar el codigo despues de que el usuaio envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $propiedad = new Propiedad( $_POST );
        $errores = $propiedad->validar();

        if( empty($errores) ){

            $propiedad->guardar();


            //Asignar files hacia una variable
            $imagen = $_FILES['imagen'];
            // var_dump($imagen['name']);

            //Subida de archivos

            //Crear ña carpeta
            $carpetaimagenes = '../../imaganes';

            if(!is_dir($carpetaimagenes)){
                mkdir($carpetaimagenes);
            }
            //generar nombre únicp
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';
            // var_dump($nombreImagen);
            //subir ña imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaimagenes .'/'. $nombreImagen);
            
            

           
            // echo $query;
            $resultado = mysqli_query($db,$query);
    
            if($resultado){
                // echo 'Insertado Correctamente';
                //redireccional al usuario
                // echo ($carpetaimagenes . $nombreImagen);
                header('Location: /admin?resultado=1');
            }
        }
    }

    // require '../../includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php
            foreach($errores as $error):?>
              <div class="alerta error">
                  <?php  echo $error;?>
              </div>
        <?php endforeach?>
        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo;?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio propiedad" value="<?php echo $precio;?>">

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion;?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" min="1" max="9" value="<?php echo $habitaciones;?>">

                <label for="wc">Banios</label>
                <input type="number" name="wc" id="wc" min="1" max="9" value="<?php echo $wc;?>">

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" name="estacionamiento" id="estacionamiento" min="1" max="9" value="<?php echo $estacionamiento;?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedorId">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected': '';  ?> value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido'];?></option>
                    <?php endwhile; ?>                                  
                </select>

            </fieldset>

            <input type="submit" name="" id="" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>