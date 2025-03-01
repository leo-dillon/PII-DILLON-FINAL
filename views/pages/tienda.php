<?php
    require_once './clases/servicios/Funciones.php';
    require_once './clases/modelos/Marcas.php';
    require_once './clases/modelos/Concentraciones.php';
    require_once './clases/modelos/FamiliasOlfativas.php';
    require_once './clases/modelos/Generos.php';
    require_once './clases/modelos/Productos.php';
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
    <h1 id="tienda">Encuentra los productos de tus marcas favoritas</h1>
    <section>
        <form action="#tienda" method="GET">
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
                <p class="nombreFiltros">Filtros Actuales</p>
                <?php
                    if(
                        empty($marcaSeleccionado) && 
                        empty($concentracionSeleccionado) &&
                        empty($generoSeleccionado) &&
                        empty($familiaOlfativaSeleccionado) &&
                        empty($precioSeleccionado)
                    ){
                ?>
                        <small>No tienes filtros seleccionados</small>
                <?php
                    }
                ?>
                <?php 
                    if(!empty($marcaSeleccionado)){
                ?>
                        <span onclick="eliminarFiltro('<?=$marcaSeleccionado?>')" class="filtroActivo">
                            <?=$marcaSeleccionado?>
                            <i class="fa-solid fa-x"></i>    
                        </span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($concentracionSeleccionado)){
                ?>
                        <span onclick="eliminarFiltro('<?=$concentracionSeleccionado?>')" class="filtroActivo">
                            <?=$concentracionSeleccionado?>
                            <i class="fa-solid fa-x"></i>    
                        </span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($generoSeleccionado)){
                ?>
                        <span onclick="eliminarFiltro('<?=$generoSeleccionado?>')" class="filtroActivo">
                            <?=$generoSeleccionado?>
                            <i class="fa-solid fa-x"></i>    
                        </span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($familiaOlfativaSeleccionado)){
                ?>
                        <span onclick="eliminarFiltro('<?=$familiaOlfativaSeleccionado?>')" class="filtroActivo">
                            <?=$familiaOlfativaSeleccionado?>
                            <i class="fa-solid fa-x"></i>    
                        </span>
                <?php        
                    }
                ?>
                <?php 
                    if(!empty($precioSeleccionado)){
                ?>
                        <span onclick="eliminarFiltro('<?=$precioSeleccionado?>')" class="filtroActivo">
                            Máximo <?=$precioSeleccionado?>$
                            <i class="fa-solid fa-x"></i>    
                        </span>
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
                    <img src="./public/imagenes/iconos/buscarOscuro.png" alt="icono de busqueda">
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

<script>
    let btn_submit = document.querySelector('input[type=submit]')
    function eliminarFiltro(filtro){
        filtroEdit = filtro.replaceAll(' ', '+')
        let locationActual = location.search
        let nuevoLocation = locationActual.replace(filtroEdit, '')
        location.href = nuevoLocation
    }
</script>

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
        padding-top: 12px;
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
    main section form div p.nombreFiltros{
        margin: 24px 0 6px;
        border-bottom: 1px solid var(--grey--50);
        text-align: center;
        font-size: var(--font--3);
    }
    main section form div small{
        text-align: center;
    }
    main section form div span{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 80%;
        padding: 6px 12px;
        margin: 0 auto;
        cursor: pointer;
    }
    main section form div span:hover{
        background-color: var(--grey--50);
    }
    main section form div span i{
        opacity: 0;
        transform: translateY(20px);
        transition: transform .2s ease-out, opacity .1s ease-out;
    }
    main section form div span:hover i{
        opacity: 1;
        transform: translateY(0px);
    }
    main section div.productos{
        width: 100%;
        padding: 64px 12px 12px;
        position: relative;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 24px;
        background-color: var(--white--100);
    }
    main section div.productos>p{
        position: absolute;
        top: 12px;
        left: 12px;
        color: var(--text--dark);
        font-size: var(--font--2);
    }
    main section div.noTarjetas{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    main section div.noTarjetas h3{
        font-size: var(--font--4);
        color: var(--text--dark);
    }
    main section div.noTarjetas picture{
        max-width: 120px;
        margin-top: 24px;
    }        
    main section div.noTarjetas picture img{
        width: 100%;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--dark--100);
    }
</style>