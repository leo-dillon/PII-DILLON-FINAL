<?php
require_once "../admin/clases/SeccionesAdmin.php";
require_once "../clases/modelos/Usuario.php";
require_once "../clases/servicios/Funciones.php";
$seccionVisible = SeccionesAdmin::seccionesVisibles();
$seccionActual = Funciones::seccionActual();

?>
<header>
    <a href="?sec=inicioAdmin">
        <picture class="logo">
            <img src="../public/imagenes/logoWhite.png" alt="">
        </picture>
    </a>
    <?php

    ?>
    <nav>
        <?php
        foreach ($seccionVisible as $value) {
            $seccion = $value -> getSeccion();
            $titulo = $value -> gettitulo();
        ?>
            <a
                href="?sec=<?= $seccion ?>"
                class="<?= ($seccionActual == $seccion) ? "onActivate" : "" ?>">
                <?= $titulo ?>
            </a>
        <?php
        }
        ?>
    </nav>
    <div>
        <?php 
            if($usuarioLogeado){
        ?>
            <a href="../?sec=inicio" class="icono_login">
                Cerrar Sessión
            </a>
        <?php
            }else{
        ?>
            <a href="?sec=iniciarSesion" class="login">
                Iniciar Sesión
            </a>
        <?php
            }
        ?>
    </div>
</header>

<script>
    document.querySelector('a.icono_login').addEventListener('click', () => {
        fetch('../actions/usuarios/cerrarSession.php')
    })
</script>


<style scoped>
    header {
        height: 80px;
        padding: 32px;
        display: flex;
        flex-direction: row;
        align-items: center;
        z-index: 10;
    }
    header>a{
        width: 100%;
        max-width: 72px;
    }

    header a picture.logo {
        display: block;
        width: 100%;
        max-width: 80px;
        border-radius: 50%;
        cursor: pointer;
        transition: transform .1s ease-out;
    }

    header a picture.logo:active {
        transform: rotate(10deg);
    }

    header a picture.logo img {
        width: 80%;
        padding: 10%;
        transition: background-color .3s ease-out, scale .3s ease-out;
    }

    header a picture.logo img:hover {
        scale: 1.05;
        background-color: var(--grey--60);
    }

    header nav {
        width: 100%;
        gap: 12px;
        margin-right: 24px;
        display: flex;
        flex-direction: row;
        justify-content: end;
    }

    header nav a {
        padding: 4px 6px;
        font-size: var(--font--2);
        border-radius: 6px 6px 0 0;
        transition: background-color .2s ease-out;
    }

    header nav a:hover {
        background-color: var(--grey--60);
    }

    header>div {
        display: flex;
        flex-direction: row;
        gap: 24px;
    }

    header a.icono_login{
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        background-color: var(--grey--60);
        padding: 4px 12px;
    }
    header a.icono_login i{
        padding: 4px;
        border-radius: 50%;
        transition: transform .8s ease-out;
    }
    header a.icono_login:hover i{
        transform: rotateY(360deg);
    }

    header div a {
        padding: 4px 8px;
        border-radius: 12px;
        border: 2px solid var(--dark-100);
        font-size: var(--font--2);
        text-wrap: nowrap;
        cursor: pointer;
    }

    header a:active {
        transform: translateY(2px);
    }
</style>