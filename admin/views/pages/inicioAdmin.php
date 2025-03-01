<main>
    <h1>Bienvenido Administrador</h1>
    <p> Desde este lugar podrás operar todos los datos de tus páginas web </p>
    <section class="btns" >
        <a id="productos" href="?sec=productos" >
            <i class="fa-solid fa-spray-can-sparkles"></i>    
            Productos
        </a>
        <a id="marcas" href="?sec=marcas">
            <i class="fa-brands fa-slack"></i>
            Marcas
        </a>
        <a id="generos" href="?sec=generos">
            <i class="fa-solid fa-venus-mars"></i>  
            Generos
        </a>
        <a id="concentraciones" href="?sec=concentraciones">
            <i class="fa-solid fa-percent"></i> 
            Concentraciones
        </a>
        <a id="fragancias" href="?sec=fragancias">
            <i class="fa-solid fa-wind"></i> 
            Fragancias
        </a>
    </section>
</main>
<style>
    main{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: var(--white--100);
    }
    main h1{
        font-size: var(--font--5);
        color: var(--text--dark);
    }
    main p{
        font-size: var(--font--2);
        color: var(--text--dark);
        opacity: 0.7;
    }
    section.btns{
        width: 100%;
        max-width: 1000px;
        padding: 12px;
        margin-top: 64px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 24px;
    }
    section.btns a{
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
    section.btns a:hover{
        box-shadow: 0 0 4px var(--grey--80); 
    }
    section.btns a i{
        padding-bottom: 4px;
        font-size: var(--font--5);
        color: var(--text--dark);
    }
</style>