import { crearElemento } from "../../../public/js/general.js";


export function eliminar(id, funcion){
    let modal = document.querySelector('.modal')
    modal.innerHTML = ''
    let div = crearElemento('div', {
        class: "contenedorModal eliminarProducto"
    })
    let div_h2 = crearElemento('h2', {}, "¿Seguro que quieres eliminar?")
    let div_div = crearElemento('div', {})
    let div_div_eliminar = crearElemento('button', {
        id: "eliminar"
    }, "Eliminar")
    div_div_eliminar.addEventListener('click', () => {
        funcion(id)
    })
    let div_div_cancelar = crearElemento('button', {
        id: "cancelar"
    }, "Cancelar")
    div_div_cancelar.addEventListener('click', () => {
        modal.classList.remove('Activado')
    })
    div_div.append(div_div_eliminar, div_div_cancelar)
    div.append(div_h2, div_div)
    modal.append(div)
    modal.classList.add('Activado')
}