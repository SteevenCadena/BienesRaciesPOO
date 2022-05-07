<?php 
     //Incluye un template
     require '../includes/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }

    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();
    //Escribir el Query

    $query = "SELECT * FROM propiedades";

    //Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);
    
    // echo '<pre>';
    // var_dump($_GET);
    // echo '</pre>';
    //Muestra mensaje condicional
    $resultado = $_GET['resultado']?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id) {
            //eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id};";
            $resultado = mysqli_query($db, $query);
            $propiedad =  mysqli_fetch_assoc($resultado);

            unlink('../imaganes/' . $propiedad['imagen']);
            // echo $query;
            
            //Elimina la propuedad
            $query = "DELETE FROM propiedades WHERE id = ${id};";

            $resultado = mysqli_query($db, $query);
            if($resultado){
                header('Location: /admin?resultado=3');
            }
        }else{
            header('Location: /admin');
        }
    }

   
    incluirTemplate('header');
    ?>


<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>
    <!-- var_dump($resultado); -->
        <?php if( intval( $resultado ) === 1 ):?>
            <p class="alerta exito">Anuncio Creado correctamente</p>
            <?php elseif( intval( $resultado ) === 2 ): ?>
                <p class="alerta exito">Anuncio Actualizado correctamente</p>
            <?php elseif( intval( $resultado ) === 3 ): ?>
                <p class="alerta exito">Anuncio Eliminado correctamente</p>
        <?php endif ?>    
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imágen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!--Mostrar los resultados-->
                <?php while($propiedad = mysqli_fetch_assoc( $resultadoConsulta )): ?>
                <tr class="tabla-admin">
                    <td><?php echo $propiedad['id'];?></td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td><img src="/imaganes/<?php echo $propiedad['imagen'] ?>" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form action="" class="inline" method="POST">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-inline" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-inline">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile ?>

            </tbody>

        </table>
    </main>

<?php 

//cerrar la conexion

incluirTemplate('footer'); 

?>