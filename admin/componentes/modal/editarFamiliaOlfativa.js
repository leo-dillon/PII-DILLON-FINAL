
import { crearElemento } from "../../../public/js/general.js";
import { error } from "../../../componentes/modal/error.js";
import { exito } from "../../../componentes/modal/exito.js";


export function editarFamiliaOlfativa(FamiliaOlfativaID, nombre){
    let modal = document.querySelector('.modal') 
    modal.innerHTML = ""
    modal.classList.add('Activado')
    let contenedor = crearElemento('div', {
        class: "contenedorModal editarDato"
    })
    let contenedor_h2 = crearElemento('h2', {}, `Editar Familia Olfativa`)
    let contenedor_form = crearElemento('form', {
        method: "POST",
        action: "",
        id: "editForm",
        "data-id": FamiliaOlfativaID 
    })
    let contenedor_form_label = crearElemento("label", {
        for: "valor"
    }, 
    `Editar Familia Olfativa:`
    )
    let contenedor_form_inputText = crearElemento(
        "input",
        {
            type: "text",
            id: "familiaOlfativa",
            name: "familiaOlfativa",
            required: "",
            value: nombre
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
        datos.append("id", contenedor_form.getAttribute('data-id'))
        if(datos.get('familiaOlfativa').length < 3){
            contenedor_form_label.innerHTML = `
                Editar Fragancia
                <br> 
                <small style='color:red'>Debe contener más de 3 caracteres</small>
            `
            contenedor_form_inputText.classList.add("error")
        } else if(datos.get("familiaOlfativa").length >= 40){
            validar = false
            contenedor_form_label.innerHTML = `
                Editar Fragancia
                <br> 
                <small style='color:red'>Debe tener menos de 20 caracteres</small>
            `
            contenedor_form_inputText.classList.add("error")
        } else{
            fetch("../actions/familiaOlfativa/editarFamiliaOlfativa.php", {
                method: "POST",
                body: datos
            })
            .then(res => res.json())
            .then(data => {
                if(data == "existe"){
                    error("", "Ya existe una Fragancia con ese nombre")
                }else if(data){
                    exito("", `Se edito el campo correctamente`, "?sec=fragancias")
                }else{
                    error("", "Los datos ingresados no son correctos")
                }
            })
            .catch(er => {
                console.log(er)
                modal.innerHTML = ''
                error("", `Se produjo un error inesperado. Vuelve a intentar más adelante `)
            });
        }

    })
    modal.append(contenedor)
}
