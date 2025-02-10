<?php
    require_once './clases/Funciones.php';
    require_once './clases/Marcas.php';
    require_once './clases/Concentraciones.php';
    require_once './clases/FamiliasOlfativas.php';
    require_once './clases/Generos.php';
    require_once './clases/Productos.php';
        $marcas = Marcas::traerMarcas();
        $concentraciones = Concentraciones::traerConcentraciones();
        $familias_olfativas = FamiliasOlfativas::traerFamiliasOlfativas();
        $generos = Generos::traerGeneros();
        $precio = 1000;
        $productos = Producto::traerProductos();
        $marcaSeleccionado = Funciones::traerDatoUrl("marcas");
        $concentracionSeleccionado = Funciones::traerDatoUrl("concentraciones");
        $familiaOlfativaSeleccionado = Funciones::traerDatoUrl("aroma");
        $generoSeleccionado = Funciones::traerDatoUrl("genero");
        $precioSeleccionado = Funciones::traerDatoUrl("precio");
        
        if(!empty($marcaSeleccionado)){
            $productosFiltrados = [];
            foreach($productos as $value){
                if($marcaSeleccionado == $value['marcaNombre']){
                    $productosFiltrados[] = $value;
                }
            }
            $productos = $productosFiltrados;
        }
        if(!empty($concentracionSeleccionado)){
            $productosFiltrados = [];
            foreach($productos as $value){
                if($concentracionSeleccionado == $value['concentracionNombre']){
                    $productosFiltrados[] = $value;
                }
            }
            $productos = $productosFiltrados;
        }
        if(!empty($familiaOlfativaSeleccionado)){
            $productosFiltrados = [];
            foreach($productos as $value){
                if($familiaOlfativaSeleccionado == $value['familaOlfativaNombre']){
                    $productosFiltrados[] = $value;
                }
            }
            $productos = $productosFiltrados;
        }
        if(!empty($generoSeleccionado)){
            $productosFiltrados = [];
            foreach($productos as $value){
                if($generoSeleccionado == $value['generoNombre']){
                    $productosFiltrados[] = $value;
                }
            }
            $productos = $productosFiltrados;
        }
        if(!empty($precioSeleccionado)){
            $productosFiltrados = [];
            foreach($productos as $value){
                if($precioSeleccionado >= $value['precio']){
                    $productosFiltrados[] = $value;
                }
            }
            $productos = $productosFiltrados;
        }

    ?>


<main>
    <h1>Encuentra los productos de tus marcas favoritas</h1>
    <section>
        <form action="" method="GET">
            <input type="hidden" name="sec" value="tienda">
            <?= Funciones::generarSelect("Marcas", "marcas", $marcas)?>
            <?= Funciones::generarSelect("Concentraciones", "concentraciones", $concentraciones) ?>
            <?= Funciones::generarSelect("Aroma", "aroma", $familias_olfativas) ?>
            <?= Funciones::generarSelect("Genero", "genero", $generos) ?>
            <div>
                <label for="precio">Precio máximo:</label>
                <input type="number" name="precio" id="precio" min="0">
            </div>
            <div>
                <input type="submit" value="Buscar">
            </div>
            <div>
                <p>Filtros Actuales</p>
                <?php 
                    if(!empty($marcaSeleccionado)){
                ?>
                        <span><?=$marcaSeleccionado?></span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($concentracionSeleccionado)){
                ?>
                        <span><?=$concentracionSeleccionado?></span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($generoSeleccionado)){
                ?>
                        <span><?=$generoSeleccionado?></span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($familiaOlfativaSeleccionado)){
                ?>
                        <span><?=$familiaOlfativaSeleccionado?></span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($precioSeleccionado)){
                ?>
                        <span>Máximo <?=$precioSeleccionado?>$</span>
                <?php        
                    }
                ?>
            </div>
        </form>
        <div class="productos">
            <p> Tienes <?= sizeof($productos) ?> productos </p>
            <?php 
                if(empty($productos)){
            ?>
            <div class="noTarjetas">
                <h3>Mira los productos destacados de cada Marca.</h3>
                <picture class="seg_3">
                    <img src="./imagenes/iconos/buscar.png" alt="icono de busqueda">
                </picture>
            </div>
            <?php
                }else{
                    foreach($productos as $value){ 
            ?>
                <?= Funciones::generarProducto($value) ?>
            <?php }}?>
        </div>
    </section>
</main>


<style scoped>
    main{
        padding: 64px 24px;
    }
    main h1{
        text-align: center;
        border-bottom: 2px solid var(--grey--80);
    }
    main section{
        display: flex;
        width: 100%;
        max-width: 1600px;
        margin: 32px auto;
        background-color: var(--dark--light);
        border: 1px solid var(--grey--100);
    }
    main section form{
        width: 300px;
        background-color: var(--dark--40);
    }
    main section form div{
        padding: 6px 12px;
        display: flex;
        flex-direction: column;
    }
    main section form div label{
        font-size: var(--font--2);
    }
    main section form div select,
    main section form div input{
        padding: 2px 4px;
        font-size: var(--font--2);
        color: black;
        background-color: var(--white--80);
        cursor: pointer;
    }
    main section form div option{
        background-color: var(--dark--100);
        color: var(--text--light);
    }
    main section div.productos{
        padding: 64px 12px 12px;
        position: relative;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 24px;
    }
    main section div.productos>p{
        position: absolute;
        top: 12px;
        left: 12px;
    }
</style>