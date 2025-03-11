<?php 
    require_once './clases/modelos/Marcas.php';
    

    $marcas = Marcas::traerMarcas();    
    $productoMarca;
    $marcaUrl = Funciones::traerDatoUrl('marca');

?>

<main>
    <section class="bienvenido">
        <div>
            <div class="fondo">
                <picture>
                    <img src="./public/imagenes/iconos/perfume.png" alt="">
                </picture>
            </div>
            <h1>
                Fragranc<span>e.</span>
            </h1>
            <p>
                Las mejores fragancias al mejor precio.
            </p>
            <a class="hover_2" href="?sec=tienda">
                Mira nuestro catalogo
            </a>
        </div>
        <picture class="galeria">
            <img src="./public/imagenes/model/img_1.jpg" alt="">
        </picture>
    </section>
    <section class="categorias" id="categorias">
        <h2>Encuentra tus productos favoritos.</h2>
        <div class="explora">
            <ul>
                <?php
                    foreach($marcas as $value){
                ?>
                <li>
                    <a id="marcas" href="?sec=inicio&marca=<?=$value?>#categorias" class="click_1 hover_1 <?=($marcaUrl == $value)? 'click_1_seleccionado': ''?>">
                        <?= $value ?>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <div class="productoMarca">
                <div class="noTarjetas">
                    <h3>Mira los productos destacados de cada Marca.</h3>
                    <picture class="seg_3">
                        <img src="./public/imagenes/iconos/buscar.png" alt="icono de busqueda">
                    </picture>
                </div>
            </div>
            <a class="link_tienda hover_1 link" href="?sec=tienda">Ver más productos</a>
        </div>
    </section>
</main>


<script type="module">
    import { getProductosMarca } from "./public/js/producto/getProductosMarca.js"
    let buscadoresMarcas = document.querySelectorAll('#marcas')
    buscadoresMarcas.forEach(ancord => {
        ancord.addEventListener('click', (e) => {
            e.preventDefault()
            let marcaSeleccionada = e.currentTarget.outerText
            getProductosMarca(marcaSeleccionada, ".productoMarca")
        })
    })
</script>

<style scoped>
    main {
        padding: 24px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    section{
        width: 100%;
        max-width: 1200px;
        padding: 120px 24px 60px;
    }
    section.bienvenido {
        border-radius: 0 0 12px 12px ;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 32px;
        border-bottom: 2px solid var(--yellow--100);
    }

    section.bienvenido div {
        max-width: 600px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        gap: 42px;
    }

    section.bienvenido div.fondo {
        position: absolute;
        top: -64px;
        left: -64px;
    }

    section.bienvenido div.fondo picture {
        width: 64px;
    }

    section.bienvenido div.fondo picture img {
        width: 100%;
    }

    section.bienvenido div h1 {
        font-size: var(--font--title);
        letter-spacing: 6px;
        text-shadow: -8px 8px var(--white--20);
    }

    section.bienvenido div p {
        width: max-content;
        align-self: center;
        font-size: var(--font--4);
        opacity: .7;
    }

    section.bienvenido div a {
        align-self: end;
        width: 50%;
        padding: 6px 12px;
        text-align: center;
        background-color: var(--grey--40);
    }

    section.bienvenido picture.galeria {
        display: flex;
        width: 100%;
        max-width: 450px;
    }

    section.bienvenido picture.galeria img {
        width: 100%;
        border-radius: 12px;
        transition: transform .2s ease-out, box-shadow .3s ease-out;
    }

    section.bienvenido picture.galeria:hover img {
        transform: translateX(-6px) translateY(-6px);
        box-shadow: 32px 32px 12px 0 var(--white--20);
    }

    section.categorias {
        padding: 12px;
        margin: 120px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    section.categorias h2{
        font-size: var(--font--4);
        font-weight: 500;
    }
    section.categorias div.explora{
        position: relative;
        display: flex;
        background-color: var(--dark--light);
        border-bottom-right-radius: 12px;
        border-top-right-radius: 12px;
        border: 2px solid var(--grey--50);
        transition: border .3s ease-out;
    }
    section.categorias div.explora:hover{
        border: 2px solid var(--grey--100);
    }
    section.categorias div.explora ul{
        width: 100%;
        max-width: 250px;
        display: flex;
        flex-direction: column;
        background-color: var(--grey--30);
    }
    section.categorias div.explora ul li{
        list-style: none;
    }
    section.categorias div.explora ul li a{
        display: inline-block;
        width: calc(100% - 24px);
        padding: 4px 12px;
        font-size: var(--font--2);
        cursor: pointer;
    }
    section.categorias div.explora ul li a.activo{
        background-color: var(--grey--50);
    }
    section.categorias div.explora>div{
        width: 100%;
        padding: 32px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        gap: 12px;
        position: relative;
    }
    section.categorias div.explora div div.noTarjetas{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 32px;
    }
    section.categorias div.explora div.productoMarca div.noTarjetas>h3,
        section.categorias div.explora div.productoMarca>h3{
                font-size: var(--font--3);
                text-align: center;
                font-weight: 400;
        }
    section.categorias div.explora div div.noTarjetas picture{
        width: 64px;
    }
    section.categorias div.explora div div.noTarjetas picture img{
        width: 100%;
    }
    section.categorias div.explora a.link{
        height: 32px;
        line-height: 32px;
        position: absolute;
        top: 100%;
        right: 10px;
        padding: 4px 12px;
        background-color: var(--grey--40);
    }
    @media (width < 1300px){
        section.bienvenido{
            width: 90%;
            margin: 0 5%;
        }
        section.bienvenido picture.galeria  {
            max-width: 300px;
        }
    }
    @media (width < 1000px){
        section.bienvenido{
            padding: 42px 24px;
        }
        section.bienvenido div{
            align-items: center;
        }
        section.bienvenido div div.fondo{
            top: 8%;
            left: 5%;
        }
        section.bienvenido div.fondo picture{
            width: 32px;
        }
        section.bienvenido div h1{
            font-size: var(--font--6);
        }
        section.bienvenido div p{
            font-size: var(--font--3);
        }
        section.bienvenido div a{
            align-self: center;
        }
        section.categorias h2{
            text-align: center;
        }
        section.categorias div.explora ul{
            width: 240px;
        }
    }
    @media (width < 800px){
        section.bienvenido{
            flex-direction: column-reverse;
            padding: 12px 12px 42px 12px;
            border-radius: 0
        }
        section.bienvenido picture.galeria{
            max-width: 200px;
        }
        section.bienvenido picture.galeria img {
            transform: translateX(0px) translateY(-6px);
            box-shadow: 0px 0px 22px 22px var(--white--20);
        }
        section.bienvenido div{
            gap: 12px
        }
        section.bienvenido div div.fondo{
            display: none;
        }
        section.categorias div.explora div.productoMarca div.noTarjetas>h3,
        section.categorias div.explora div.productoMarca>h3{
                font-size: var(--font--2);
                text-align: center;
                font-weight: 400;
        }
        section.categorias div.explora div.productoMarca{
            flex-direction: column;
            padding: 12px;
        }
    }
    @media (width < 500px){
        section.bienvenido div h1{
            font-size: var(--font--4);
        }
        section.bienvenido div p{
            width: auto;
            font-size: var(--font--2);
            text-align: center;
        }
        section.bienvenido div a{
            width: 60%;
            align-self: center;
        }
        section.categorias h2{
            font-size: var(--font--3);
        }
        section.categorias div.explora ul li a#marcas{
            font-size: var(--font--1);
        }
    }
    @media (width < 400px){
        section.bienvenido{
            flex-direction: column-reverse;
            padding: 64px 12px 42px 12px;
            border-radius: 0
        }
    }
</style>