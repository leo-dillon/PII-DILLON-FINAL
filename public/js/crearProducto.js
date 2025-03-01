function crearProducto(producto) {
    return `
        <article class='producto'>
            <picture>";
                <img src='${producto['imagen']}' alt='imagen ${producto['nombre']}'>";
            </picture>";
            <h3> ${producto['nombre']} </h3>";
            <p class='descripcion'>${producto['descripcion']}</p>
            <div>";
                <p class='precio'>$ ${producto['precio']}</p>";
                <a href='?sec=producto&id=${producto['id']}' class='hover_2'>Comprar</a>
            </div>
        </article>
    `
}