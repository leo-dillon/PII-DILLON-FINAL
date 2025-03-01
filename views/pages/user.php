<?php 
    require_once './clases/modelos/Usuario.php';
    if(!$_SESSION['email']){
        header("location: ?sec=iniciarSesion");
    }
    $email = $_SESSION['email'];
    $nombre = $_SESSION['nombre'];
    $usuario_id = $_SESSION['usuario_id'];
?>

<main>
    <section>
        <h1>¡Bienvenido <?=$nombre?>!</h1>
        <p class="presentacion">Desde este sitio puedes ver toda la información de tu cuenta</p>
        <div class="btns">
            <a id="miPerfil" href="" data-email="<?=$email?>">
                <i class="fa-solid fa-user"></i>    
                Mis Datos
            </a>
            <a id="miCarrito" href="" data-id="<?=$usuario_id?>">
                <i class="fa-solid fa-cart-shopping"></i>       
                Mi Carrito
            </a>
            <a id="cerrarSession" href="">
                <i class="fa-solid fa-door-open"></i>   
                Cerrar Seccion
            </a>
        </div>
        <div class="datos">

        </div>
    </section>
</main>

<script type="module">
    import { getDatosUsuario } from "./public/js/usuario/getDatosUsuario.js";
    import { tablaDatosUsuario } from "./componentes/tablaDatosUsuario.js"
    import { tablaDatosCarrito } from "./componentes/tablaDatosCarrito.js"
    import { error } from "./componentes/modal/error.js"
    

    document.querySelector('#cerrarSession').addEventListener('click', (event) => {
        event.preventDefault()
        location.href = "./actions/usuarios/cerrarSession.php"
    })
    let contenedorTablaDatos = document.querySelector('.datos')
    document.querySelector('#miPerfil').addEventListener('click', async (event) => {
        event.preventDefault()
        contenedorTablaDatos.innerHTML = ''
        let email = event.target.dataset['email'];
        try{
            let datosUser = await getDatosUsuario(email)
            if(datosUser){
                tablaDatosUsuario(contenedorTablaDatos, datosUser, email)
            }else{
                datos.innerHTML = "<p style='color:var(--text--light--dark)'> Error al traer los datos. Intentelo denuevo más adelante </p>"
            }
        }
        catch{
            error("", "Ocurrio un error inesperado, intente denuevo más tarde")
        }
    })
    document.querySelector('#miCarrito').addEventListener('click', async (event) => {
        event.preventDefault()
        contenedorTablaDatos.innerHTML = ''
        let usuario_id = event.target.dataset['id'];
        tablaDatosCarrito(contenedorTablaDatos, usuario_id, () => document.querySelector('#miCarrito').click())
    })
</script>

<style>
    section{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 124px 0;
        background-color: var(--white--100);
    }
    section h1{
        font-size: var(--font--5);
        color: var(--text--dark);
    }
    section p.presentacion{
        font-size: var(--font--2);
        color: var(--text--light--dark);
    }
    section div.btns{
        width: 100%;
        max-width: 1000px;
        padding: 12px;
        margin-top: 64px;
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
    }
    section div.btns a{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 300px;
        height: 124px;
        border: 1px solid var(--grey--40);
        box-shadow: 0 0 24px var(--grey--40);
        color: var(--text--light--dark);
        font-size: var(--font--3);
        border-radius: 24px;
        transition:box-shadow .2s ease-out ;
    }
    section div.btns a:hover{
        box-shadow: 0 0 4px var(--grey--80); 
    }
    section div.btns a i{
        padding-bottom: 4px;
        font-size: var(--font--5);
        color: var(--text--dark);
    }
    .datos{
        width: 900px;
        padding: 64px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .datos h2{
        width: 100%;
        text-align: center;
        font-size: var(--font--5);
        color: var(--text--dark);
        border-bottom: 1px solid var(--dark--100);
    }
    .datos div.datoParticular{
        padding: 12px 0;
        width: 100%;
        display: flex;
        align-items: center;
        border-bottom: 1px solid var(--grey--40);
    }
    .datos div.datoParticular *{
        width: 100%;
    }
    .datos div.datoParticular h3{
        color: var(--text--dark);
        font-weight: 500;
    }
    .datos div.datoParticular p{
        color: var(--text--light--dark);
    }
    .datos div.datoParticular div{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .datos div.datoParticular button{
        width: 42px;
        height: 42px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border-radius: 24px;
        border: 1px solid var(--cyan--100);
        transition: scale .1s ease-out, box-shadow .15s ease-out;
    }
    .datos div.datoParticular button:hover{
        scale: 1.05;
        box-shadow: 0 0 12px var(--cyan--100);
    }
    .datos div.datoParticular button i{
        color: var(--cyan--100);
    }
    
    .datos h2.carrito_titulo{
        margin-bottom: 24px;
    }
    .datos div.carrito{
        width: 100%;
        padding: 6px 4px;
        display: flex;
        align-items: center;
        border: 1px solid var(--cyan--100);
    }
    .datos div.carrito picture{
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 12px;
        width: 64px;
        height: 64px;
    }
    .datos div.carrito picture img{
        width: 100%;
    }
    .datos div.carrito h3{
        flex-grow: 1;
        padding-left: 64px;
        color: var(--text--dark);
        font-weight: 500;
    }
    .datos div.carrito form{
        display: flex;
        justify-content: center;
        gap: 12px;
        overflow: hidden;
    }
    .datos div.carrito form button{
        width: 36px;
        background-color: transparent;
        padding: 6px;
        border-radius: 50%;
        border: 1px solid var(--dark--100);
        cursor: pointer;
    }
    .datos div.carrito form button i{
        color: var(--dark--100);
    }
    .datos div.carrito form input{
        width: 48px;
        text-align: center;
        font-size: var(--font--1);
        background-color: transparent;
        border-radius: 24px;
        padding: 4px 0;
        color: var(--text--dark);
        transition: transform .3s ease-out;
    }
    .datos div.carrito form.loading input{
        transform: translateY(200px);
        
    }

    .datos div.carrito p{
        min-width: 100px;
        text-align: center;
        margin: 0 24px;
        font-size: var(--font--3);
        color: var(--text--dark);
    }
    .datos a.tienda{
        padding: 2px 12px;
        border: 1px solid var(--dark--100);
        border-radius: 24px;
        color: var(--text--light--dark);
        cursor: pointer;
    }
    .datos a.tienda:hover{
        scale: 1.05;
    }
    .datos .resumenCarrito{
        width: calc(100% - 14px);
        position: relative;
        padding: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border: 1px solid var(--cyan--100   );
    }
    .datos .resumenCarrito h3{
        font-size: var(--font--3);
        color: var(--dark--100);
        font-weight: 500;
    }
    .datos .resumenCarrito p{
        color: var(--dark--100);
        opacity: 0.7;
    }
    .datos .resumenCarrito p span{
        padding: 4px 12px;
        font-size: var(--font--2);
        border: 1px solid var(--grey--80);
        color: var(--dark--100);
        border-radius: 12px;
    }
    .datos a.btnPago{
        position: absolute;
        right: 0;
        top: calc(100% + 8px);
        padding: 12px;
        border: 1px solid var(--dark--100);
        border-radius: 12px;
        font-size: var(--font--2);
        color: var(--text--dark);
        background-color: var(--white--100);
        cursor: pointer;
        transition: letter-spacing .2s ease-out;
    }
    .datos a.btnPago:hover{
        letter-spacing: 2px;
    }
</style>