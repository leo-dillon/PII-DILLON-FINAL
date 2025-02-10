<?php 
    require_once './clases/Productos.php';
    require_once './clases/Funciones.php';
    $id_url = Funciones::traerDatoUrl('id');
    $productoBuscado = Producto::traerProductoId($id_url);
    $productosTotales = Producto::cantidadProductos();
    if(empty($productoBuscado)){
        header('Location: ?sec=404');
    }
?>
<main>
    <section>
        <div>
            <picture>
                <img src="<?php echo $productoBuscado['imagen']; ?>" alt="<?php echo $productoBuscado['nombre']; ?>">
            </picture>
            <div class="caracteristicas">
                <div>
                    <p><i class="fas fa-tag"></i><?=$productoBuscado['marcaNombre']?></p>
                    <h1><?php echo $productoBuscado['nombre']; ?></h1>
                    <p class="small">Descripcion:</p>
                    <p><strong><?=$productoBuscado['descripcion']?></strong></p>
                </div>
                <div>
                    <p class="precio"><i class="fas fa-coins"></i><?=$productoBuscado['precio']?>$</p>
                    <form action="" method="GET">
                        <div>
                            <div>
                                <button type="button" id="menos"><i class="fa-solid fa-minus"></i></button>
                                <input type="number" value="1" min="0" class="number" disabled>
                                <button type="button" id="mas"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <input type="submit" value="Agregar al carrito">
                    </form>
                </div>
            </div>
        </div>
        <div class="extra">
            <h2>Detalles extras</h2>
            <div class="producto-detalles">
                <div class="detalle-item">
                    <p class="small">Género: <i class="fas fa-venus-mars"></i></p>
                    <p><strong><?php echo $productoBuscado['generoNombre']; ?></strong></p>
                </div>
                <div class="detalle-item">
                    <p class="small">Aroma: <i class="fas fa-leaf"></i></p>
                    <p><strong><?php echo $productoBuscado['familaOlfativaNombre']; ?></strong></p>
                </div>
                <div class="detalle-item">
                    <p class="small">Concentración: <i class="fas fa-flask"></i></p>
                    <p><strong><?php echo $productoBuscado['concentracionNombre']; ?></strong></p>
                </div>
                <div class="detalle-item">
                    <p class="small">Capacidad: <i class="fas fa-tint"></i></p>
                    <p><strong><?php echo $productoBuscado['capacidad']; ?> ml</strong></p>
                </div>
            </div>
        </div>
        <?php
            if(!($productosTotales['total'] == $productoBuscado['id'])){ 
        ?>
            <a class="next" href="?sec=producto&id=<?=$productoBuscado['id']+1?>">
                Siguiente producto.
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        <?php 
            } 
        ?>
        <?php 
            if(!(1 == $productoBuscado['id'])){
        ?>
            <a class="last" href="?sec=producto&id=<?=$productoBuscado['id']-1?>">
                <i class="fa-solid fa-arrow-right"></i>
                Anterior producto.
            </a>
        <?php 
            }
        ?>
    </section>
</main>
<script>
    let inputNumber = document.querySelector('.number')
    document.querySelector('#mas').addEventListener('click', () => {
        let valueInputNumber = parseInt(inputNumber.value)
        if( valueInputNumber != <?=$productoBuscado['stock']?> ){
            inputNumber.value = valueInputNumber + 1
        }
    })
    document.querySelector('#menos').addEventListener('click', () => {
        let valueInputNumber = parseInt(inputNumber.value)
        if( valueInputNumber != 1 ){
            inputNumber.value = valueInputNumber - 1
        }
    })
</script>
<style scoped>
    section{
        padding: 32px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 64px;
        background-color: var(--white--80);
    }
    section *{
        color: var(--dark--100);
    }
    section h1{
        position: relative;
        right: 12px;
        width: 100%;
        max-width: 900px;
        font-size: var(--font--5);
        letter-spacing: 4px;
        text-align: start;
    }
    section>div{
        width: 100%;
        max-width: 1000px;
        padding-top: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 42px;
    }
    section>div picture{
        width: 100%;
        max-width: 400px;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid var(--grey--30);
        transition: background-color .3s ease-out;
    }
    section>div picture:hover{
        background-color: var(--dark--50);
    }
    section>div picture img{
        width: 100%;
        border-radius: 12px;
        transition: scale .1s ease-out;
    }
    section>div picture:hover img{
        scale: 1.01;
    }
    section>div div.caracteristicas{
        padding-left: 24px;
    }
    .small{
        font-weight: 200;
    }
    section>div>div{
        align-self: stretch;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 12px;
    }
    section>div>div>div{
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    section>div div p i{
        padding-right: 12px ;
    }
    section>div div p strong{
        font-size: var(--font--2);
        font-weight: 500;
    }
    section>div div p.precio{
        font-size: var(--font--2);
        margin-bottom: 12px;
    }
    section>div div form{
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    section>div div form div div{
        display: flex;
        gap: 12px;
    }
    section>div div form div div button{
        width: 36px;
        background-color: transparent;
        padding: 6px;
        border-radius: 50%;
        border: 1px solid var(--dark--100);
        cursor: pointer;
    }
    section>div div form div div input{
        width: 48px;
        text-align: center;
        font-size: var(--font--1);
        background-color: transparent;
        border-radius: 24px;
        padding: 4px 0;
    }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    section>div div form input{
        width: max-content;
        padding: 6px 12px;
        background-color: transparent;
        border-radius: 12px;
        font-size: var(--font--2);
    }
    section>div div form input[type=submit]{
        transition: letter-spacing .2s ease-out;
        cursor: pointer;
    }
    section>div div form input[type=submit]:hover{
        letter-spacing: 2px;
    }
    section div.extra{
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
        gap: 6px;
        padding: 32px 0;
    }
    section div.extra h2{
        font-weight: 400;
        text-decoration: underline 1px var(--dark--50);
    }
    section div.extra div.producto-detalles{
        padding-top: 32px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 32px;
    }
    section div.extra div.producto-detalles div{
        width: max-content;
        padding: 12px;
        display: flex;
        border: 1px solid var(--dark--100);
        border-radius: 12px;
        transition: scale .2s ease-out;
    }
    section div.extra div.producto-detalles div:hover{
        scale: 1.04;
    }
    section a.next{
        position: absolute;
        right: 0;
        bottom: 0;
        padding: 12px;
        border: 1px solid var(--dark--60);
        transition: letter-spacing .2s ease-out;
    }
    section a.last{
        position: absolute;
        left: 0;
        bottom: 0;
        padding: 12px;
        border: 1px solid var(--dark--60);
        transition: letter-spacing .2s ease-out;
    }
    section a.last i{
        rotate: 180deg;
    }
    section a.next:hover,
    section a.last:hover{
        letter-spacing: 4px;
    }
</style>