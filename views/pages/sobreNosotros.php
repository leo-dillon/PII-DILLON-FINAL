<main>
<div class="sobre-nosotros">
    <h1>Sobre Nosotros</h1>
    <p>En nuestra perfumería, nos dedicamos a crear experiencias únicas a través de las fragancias. Desde nuestros comienzos, hemos trabajado con pasión para ofrecer una amplia selección de perfumes de alta calidad, seleccionados con un profundo conocimiento del arte olfativo. Cada fragancia que ofrecemos está diseñada para despertar emociones y recuerdos, permitiendo que nuestros clientes se expresen de manera única y personal.</p>

    <img src="./public/imagenes/model/tienda.jpeg" alt="Nuestra tienda de perfumes">

    <div class="equipo">
        <h2>Conoce a Nuestro Equipo</h2>
        
        <div class="alumno">
            <div class="yo">
                <picture>
                    <img src="./public/imagenes/model/leo.jpeg" alt="Equipo Miembro 1">
                </picture>
                <h3>Leonardo Dillon</h3>
                <p>Fundador & Jefe tecnico</p>
                <div class="redes">
                    <a href="https://www.instagram.com/leonardonahueldillon/">
                        <img src="./public/imagenes/iconos/instagram.png" alt="icono de Instagram" title="Ir a Instagram">
                    </a>
                    <a href="https://www.linkedin.com/in/leonardo-dillon-jeannoteguy-1878b515a/">
                        <img src="./public/imagenes/iconos/linkedin.png" alt="icono de Linkedin" title="Ir a Linkedin">
                    </a>
                    <a href="https://wa.me/2324697491">
                        <img src="./public/imagenes/iconos/whatsapp.png" alt="icono de Whatsapp" title="Ir a WhatsApp">
                    </a>
                   
                </div>
            </div>
            <div class="datos">
                <p><strong> Profesor:</strong> Alejandro D'ADDEZIO</p>
                <p><strong> Materia:</strong> Programación 2</p>
                <p><strong> Curso:</strong> DWM3AP</p>
            </div>

        </div>
    </div>
</div>
</main>
<style scoped>
    .sobre-nosotros {
            background-color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

    .sobre-nosotros h1 {
        font-size: var(--font--5);
        color: var(--text--dark);
        margin-bottom: 20px;
    }

    .sobre-nosotros>p {
        font-size: 18px;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
        color: var(--text--light--dark);
    }

    .sobre-nosotros>img {
        margin-top: 40px;
        max-width: 100%;
        height: auto;
        max-height: 400px;
        border: 1px solid var(--grey--100);
        border-radius: 10px;
        box-shadow: 12px 12px 12px var(--dark--80);
    }

    .equipo {
        margin-top: 50px;
    }

    .equipo h2 {
        font-size: 28px;
        margin-bottom: 30px;
        color: var(--text--dark);
    }

    .alumno{
        width: max-content  ;
        margin: 0 auto;
        display: flex;
    }
    .alumno div.yo {
        display: flex;
        flex-direction: column;
        margin: 0 20px;
        padding: 12px;
        border: 1px solid var(--dark--light);
        border-radius: 24px;
    }

    .alumno div img {
        width: 100%;
        max-width: 250px;
        border-radius: 50%;
        border: 1px solid var(--grey--100);
    }

    .alumno div h3 {
        font-size: 20px;
        margin: 15px 0 10px;
        color: var(--dark--light);
    }

    .alumno div p {
        font-size: 16px;
        color: var(--dark--light);
    }
    .alumno div div.redes{
        height: 42px;
        padding: 12px 12px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
    }
    .alumno div div img{
        width: 42px;
    }
    .alumno div.datos{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: center;
        gap: 12px;
    }
    .alumno div.datos p strong{
        color: var(--text--dark);
        font-size: var(--font--2);
        margin-right: 12px;
    }
    .alumno div.datos p{
        color: var(--text--light--dark);
        font-size: var(--font--1);
        border-bottom: 1px solid var(--dark--80);
    }
    @media (width < 600px){
        .alumno{
            flex-direction: column;
        }
        .alumno div.yo{
            width: calc(100% - 64px);
        }
        .alumno div.datos{
            margin-top: 24px;
        }
        .alumno div.datos p{
            width: 100%;
            text-align: center  ;
        }
        P{
            font-size: var(--font--1) !important;
        }
    }
</style>