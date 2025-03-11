<main>
    <section>
        <div class="title">
            <picture class="seg_3">
                <img src="./public/imagenes/logoWhite.png" alt="logo claro de Fragance">
            </picture>
            <h1>Fragance</h1>
        </div>
        <h2>Bienvenido a nuestra tienda </h2>
        <form action="./actions/usuarios/procesar_registro.php" method="POST">
            <div>
                <label for="nombre">Nombre Completo *</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrete tu nombre" required>
                <small class="nombre"></small>
            </div>
            <div>
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" placeholder="Ingrete tu email" required>
                <small class="email"></small>
            </div>
            <div>
                <label for="contraseña">Contraseña *</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Ingrete tu contraseña" required>
                <small class="contraseña"></small>
            </div>
            <div>
                <label for="repetidaContraseña">Repita la Contraseña *</label>
                <input type="password" id="repetidaContraseña" name="repetidaContraseña" placeholder="Ingrete tu repetidaContraseña" required>
                <small class="repetidaContraseña"></small>
            </div>
            <div>
                <label for="telefono">Telefono </label>
                <input type="number" id="telefono" name="telefono" placeholder="Ingrete tu telefono" required>
                <small class="telefono"></small>
            </div>
            <div>
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingrete tu direccion" required>
                <small class="direccion"></small>
            </div>
            <input type="submit" value="Registrarte">
            <a href="?sec=iniciarSesion">¿ ya tienes un usuario registrado ?</a>
        </form>
    </section>
</main>

<script type="module">
    import { crearUsuario } from "./public/js/usuario/crearUsuario.js" 
    let form = document.querySelector('form')
    form.addEventListener('submit', (event) => {
        let validacion = true
        let smalls = document.querySelectorAll('small')
        smalls.forEach( small => {
            small.innerHTML = ""
        })
        event.preventDefault()
        let formData = new FormData(form);
        let nombre = formData.get("nombre")
        let email = formData.get('email')
        let contrasena = formData.get('contraseña')
        let contrasenaRepetida = formData.get('repetidaContraseña')
        let telefono = formData.get('telefono')
        let direccion = formData.get('direccion')
        if(nombre.trim().length < 3){
            document.querySelector('small.nombre').innerText += "El nombre debe de tener más de 3 caracteres"
            validacion = false
        }
        if(contrasena.length < 6){
            document.querySelector('small.contraseña').innerText += "La contraseña debe tener más de 6 caracteres"
            validacion = false
        }
        if(contrasena !== contrasenaRepetida){
            document.querySelector('small.repetidaContraseña').innerText += "La contraseña no coinciden"
            validacion = false
        }
        if( 5 > telefono.length || telefono.length > 12){
            document.querySelector('small.telefono').innerText += "Telefono no valido. Ej 1234-1234"
            validacion = false
        }
        if(direccion.length < 5){
            document.querySelector('small.direccion').innerText += "La dirección debe tener más de 5 caracteres"
            validacion = false
        }
        if(validacion){
            crearUsuario(formData)
        }
    })
</script>

<style scoped>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: var(--white--100);
        padding: 32px 0;
    }

    section {
        width: calc(100% - 24px);
        max-width: 600px;
        padding: 12px;
        padding-bottom: 32px;
        border-radius: 12px;
        background-color: var(--white--80);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 32px;
    }
    section h2{
        color: var(--text--dark);
        font-size: var(--font--4);
    }
    section div.title {
        width: 100%;
        padding-bottom: 12px;
        gap: 12px;
        display: flex;
        align-items: center;
        border-bottom: 2px solid var(--dark--20);
    }

    section div.title picture {
        width: 24px;
        height: 24px;
        border-radius: 8px;
        padding: 8px;
        background-color: var(--dark--100);
        display: block;
    }

    section div.title h1{
        letter-spacing: 4px;
        font-size: var(--font--4);
        color: var(--text--dark);
    }

    section div.title picture img {
        width: 100%;
    }
    section form{
        width: 100%;
        gap: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    section form div{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: start;
    }
    section form div label{
        font-size: var(--font--2);
        color: var(--text--dark);
        transform: translateX(4px);
    }
    section form div input{
        width: calc(100% - 12px);
        padding: 6px;
        border-radius: 4px;
        color: var(--dark--100);
    }
    section form>input{
        width: 50%;
        background-color: var(--dark--80);
        padding: 4px 6px;
        border-radius: 12px;
        font-size: var(--font--2);
        text-align: center;
        align-self: end;
        cursor: pointer;
    }
    section form>input:hover{
        filter: brightness(120%);
    }
    main section form a{
        align-self: flex-end;
        color: var(--text--light--dark);
    }
    small{
        color: red;
    }
    @media (width < 500px){
        main section h2{
            font-size: var(--font--3);
        }
        main section form>input,
        main section form a{
            width: 80%;
            align-self: center;
            text-align: center;
        }
    }
</style>