
import { crearElemento } from "../../../public/js/general.js";
import { error } from "../../../componentes/modal/error.js";
import { exito } from "../../../componentes/modal/exito.js";


export function editarProducto(tabla, marcas, generos, familiaOlfativas, concentraciones){
    let modal = document.querySelector('.modal') 
    let nombreAnterior = tabla.nombre
    modal.innerHTML = ''
    modal.classList.add('Activado')
    let contenedor = crearElemento('div', {
        class: "contenedorModal editarProducto"
    })
    let contenedor_h2 = crearElemento('h2', {}, `Editar Campo ${tabla.nombre}`)
    let contenedor_picture = crearElemento('picture', {})
    let contenedor_picture_img = crearElemento('img', {
        src: `.${tabla.imagen}`,
        alt: `imagen de ${tabla.nombre}`
    })
    contenedor_picture.append(contenedor_picture_img)
    let contenedor_form = crearElemento('form', {
        method: "POST",
        action: "",
        id: "editProductoForm",
        "data-id": tabla.id
    })
    let contenedor_form_labelNombre = crearElemento('label', {
        for: "nombre"
    }, "Nuevo nombre")
    let contenedor_form_inputNombre = crearElemento('input', {
        type: "text",
        name: "nombre",
        id: "nombre",
        min: 3,
        value: tabla.nombre,
        required: ""
    })
    let contenedor_form_labelDescripcion = crearElemento('label', {
        for: "descripcion"
    }, "Nueva Descripción")
    let contenedor_form_textAreaDescripcion = crearElemento('textarea',{
        name: "descripcion",
        id: "descripcion",
        min: 10,
        required: ""
    })
    contenedor_form_textAreaDescripcion.innerText = tabla.descripcion
    let contenedor_form_labelPrecio = crearElemento('label', {
        for: "precio"
    }, "Nuevo precio")
    let contenedor_form_inputPrecio = crearElemento('input', {
        type: "number",
        name: "precio",
        id: "precio",
        min: 0,
        value: tabla.precio,
        requiered: ""
    })
    let contenedor_form_labelStock = crearElemento('label', {
        for: "stock"
    }, "Nuevo stock")
    let contenedor_form_inputStock = crearElemento('input', {
        type: "number",
        name: "stock",
        id: "stock",
        value: tabla.stock,
        required: ""
    })
    let contenedor_form_labelCapacidad = crearElemento('label', {
        for: "capacidad"
    }, "Nuevo capacidad")
    let contenedor_form_inputCapacidad = crearElemento('input', {
        type: "number",
        name: "capacidad",
        id: "capacidad",
        value: tabla.capacidad,
        required: ""
    })
    let contenedor_form_labelMarcas = crearElemento('label', {
        for: "marca"
    }, "Nueva Marca")
    let contenedor_form_selectMarcas = crearElemento('select', {
        name: "marca",
        id: "marca",
        value: tabla.marcaNombre,
        required: ""
    })
    marcas.forEach(marca => {
        let contenedor_form_selectMarcas_option = crearElemento('option', {
            value: marca.id
        }, marca.nombre)
        contenedor_form_selectMarcas.append(contenedor_form_selectMarcas_option)
    });
    let contenedor_form_labelGenero = crearElemento('label', {
        for: "genero"
    }, "Nuevo Genero")
    let contenedor_form_selectGenero = crearElemento('select', {
        name: "genero",
        id: "genero",
        value: tabla.generoNombre,
        required: ""
    })
    generos.forEach(genero => {
        let contenedor_form_selectGenero_option = crearElemento('option', {
            value: genero.id
        }, genero.nombre)
        contenedor_form_selectGenero.append(contenedor_form_selectGenero_option)
    });
    let contenedor_form_labelFamiliaOlfativa = crearElemento('label', {
        for: "familiaOlfativa"
    }, "Nuevo Aroma")
    let contenedor_form_selectFamiliaOlfativa = crearElemento('select', {
        name: "familiaOlfativa",
        id: "familiaOlfativa",
        value: tabla.familiaOlfativaNombre,
        required: ""
    })
    familiaOlfativas.forEach(familiaOlfativa => {
        let contenedor_form_selectFamiliaOlfativa_option = crearElemento('option', {
            value: familiaOlfativa.id
        }, familiaOlfativa.nombre)
        contenedor_form_selectFamiliaOlfativa.append(contenedor_form_selectFamiliaOlfativa_option)
    });
    let contenedor_form_labelConcentraciones = crearElemento('label', {
        for: "concentracion"
    }, "Nueva Concetración")
    let contenedor_form_selectConcentraciones = crearElemento('select', {
        name: "concentracion",
        id: "concentracion",
        value: tabla.concentracionNombre,
        required: ""
    })
    concentraciones.forEach(concentracion => {
        let contenedor_form_selectConcentraciones_option = crearElemento('option', {
            value: concentracion.id
        }, concentracion.nombre)
        contenedor_form_selectConcentraciones.append(contenedor_form_selectConcentraciones_option)
    });
    let contenedor_form_inputSubmit = crearElemento('input', {
        type:"submit",
        value:"Enviar"
    })

    contenedor_form.append(
        contenedor_form_labelNombre, contenedor_form_inputNombre,
        contenedor_form_labelDescripcion, contenedor_form_textAreaDescripcion,
        contenedor_form_labelPrecio, contenedor_form_inputPrecio,
        contenedor_form_labelStock, contenedor_form_inputStock,
        contenedor_form_labelCapacidad, contenedor_form_inputCapacidad,
        contenedor_form_labelMarcas, contenedor_form_selectMarcas,
        contenedor_form_labelGenero, contenedor_form_selectGenero,
        contenedor_form_labelFamiliaOlfativa, contenedor_form_selectFamiliaOlfativa,
        contenedor_form_labelConcentraciones, contenedor_form_selectConcentraciones,
        contenedor_form_inputSubmit
    )
    contenedor_form.addEventListener('submit', (event) => {
        event.preventDefault()
        let productoID = contenedor_form.getAttribute('data-id')
        let datos = new FormData(contenedor_form);
        let validar = true
        datos.append('id', productoID)
        datos.append('nombreAnterior', nombreAnterior)
        if(datos.get("nombre").length <= 3){
            validar = false
            contenedor_form_labelNombre.innerHTML = `
                Nuevo Nombre
                <br> 
                <small style='color:red'>Debe tener más de 3 caracteres</small>
            `
            contenedor_form_inputNombre.classList.add("error")
        }
        if(datos.get("descripcion").length <= 5){
            validar = false
            contenedor_form_labelDescripcion.innerHTML = `
                Nueva Descripción
                <br> 
                <small style='color:red'>Debe tener más de 5 caracteres</small>
            `
            contenedor_form_textAreaDescripcion.classList.add("error")
        }
        if(datos.get("precio") <= 0){
            validar = false
            contenedor_form_labelPrecio.innerHTML = `
                Nuevo Precio
                <br> 
                <small style='color:red'>El precio debe ser mayor a 0</small>
            `
            contenedor_form_inputPrecio.classList.add("error")
        }
        if(datos.get("stock") <= 0){
            validar = false
            contenedor_form_labelStock.innerHTML = `
                Nuevo Stock
                <br> 
                <small style='color:red'>El stock debe ser mayor a 0</small>
            `
            contenedor_form_inputStock.classList.add("error")
        }
        if(datos.get("capacidad") <= 0){
            validar = false
            contenedor_form_labelCapacidad.innerHTML = `
                Nueva Capacidad
                <br> 
                <small style='color:red'>La capacidad debe ser mayor a 0</small>
            `
            contenedor_form_inputCapacidad.classList.add("error")
        }
        if(validar){
            fetch("../actions/productos/editarProducto.php", {
                method: "POST",
                body: datos
            })
            .then(res => res.json())
            .then(data => {
                if(data == "existe"){
                    error("", "Ya existe un Producto con ese nombre")
                }else if(data){
                    exito("", `Se edito el producto correctamente`, "?sec=productos")
                }else{
                    error("", "Los datos ingresados no son correctos")
                }
            })
            .catch(er => {
                error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
            });
        }

    })
    contenedor.append(contenedor_h2, contenedor_picture, contenedor_form)
    modal.append(contenedor)
}
