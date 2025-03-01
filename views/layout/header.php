<?php
require_once "./clases/modelos/Secciones.php";
require_once "./clases/modelos/Usuario.php";
require_once "./clases/servicios/Funciones.php";
$seccionVisible = Secciones::seccionesVisibles();
$seccionActual = Funciones::seccionActual();

?>
<header>
    <a href="?sec=inicio">
        <picture class="logo">
            <img src="./public/imagenes/logoWhite.png" alt="">
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
            <a href="?sec=user" class="icono_login">
                <i class="fa-solid fa-user"></i>
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
        window.addEventListener('resize', () => {
            const screenWidth = window.innerWidth;
        const header = document.querySelector('header');
        if (screenWidth < 400) {
            header.classList.add('menu');
        } else {
            header.classList.remove('menu');
        }
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
        width: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--grey--60);
        padding: 4px;
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
    @media( width < 760px){
        header{
            height: auto;
            flex-wrap: wrap;
            gap: 24px;
        }
        header>a{
            display: flex;
            justify-content: center;
            width: 45%;
            max-width: 50%;
        }
        header>div{
            display: flex;
            justify-content: center;
            width: 45%;
            max-width: auto;
        }
        header nav{
            width: 100%;
            justify-content: space-around;
            flex-wrap: wrap ;
            margin: 0;
            order: 2;
        }
    }
    @media( width < 400px){
        header.menu{
            height: 64px;
            width: 64px;
            position: fixed;
            top: 4px;
            right: 4px;
            background-color: var(--dark--100);
            overflow: hidden;
        }
        header.menu.abierto{
            width: calc(100% - 64px);
            max-width: 100vw;
            height: calc(100% - 64px);
            flex-direction: column;
            align-items: center;
            gap: 0;
        }
        header>a{
            width: 100%;
            max-width: auto;
            margin-bottom: 24px;
        }
        header>div{
            margin-top: 12px;
            justify-content: start;
            width: 100%;
            order: 2;
        }
        header nav{
            flex-direction: column;
            order: 1;
        }
    }
</style>