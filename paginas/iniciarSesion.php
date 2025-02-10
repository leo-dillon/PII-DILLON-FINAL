<main>
    <section>
        <div class="title">
            <picture class="seg_3">
                <img src="./imagenes/logoWhite.png" alt="logo claro de Fragance">
            </picture>
            <h1>Fragance</h1>
        </div>
        <form action="">
            <div>
                <label for="">Email</label>
                <input type="email" id="email" name="email" placeholder="Ingrete tu email">
            </div>
            <div>
                <label for="">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrete tu email">
            </div>
            <input type="submit" value="Iniciar Sesión">
            <a href="?sec=iniciarSesion">Recuperar contraseña</a>
        </form>
    </section>
</main>

<style scoped>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    section {
        width: 100%;
        max-width: 400px;
        padding: 12px;
        padding-bottom: 32px;
        border-radius: 12px;
        background-color: var(--grey--60);
        box-shadow: 1px 1px 12px var(--white--20);
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
        border-bottom: 1px solid white;
    }

    section div.title picture {
        width: 24px;
        height: 24px;
        border-radius: 8px;
        padding: 8px;
        background-color: var(--grey--60);
        display: block;
    }

    section div.title h1{
        letter-spacing: 4px;
    }

    section div.title picture img {
        width: 100%;
    }
    section form{
        gap: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    section form h2{
        letter-spacing: 2px;
        font-weight: 600;
    }
    section form div{
        display: flex;
        flex-direction: column;
        align-items: start;
    }
    section form div label{
        font-size: var(--font--2);
        transform: translateX(4px);
    }
    section form div input{
        width: 60%;
        min-width: 300px;
        padding: 6px;
        border-radius: 12px;
        color: var(--dark--100);
    }
    section form>input{
        width: 50%;
        background-color: var(--text--green--dark);
        padding: 4px 6px;
        border-radius: 12px;
        font-size: var(--font--2);
        text-align: center;
        align-self: center;
        cursor: pointer;
    }
    section form>input:hover{
        filter: brightness(120%);
    }

</style>