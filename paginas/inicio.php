<?php 
    require_once './clases/Marcas.php';
    

    $marcas = Marcas::traerMarcas();    
    $productoMarca;
    $marcaUrl = Funciones::traerDatoUrl('marca');


    
    if(in_array($marcaUrl, $marcas) && $marcaUrl){
        $productoMarca = Producto::traerProductoMarca($marcaUrl);
    }
    

?>

<main>
    <section class="bienvenido">
        <div>
            <div class="fondo">
                <picture>
                    <img src="./imagenes/iconos/perfume.png" alt="">
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
            <img src="./imagenes/model/img_1.jpg" alt="">
        </picture>
    </section>
    <section class="categorias" id="categorias">
        <h2>Encuentra los productos de tus marcas favoritas</h2>
        <div class="explora">
            <ul>
                <?php
                    foreach($marcas as $value){
                ?>
                <li>
                    <a href="?sec=inicio&marca=<?=$value?>#categorias" class="click_1 hover_1 <?=($marcaUrl == $value)? 'click_1_seleccionado': ''?>">
                        <?= $value ?>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
            <div>
                <?php 
                    if(empty($productoMarca)){
                ?>
                <div class="noTarjetas">
                    <h3>Mira los productos destacados de cada Marca.</h3>
                    <picture class="seg_3">
                        <img src="./imagenes/iconos/buscar.png" alt="icono de busqueda">
                    </picture>
                </div>
                <?php
                    }else{
                        foreach($productoMarca as $value){ 
                ?>
                    <?= Funciones::generarProducto($value) ?>
                <?php }}?>
                <a class="link_tienda hover_1 link" href="?sec=tienda">Ver más productos</a>
            </div>
        </div>
    </section>
</main>

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
    }
    section.categorias div.explora{
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
    section.categorias div.explora h3{
        font-size: var(--font--4);
        border-bottom: 1px solid var(--grey--40);
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
    section.categorias div.explora div div.noTarjetas picture{
        width: 64px;
    }
    section.categorias div.explora div div.noTarjetas picture img{
        width: 100%;
    }
    section.categorias div.explora div a.link{
        height: 32px;
        line-height: 32px;
        position: absolute;
        top: 100%;
        right: 10px;
        padding: 4px 12px;
    }
</style>