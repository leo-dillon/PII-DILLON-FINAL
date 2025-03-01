import { crearElemento} from "../../public/js/general.js";

export function error(error = '', mensaje, direccion = ""){
    let modal = document.querySelector('.modal')
    modal.innerHTML = ''
    let div = crearElemento('div', {
        class: "contenedorModal error"
    })
    let div_h2 = crearElemento('h2',{

    },
    `Error ${error}`)
    let div_i = crearElemento('i', {
        class: "fa-solid fa-circle-exclamation"
    })
    let div_p = crearElemento('p', {}, mensaje)
    let div_button = crearElemento('button', {}, "ACEPTAR")
    div_button.addEventListener('click', () => {
        modal.classList.remove('Activado')
        modal.innerHTML = ''
        location.reload
    })
    
    div.append(div_h2, div_i, div_p, div_button)
    modal.append(div)
    modal.classList.add('Activado')
    
}
