<?php 
    include_once "../clases/modelos/Generos.php";
    $generos = Generos::traerGenerosDatos();
?>
<main>

    <h1>Generos</h1>
    <p> Todos los generos de la tienda se encuentran en esta tabla </p>
    <section>
        <table class="perfume-table">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Nombre</th>
                    <th >Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach( $generos as $value){
                ?>
                    <tr>
                        <td><?=$value['id']?></td>
                        <td><?=$value['nombre']?></td>
                        <td class="contenedorBtn">
                            <button class="btn edit-btn" data-genero='<?=json_encode($value)?>'>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn delete-btn" data-id=<?=$value['id']?>>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
            <button class="btnCrear" title="Crear nuevo Genero">
                <i class="fa-solid fa-plus"></i>
            </button>
            
    </section>
</main>

<script type="module">
    import {crearGenero} from "../admin/componentes/modal/crearGenero.js"
    import {editarGenero} from "../admin/componentes/modal/editarGenero.js"
    import {eliminar} from '../admin/componentes/modal/eliminar.js'
    import {eliminarGenero} from '../admin/public/eliminarGenero.js'
    let btnsEliminar = document.querySelectorAll('.delete-btn')
    let btnsEditar = document.querySelectorAll('.edit-btn')
    let btnCrear = document.querySelector('.btnCrear')
    btnsEditar.forEach(btn => {
        btn.addEventListener('click', (e) => {
            let genero = JSON.parse(btn.getAttribute('data-genero'))
            editarGenero(genero.id, genero.nombre)
        })
    });
    btnsEliminar.forEach(btn => {
        btn.addEventListener('click', () => {
            let id = JSON.parse(btn.getAttribute('data-id'))
            eliminar(id, eliminarGenero)
        })
    })
    btnCrear.addEventListener('click', () => {
        crearGenero()
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
    margin-top: 32px;
}
.perfume-table {
    position: relative;
    width: 100%;
    max-width: 1200px;
    border-collapse: collapse;
    margin: 52px auto;
    background-color: #fff;
    box-shadow: 0px 0px 42px rgba(0, 0, 0);
    border-radius: 8px;
    overflow: hidden;
}

.perfume-table th, .perfume-table td {
    padding: 15px;
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
    right: 0;
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
@media (width < 900px){
    main h1 {
        font-size: var(--font--5);
    }
    main p{
        font-size: var(--font--2);
        width: 80%;
        margin: 0 auto;
    }
    .perfume-table th, .perfume-table td {
        padding: 4px 8px;
    }
    .perfume-table td{
        height: 32px;
    }
    main section{
        margin-top: 12px;
    }
}
</style>