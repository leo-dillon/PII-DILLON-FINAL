import { crearElemento } from "../public/js/general.js"

export function producto(producto){
    let descripcion = producto['descripcion']
    let imagen = producto['imagen']
    let nombre = producto['nombre']
    let precio = producto['precio']
    let id = producto['id']

    let contenedor = crearElemento('article', {
        class: "producto"
    })
    let contenedor_picture = crearElemento('picture')
    let contenedor_picture_img = crearElemento('img', {
        src: imagen,
        alt: `imagen de ${nombre}`
    })
    let contenedor_h3 = crearElemento('h3', {}, nombre)
    let contenedor_p = crearElemento('p', { class: "descripcion" }, descripcion)
    let contenedor_div = crearElemento('div')
    let contenedor_div_p = crearElemento('p', {class:"precio"}, precio)
    let contenedor_div_a = crearElemento('a', {
        href: `?sec=producto&id=${id}`
    }, "Comprar")
    contenedor_div.append(contenedor_div_p, contenedor_div_a)
    contenedor_picture.append(contenedor_picture_img)
    contenedor.append(contenedor_picture, contenedor_h3, contenedor_p, contenedor_div)
    return contenedor
}