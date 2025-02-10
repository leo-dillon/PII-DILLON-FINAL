<?php
require_once "./clases/Secciones.php";
require_once "./clases/Funciones.php";
$seccionVisible = Secciones::seccionesVisibles();
$seccionActual = Funciones::seccionActual();
?>
<header>
    <a href="?sec=inicio">
        <picture class="logo">
            <img src="./imagenes/logoWhite.png" alt="">
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
        <a href="?sec=iniciarSesion" class="login">
            Iniciar Sesión
        </a>
        <a href="?sec=registrarte" class="logout">
            Registrate
        </a>
    </div>
</header>

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

    header div {
        display: flex;
        flex-direction: row;
        gap: 24px;
    }

    header div a {
        padding: 4px 8px;
        border-radius: 12px;
        border: 2px solid var(--dark-100);
        font-size: var(--font--2);
        text-wrap: nowrap;
        cursor: pointer;
    }

    header div a.login {
        background-color: var(--text--green--dark);
    }

    header div a.logout {
        background-color: var(--text--red--dark);
    }

    header a:active {
        transform: translateY(2px);
    }
</style>