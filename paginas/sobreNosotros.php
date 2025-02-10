<main>
<div class="sobre-nosotros">
    <h1>Sobre Nosotros</h1>
    <p>En nuestra perfumería, nos dedicamos a crear experiencias únicas a través de las fragancias. Desde nuestros comienzos, hemos trabajado con pasión para ofrecer una amplia selección de perfumes de alta calidad, seleccionados con un profundo conocimiento del arte olfativo. Cada fragancia que ofrecemos está diseñada para despertar emociones y recuerdos, permitiendo que nuestros clientes se expresen de manera única y personal.</p>

    <img src="./imagenes/model/tienda.jpeg" alt="Nuestra tienda de perfumes">

    <div class="equipo">
        <h2>Conoce a Nuestro Equipo</h2>
        
        <div class="equipo-miembro">
            <img src="https://via.placeholder.com/200" alt="Equipo Miembro 1">
            <h3>Ana García</h3>
            <p>Fundadora & Perfumista</p>
        </div>
        
        <div class="equipo-miembro">
            <img src="https://via.placeholder.com/200" alt="Equipo Miembro 2">
            <h3>Carlos Pérez</h3>
            <p>Especialista en Fragancias</p>
        </div>
        
        <div class="equipo-miembro">
            <img src="https://via.placeholder.com/200" alt="Equipo Miembro 3">
            <h3>Lucía Fernández</h3>
            <p>Consultora de Belleza</p>
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

        .sobre-nosotros p {
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
            color: var(--text--light--dark);
        }

        .sobre-nosotros img {
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

        .equipo-miembro {
            display: inline-block;
            width: 200px;
            margin: 0 20px;
        }

        .equipo-miembro img {
            width: 100%;
            border-radius: 50%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .equipo-miembro h3 {
            font-size: 20px;
            margin: 15px 0 10px;
            color: var(--dark--light);
        }

        .equipo-miembro p {
            font-size: 16px;
            color: var(--dark--light);
        }
</style>