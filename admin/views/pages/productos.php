<?php 
    include_once "../clases/modelos/Productos.php";
    include_once "../clases/modelos/Marcas.php";
    include_once "../clases/modelos/Generos.php";
    include_once "../clases/modelos/FamiliasOlfativas.php";
    include_once "../clases/modelos/Concentraciones.php";
    $productos = Producto::traerProductos();
    $marcas = Marcas::traerMarcasDatos();
    $generos = Generos::traerGenerosDatos();
    $familia_olfativa = FamiliasOlfativas::traerFamiliasOlfativasDatos();
    $concentraciones = Concentraciones::traerDatosConcentraciones();
    
?>
<main>

    <h1>Productos</h1>
    <p> Todos los productos de la tienda se encuentran en esta tabla </p>
    <section>
        <div class="contenedor_table">
            <table class="perfume-table">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Imagen</th>
                        <th >Nombre</th>
                        <th >Descripción</th>
                        <th >Precio</th>
                        <th >Stock</th>
                        <th >Marca</th>
                        <th >Género</th>
                        <th >Familia Olfativa</th>
                        <th >Concentración</th>
                        <th >Capacidad</th>
                        <th >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach( $productos as $value){
                ?>
                    <tr>
                        <td><?=$value['id']?></td>
                        <td><img src=".<?=$value['imagen']?>" alt="<?=$value['nombre']?>" class="perfume-image"></td>
                        <td><?=$value['nombre']?></td>
                        <td class="td-descripcion"><?=$value['descripcion']?></td>
                        <td>$<?=$value['precio']?></td>
                        
                        <td style=<?=($value["stock"] < 10)?"color:red": ""?>><?=$value['stock']?></td>
                        
                        <td><?=$value['marcaNombre']?></td>
                        <td><?=$value['generoNombre']?></td>
                        <td><?=$value['familaOlfativaNombre']?></td>
                        <td><?=$value['concentracionNombre']?></td>
                        <td><?=$value['capacidad']?>ml</td>
                        <td class="contenedorBtn">
                            <button class="btn edit-btn" 
                                data-producto='<?= json_encode($value) ?>' 
                                data-marca='<?=json_encode($marcas)?>' 
                                data-genero='<?=json_encode($generos)?>' 
                                data-familiaOlfativa='<?=json_encode($familia_olfativa)?>' 
                                data-concentracion='<?=json_encode($concentraciones)?>'
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn delete-btn"
                                data-id='<?= json_encode($value['id']) ?>'
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php 
                }
                ?>
                </tbody>
            </table>
        </div>

            <button class="btnCrear" title="Crear nuevo producto"
                data-marca='<?=json_encode($marcas)?>' 
                data-genero='<?=json_encode($generos)?>' 
                data-familiaOlfativa='<?=json_encode($familia_olfativa)?>' 
                data-concentracion='<?=json_encode($concentraciones)?>'
            >
                <i class="fa-solid fa-plus"></i>
            </button>
            
    </section>
</main>

<script type="module">
    import {eliminarProductoSeleccionado} from '../admin/public/eliminarProductoSeleccionado.js'
    import {editarProducto} from '../admin/componentes/modal/editarProducto.js'
    import {crearProducto} from '../admin/componentes/modal/crearProducto.js'
    import {eliminar} from '../admin/componentes/modal/eliminar.js'
    let btnsEliminar = document.querySelectorAll('.delete-btn')
    let btnsEditar = document.querySelectorAll('.edit-btn')
    let btnCrear = document.querySelector('.btnCrear')
    btnsEditar.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let atributto = JSON.parse(btn.getAttribute('data-producto'))
            let marcas = JSON.parse(btn.getAttribute('data-marca'))
            let genero = JSON.parse(btn.getAttribute('data-genero'))
            let familiaOlfativa = JSON.parse(btn.getAttribute('data-familiaOlfativa'))
            let concentracion = JSON.parse(btn.getAttribute('data-concentracion'))
            editarProducto(atributto, marcas, genero, familiaOlfativa, concentracion)
        })
    });
    btnsEliminar.forEach(btn => {
        btn.addEventListener('click', () => {
            let id = JSON.parse(btn.getAttribute('data-id'))
            eliminar(id, eliminarProductoSeleccionado)
        })
    })
    btnCrear.addEventListener('click', () => {
        let marcas = JSON.parse(btnCrear.getAttribute('data-marca'))
        let genero = JSON.parse(btnCrear.getAttribute('data-genero'))
        let familiaOlfativa = JSON.parse(btnCrear.getAttribute('data-familiaOlfativa'))
        let concentracion = JSON.parse(btnCrear.getAttribute('data-concentracion'))
        crearProducto(marcas, genero, familiaOlfativa, concentracion)

    })
</script>
<style>
main{
    position: relative;
    margin: 42px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: var(--white--100);
}
h1 {
    text-align: center;
    font-size: var(--font--title);
    color: var(--text--dark);
}
main>p{
    text-align: center;
    opacity: 0.7;
    font-size: var(--font--3);
    color: var(--text--dark);
}
main section{
    position: relative;
}
.perfume-table {
    position: relative;
    width: 98%;
    max-width: 1200px;
    border-collapse: collapse;
    margin: 52px auto;
    background-color: #fff;
    box-shadow: 0px 0px 42px rgba(0, 0, 0);
    border-radius: 8px;
    overflow: hidden;
}

.perfume-table th, .perfume-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.perfume-table th {
    background-color: #333;
    color: #fff;
    font-weight: 500;
}

.perfume-table td {
    color: #555;
}

.perfume-table img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

.perfume-table td img {
    display: block;
    margin: 0 auto;
}
.td-descripcion{
    font-size: var(--font--0);
}

.btn {
    padding: 10px 15px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.edit-btn {
    background-color: #4CAF50;
    color: white;
    border: none;
}

.edit-btn:hover {
    background-color: #45a049;
}

.delete-btn {
    background-color: #f44336;
    color: white;
    border: none;
    margin-left: 10px;
}

.delete-btn:hover {
    background-color: #e53935;
}
.contenedorBtn{
    width: 110px;
}
.btnCrear{
    width: 42px;
    height: 42px;
    text-align: center;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    right: 32px;
    padding: 12px;
    background-color: var(--white--100);
    border: 1px solid var(--dark--100);
    border-radius: 50%;
    font-size: var(--font--3);
    cursor: pointer;
    transition: scale .2s ease-out;
}
.btnCrear:hover{
    scale: 1.05;
}
.btnCrear i{
    color: var(--text--dark);   
}
@media (width < 1100px){
    table.perfume-table td, 
    table.perfume-table th{
        font-size: var(--font--0);
    }   
    table.perfume-table td button{
        width: 32px;
        height: 32px;
        padding: 4px;
    }
}
@media (width < 1000px){
    table.perfume-table td button.delete-btn{
        margin: 0;
    }
}
@media (width < 900px){
    main{
        padding-top: 32px;
    }
    main h1{
        font-size: var(--font--4);
    }
    main>p{
        width: 100%;
        max-width: 90vw;
        font-size: var(--font--1);
    }
    main section div.contenedor_table{
        background: linear-gradient(
            to right, 
            rgba(255, 255, 255, 1) 0%, 
            transparent 90%,  100%
        );
        width: 100%;
        max-width: 95vw;
        overflow-x: auto ;
    }
    main section div.contenedor_table .perfume-table{
        box-shadow: none;
    }
    main section div.contenedor_table div.perfume-table{

    }
    section button.btnCrear{
        right: none;
        left: 12px;
    }
}
</style>