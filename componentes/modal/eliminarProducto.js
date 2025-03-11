import { deleteProductoCarrito } from "../../public/js/carrito/deleteProductoCarrito.js";
import { crearElemento } from "../../public/js/general.js";

export function eliminarProducto(producto_id, usuario_id, imagen, nombre, contenedor, precio, actualizarPrecioFinal, cantidad = 1){
    let modal = document.querySelector('.modal')
    modal.innerHTML = ''
    let div = crearElemento('div', {
        class: "contenedorModal eliminarProducto"
    })
    let div_h2 = crearElemento('h2', {}, "¿Seguro que quieres eliminar este producto?")
    let div_picture = crearElemento('picture', {})
    let div_picture_img = crearElemento("img",{
        src: imagen,
        alt: `imagnen del producto ${nombre}`
    })
    div_picture.append(div_picture_img)
    let div_div = crearElemento('div', {})
    let div_div_eliminar = crearElemento('button', {
        id: "eliminar"
    }, "Eliminar")
    div_div_eliminar.addEventListener('click', () => {
        deleteProductoCarrito(usuario_id, producto_id)
        contenedor.remove()
        actualizarPrecioFinal(-(precio * cantidad), cantidad)
    })
    let div_div_cancelar = crearElemento('button', {
        id: "cancelar"
    }, "Cancelar")
    div_div_cancelar.addEventListener('click', () => {
        modal.classList.remove('Activado')
    })
    div_div.append(div_div_eliminar, div_div_cancelar)
    div.append(div_h2, div_picture, div_div)
    modal.append(div)
    modal.classList.add('Activado')
}