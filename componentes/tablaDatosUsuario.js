import { crearElemento } from "../public/js/general.js"
import { editarDato } from "../componentes/modal/editarDato.js"

export function tablaDatosUsuario(contenedorTablaDatos, datos, email){
    const campos = ['nombre', 'telefono', 'direccion','email', 'fecha_creacion'];
    let contenedor_h2 = crearElemento('h2', {}, "DATOS PERSONALES")
    contenedorTablaDatos.append(contenedor_h2)
    campos.forEach( campo => {
        let contenedor_div = crearElemento('div', {
            class: "datoParticular"
        })
        let contenedor_div_h3 = crearElemento('h3', {}, capitalize(campo))
        let contenedor_div_p = crearElemento('p', {}, datos[campo])
        contenedor_div.append(contenedor_div_h3, contenedor_div_p)
        if(campo !== 'fecha_creacion' && campo !== 'email'){
            let contenedor_div_div = crearElemento('div', {}, "")
            let contenedor_div_div_button = crearElemento('button', {
                class: `edit-${campo}`,
                "data-campo": campo,
                "data-valor": datos[campo]
            })
            let contenedor_div_div_button_i = crearElemento("i", {
                class: "fa-solid fa-pen-to-square"
            })
            contenedor_div_div_button.addEventListener('click', (e) => {
                let campo = e.currentTarget.getAttribute('data-campo')
                let valor = e.currentTarget.getAttribute('data-valor')
                editarDato(campo, valor, email)
            })
            contenedor_div_div_button.append(contenedor_div_div_button_i)
            contenedor_div_div.append(contenedor_div_div_button)
            contenedor_div.append(contenedor_div_div)
        }
        contenedorTablaDatos.append(contenedor_div)
    })
}


function capitalize (text){
    return text.replace("_", ' de ')
}

