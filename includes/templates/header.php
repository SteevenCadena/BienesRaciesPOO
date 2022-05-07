<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio':''; ?>">
        <div class=" contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logotiopo de bienes raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Menu Responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Modo Dark">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncio</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/cerrar-session.php">Cerrar Sesión</a>
                        <?php endif?>
                    </nav>
                </div>

            </div><!--Cierre de la barra-->
            <?php
                echo $textoIndex ? '<h1>Venta de Casa y Departamentos Exclusivos de Lujo</h1>' : '';
            ?>
            
        </div>
    </header>