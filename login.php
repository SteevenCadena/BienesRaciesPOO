<?php 
    require 'includes/app.php';
    $db = conectarDB();
    //Autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
        $email = mysqli_real_escape_string( $db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        // var_dump($email);
        
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        if(!$email) {
            $errores[] = "No se ha completado el campo email o no es valido";
        }
        if(!$password) {
            $errores[] = "No se ha completado el campo contraseña o no es valido";
        }

        if( empty($errores) ) {
            //revisar si el usuario existe

            $query = "SELECT * FROM usuarios WHERE email = '${email}';";
            $resultado = mysqli_query($db, $query);
            
            if( $resultado->num_rows ) {
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                
                //verificar si el password es correco o no

                $auth = password_verify($password, $usuario['password']);
                if( $auth ) {
                    //El usuario está autenticado
                    session_start();

                    //lenar el arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    

                    header('Location: /admin');
                } else {
                    $errores[] = 'Contraseña incorrecta';
                }
                
            } else {
                $errores[] = 'El usuario no existe';
            }

        }


    }



  
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Iniciar sesión</h1>
        <?php  
            foreach($errores as $error):?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach ?>
        <form class="formulario" method="POST">
        <fieldset>
                <legend>Email y Contraseña</legend>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email">
                
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Tu contraseña">
                


            </fieldset>
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>