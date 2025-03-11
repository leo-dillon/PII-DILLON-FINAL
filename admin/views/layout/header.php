<?php
require_once "../admin/clases/SeccionesAdmin.php";
require_once "../clases/modelos/Usuario.php";
require_once "../clases/servicios/Funciones.php";
$seccionVisible = SeccionesAdmin::seccionesVisibles();
$seccionActual = Funciones::seccionActual();

?>
<header>
    <a href="?sec=inicioAdmin" class="logo">
        <picture class="logo_img">
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
    let logo = document.querySelector('.logo')
    const header = document.querySelector('header');    
    logo.addEventListener('click', (event) => {
        event.preventDefault()
        const screenWidth = window.innerWidth;
        console.log(screenWidth )
        if(screenWidth < 400 ){
            header.classList.toggle('abierto')
        }else{
            location.href = "../"
        }

    })
    document.addEventListener('DOMContentLoaded', () => {
        const screenWidth = window.innerWidth;
        if (screenWidth < 400) {
            header.classList.add('menu');
        }
        console.log(screenWidth)
    })
    window.addEventListener('resize', () => {
        const screenWidth = window.innerWidth;
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

    header a picture.logo_img {
        display: block;
        width: 100%;
        max-width: 80px;
        border-radius: 50%;
        cursor: pointer;
        transition: transform .1s ease-out;
    }

    header a picture.logo_img:active {
        transform: rotate(10deg);
    }

    header a picture.logo_img img {
        width: 80%;
        padding: 10%;
        transition: background-color .3s ease-out, scale .3s ease-out;
    }

    header a picture.logo_img img:hover {
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
        background-color: var(--grey--60);
        padding: 4px 8px;
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
    header div a.icono_login span{
        display: none;
    }
    header a:active {
        transform: translateY(2px);
    }
    @media( width < 900px){
        header{
            height: auto;
            flex-wrap: wrap;
            gap: 24px;
            padding: 12px;
        }
        header>a{
            display: flex;
            justify-content: center;
            width: 45%;
            max-width: 50%;
            order: 0;
        }
        header>div{
            display: flex;
            justify-content: center;
            width: 45%;
            max-width: auto;
            order: 1;
        }
        header nav{
            width: 100%;
            justify-content: center;
            flex-wrap: wrap ;
            margin: 0 auto;
            order: 3;
        }
        header nav a{
            font-size: var(--font--1);
        }
    }
    @media( width < 500px){
        header.menu{
            position: fixed;
            top: 0px;
            right: 0px;
            height: 64px;
            width: 100%;
            justify-content: center;
            align-items: center;
            padding: 2px;
            background-color: var(--dark--100);
            border-bottom: 1px solid var(--white--50);
            overflow: hidden;
            transition: width .2s ease-out, height .2s ease-out, border-radius .3s ease-out;
        }
        header.menu>a{
            width: 80%;
            max-width: 100%;
            align-items: center;
            justify-content: center;
            border: 0;
        }
        header.menu>a picture{
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: end;
        }
        header.menu>a picture img{
            width: 100%;
            max-width: 40px;
        }
        header.menu.abierto{
            width: calc(100% - 64px);
            max-width: 100vw;
            height: calc(100% - 64px);
            flex-direction: column;
            align-items: center;
            justify-content: start;
            padding: 32px;
            top: 0;
            right: 0;
            gap: 0;
            border: 0;
            border-radius: 0;
        }
        header.menu.abierto>a{
            width: 100%;
            max-width: auto;
            margin-bottom: 24px;
        }
        header.menu>div,
        header.menu nav{
            display: none;
        }
        header.menu.abierto>div{
            display: flex;
            margin-top: 12px;
            justify-content: start;
            width: 100%;
            order: 2;
            animation: aparecer-izquierda .6s ease-out both;
        }
        header.menu.abierto nav{
            display: flex;
            flex-direction: column;
            order: 1;
            animation: aparecer-izquierda .4s ease-out both;
        }
        header div a,
        header nav a{
            width: 100%;
            padding: 0;
            border-radius: 0;
            border-bottom: 1px solid var(--white--50);
        }
        header div a.icono_login{
            width: 100%;
            justify-content: center;
        }
        header div a.icono_login span{
            display: inline-block;
            margin-right: 12px;
        }
    }
</style>