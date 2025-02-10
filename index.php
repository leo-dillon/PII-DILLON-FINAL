<?php 
    require_once "./clases/Funciones.php";
    require_once "./clases/Secciones.php";
    require_once "./clases/Conexion.php";
    require_once "./clases/Productos.php";
    $seccionActual = Funciones::seccionActual();
    $seccionValidas = Secciones::seccionesValidas();
    $seccionFinal = "";
    if(!in_array($seccionActual, $seccionValidas)){
        $seccionFinal = "404"; 
    }else{
        $seccionFinal = $seccionActual;
    }
        
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu tienda de Perfumes Online</title>
    <link rel="stylesheet" href="./styles/colors.css">
    <link rel="stylesheet" href="./styles/general.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;0,400;0,600;0,800;1,200;1,400;1,600;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once "./seciones/header.php";?>  
    <?php require_once "./paginas/$seccionFinal.php";?> 
    <?php require_once "./seciones/footer.php";?>  
    
    <picture class="contenedor_smoke">
        <img class="smoke" src="./imagenes/smoke.png" alt="">
    </picture>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18v44h-352z" />
        </defs>
        <g class="parallax">
            <use href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.05)" />
            <use href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.1)" />
            <use href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.1)" />
            <use href="#gentle-wave" x="48" y="7" fill="rgba(255,255,255,0.1)" />
        </g>
    </svg>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        font-family: "Kanit";
        text-decoration: none;
        color: var(--text--light);
    }
    body{
        min-height: 100vh;
        background-color: var(--dark--100);
        display: flex;
        flex-direction: column;
    }
    main{
        flex-grow: 1;
        background-color: var(--grey--20);
    }

    .waves {
        position: fixed;
        width: 100vw;
        height: 15vh;
        bottom: 20%;
        right: 50%;
        rotate: 90deg;
    }

    .parallax > use {
        animation: move-forever 10s cubic-bezier(.55,.5,.45,.5) infinite;
    }

    @keyframes move-forever {
        0% {
        transform: translate3d(-90px, 0, 0);
        }
        100% {
        transform: translate3d(85px, 0, 0);
        }
    }
    
</style>
