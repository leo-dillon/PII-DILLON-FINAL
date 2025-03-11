
import { crearElemento } from "../../../public/js/general.js";
import { error } from "../../../componentes/modal/error.js";
import { exito } from "../../../componentes/modal/exito.js";


export function crearConcentracion(){
    let modal = document.querySelector('.modal') 
    modal.innerHTML = ""
    modal.classList.add('Activado')
    let contenedor = crearElemento('div', {
        class: "contenedorModal editarDato"
    })
    let contenedor_h2 = crearElemento('h2', {}, `Crear Concentración`)
    let contenedor_form = crearElemento('form', {
        method: "POST",
        action: "",
        id: "editForm"
    })
    let contenedor_form_label = crearElemento("label", {
        for: "valor"
    }, 
    `Nueva Concentración:`
    )
    let contenedor_form_inputText = crearElemento(
        "input",
        {
            type: "text",
            id: "concentracion",
            name: "concentracion",
            required: "",
        }
    )
    let contenedor_form_inputSubmit = crearElemento(
        "input",
        {
            class: "enviarDatos",
            type: "submit",
            value: "Enviar"
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
        contenedor_form_inputText.classList.remove("error")
        let datos = new FormData(contenedor_form);
        if(datos.get('concentracion').length < 3){
            contenedor_form_label.innerHTML = `
                Nueva Concentración
                <br> 
                <small style='color:red'>Debe contener más de 3 caracteres</small>
            `
            contenedor_form_inputText.classList.add("error")
        }else{
            fetch("../actions/concentracion/crearConcentracion.php", {
                method: "POST",
                body: datos
            })
            .then(res => res.json())
            .then(data => {
                if(data == "existe"){
                    error("", "Ya existe una Concentración con ese nombre")
                }else if(data){
                    exito("", `Se creo la Concentración correctamente`, "?sec=concentraciones")
                }else{
                    error("", "Los datos ingresados no son correctos")
                }
            })
            .catch(er => {
                modal.innerHTML = ''
                error("", `Se produjo un error inesperado. Vuelve a intentar más adelante `)
            });
        }

    })
    modal.append(contenedor)
}
