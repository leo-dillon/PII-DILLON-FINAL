import { crearElemento} from "../../public/js/general.js";

export function exito(correcto = '', mensaje, action = ""){
    let modal = document.querySelector('.modal')
    modal.innerHTML = ''
    let div = crearElemento('div', {
        class: "contenedorModal exito"
    })
    let div_h2 = crearElemento('h2',{

    },
    `Correcto ${correcto}`)
    let div_i = crearElemento('i', {
        class: "fa-solid fa-circle-check"
    })
    let div_p = crearElemento('p', {}, mensaje)
    let div_button = crearElemento('button', {}, "ACEPTAR")
    div_button.addEventListener('click', () => {
        modal.classList.remove('Activado')
        modal.innerHTML = ''
        if(action.length > 2){
            location.href = action
        }
    })
    
    div.append(div_h2, div_i, div_p, div_button)
    modal.append(div)
    modal.classList.add('Activado')
}
