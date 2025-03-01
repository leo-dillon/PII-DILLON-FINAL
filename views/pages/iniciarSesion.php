<?php 
    if(isset($_SESSION['email'])){
        header('location: ?sec=inico');
    }
?>

<main>
    <section>
        <div class="title">
            <picture class="seg_3">
                <img src="./public/imagenes/logoWhite.png" alt="logo claro de Fragance">
            </picture>
            <h1>Fragance</h1>
        </div>
        <form action="./actions/usuarios/login.php" method="POST">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ingrete tu email">
            </div>
            <div>
                <label for="contraseña">Contraseña</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Ingrete tu email">
            </div>
            <input type="submit" value="Iniciar Sesión">
            <a href="?sec=registrarte">¿ No estas registrado ?</a>
        </form>
    </section>
</main>

<script>
    let form = document.querySelector('form')
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        let formData = new FormData(form)
        fetch('./actions/usuarios/login.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data == true){
                document.querySelector('input[type=password]').classList.remove('error')
                document.querySelector('input[type=email]').classList.remove('error')
                location = "?sec=inicio"
            }else{
                if(data == "contraseña"){
                    document.querySelector('input[type=password]').classList.add('error')
                }
                if(data == "usuario"){
                    document.querySelector('input[type=password]').classList.add('error')
                    document.querySelector('input[type=email]').classList.add('error')
                }
            }
        })
        .catch()
    })
</script>

<style scoped>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: var(--white--100);
    }

    section {
        width: 100%;
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

</style>