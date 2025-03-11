<main>
    <h1>ERROR 404</h1>
    <picture>
        <img src="../public/imagenes/404_2.png" alt="404 está página no esta disponible">
    </picture>
    <a href="?sec=inicio">
        Volver al inicio
    </a>
</main>
<style>
    main{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 24px;
    }
    main h1{
        font-size: var(--font--title);
        letter-spacing: 4px;
        font-weight: 500;
        border-bottom: 1px solid var(--white--50);
    }
    main picture{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--white--50);
        padding: 24px;
        border-radius: 50%;
        animation: seg_3 1s .3s ease-out both;
    }
    main picture img{
        width: 80%;
    }
    main a{
        font-size: var(--font--3);
    }
    @media (width < 600px) {
        main h1{
            font-size: var(--font--5);
        }
        
    }

</style>    