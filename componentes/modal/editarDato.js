
import { crearElemento } from "../../public/js/general.js";
import { error } from "../modal/error.js";
import { exito } from "../modal/exito.js";


export function editarDato(tabla, datoActual, email){
    let modal = document.querySelector('.modal') 
    modal.classList.add('Activado')
    let contenedor = crearElemento('div', {
        class: "contenedorModal editarDato"
    })
    let contenedor_h2 = crearElemento('h2', {}, `Editar Campo ${tabla}`)
    let contenedor_form = crearElemento('form', {
        method: "POST",
        action: "./actions/usuarios/editarDato.php",
        id: "editForm"
    })
    let contenedor_form_label = crearElemento("label", {
        for: "valor"
    }, 
    `Valor anterior: ${datoActual}`
    )
    let contenedor_form_inputText = crearElemento(
        "input",
        {
            type: "text",
            id: "valor",
            name: "valor",
            required: "",
            placeholder: datoActual
        }
    )
    let contenedor_form_inputSubmit = crearElemento(
        "input",
        {
            class: "enviarDatos",
            type: "submit",
            value: "Guardar los Cambios"
        }
    )
    contenedor_form.append(contenedor_form_label)
    contenedor_form.append(contenedor_form_inputText)
    contenedor_form.append(contenedor_form_inputSubmit)
    let contenedor_button = crearElemento('button')
    let contenedor_button_i = crearElemento('i', {
        class: "fa-solid fa-xmark"
    })
    contenedor_button.append(contenedor_button_i)
    contenedor.append(contenedor_h2)
    contenedor.append(contenedor_form)
    contenedor.append(contenedor_button)

    contenedor_button.addEventListener('click', () => {
        modal.classList.remove('Activado')
        modal.innerHTML = ''

    })

    contenedor_form.addEventListener('submit', (event) => {
        event.preventDefault()
        let datos = new FormData(contenedor_form);
        datos.append('campo', tabla)
        datos.append('email', email)
        fetch("./actions/usuarios/editarDato.php", {
            method: "POST",
            body: datos
        })
        .then(res => res.json())
        .then(datos => {
            exito("", `Se edito el campo ${tabla} correctamente`, "?sec=user")
        })
        .catch(er => {
            modal.innerHTML = ''
            error("", `Se produjo un error inesperado al querer editar el ${tabla}`)
        });

    })
    modal.append(contenedor)
}
