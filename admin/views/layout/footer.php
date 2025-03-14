<footer>
    <div>
        <picture>
            <img src="../public/imagenes/logoWhite.png" alt="logo de Leonardo Dillon">
        </picture>
    </div>
    
    <div class="comprasSeguras">
        <h2>Compras 100% seguras</h2>
        <div>
            <p>Perfumerías Pigmento garantiza la seguridad transaccional de sus clientes. Defensa de las y los Consumidores: por consultas y/o denuncias ingrese acá en CABA o acá en el resto del país</p>
            <picture>
                <img src="../public/imagenes/iconos/defensa.png" alt="">
            </picture>
        </div>
    </div>
</footer>

<style>
    footer{
        width: calc(100% - 24px);
        height: 200px;
        padding: 24px 12px;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    footer>div{
        max-width: 400px;
    }
    footer div div{
        display: flex;
        align-items: center;
        gap: 4px;
    }
    @media (width < 700px){
        footer{
            flex-direction: column;
        }
        footer div{
            display: none;
        }
        footer .comprasSeguras{
            display: block;
        }
    }
</style>