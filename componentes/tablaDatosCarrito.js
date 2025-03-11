import { getCarrito } from "../public/js/carrito/getCarrito.js"
import { agregarCarrito } from "../public/js/carrito/agregarCarrito.js"
import { crearElemento } from "../public/js/general.js"
import { error } from "../componentes/modal/error.js"
import { eliminarProducto } from "./modal/eliminarProducto.js"

export async function tablaDatosCarrito(contenedorTablaDatos, usuario_id){
    let datosCarrito = await getCarrito(usuario_id)
    let precioFinal = 0
    let cantidadFinal = 0
    if(datosCarrito.length != 0){
        let contenedor_h2 = crearElemento("h2", {
            class: "carrito_titulo"
        }, "CARRITO DE COMPRAS")
        contenedorTablaDatos.append(contenedor_h2)
        datosCarrito.forEach(dato => {
            precioFinal += dato.precio * dato.cantidad
            cantidadFinal += dato.cantidad
            let contenedor_div = crearElemento('div', {
                class: "carrito"
            }, "")
            let contenedor_div_picture = crearElemento('picture', {}, "")
            let contenedor_div_picture_img = crearElemento('img', {
                src: dato.imagen,
                alt: `imagen de ${dato.nombre}`
            }) 
            let contenedor_div_h3 = crearElemento('h3', {}, dato.nombre)
            let contenedor_div_form = crearElemento('form', {
                action: "../public/js/carrito/agregarCarrito.js",
                method: "POST",
                "data-usuarioID": usuario_id,
                "data-productoID": dato.id
            })
            let contenedor_div_form_btnMas = crearElemento('button', {
                type: "button",
                id: "mas"
            })
            let contenedor_div_form_btnMas_i = crearElemento('i', {
                class:'fa-solid fa-plus'
            }, ''
            )
            contenedor_div_form_btnMas.append(contenedor_div_form_btnMas_i)
            let contenedor_div_form_input = crearElemento('input',{
                type: "number",
                name: "cantidad",
                value: dato.cantidad,
                min: "1",
                class: "cantidad",
                id: "cantidad",
                disabled: ''
            })
            let contenedor_div_form_btnMenos = crearElemento('button', {
                type: "button",
                id: "menos"
            })
            let contenedor_div_form_btnMenos_i = crearElemento('i', {
                class: "fa-solid fa-minus"
            })
            contenedor_div_form_btnMenos.append(contenedor_div_form_btnMenos_i)
            contenedor_div_form_btnMas.append(contenedor_div_form_btnMas_i)
            contenedor_div_form.append(contenedor_div_form_btnMenos, contenedor_div_form_input, contenedor_div_form_btnMas)
            let contenedor_div_p = crearElemento('p', {}, `$${dato.precio * dato.cantidad}`)
            let contenedor_div_vaciarCarrito = crearElemento('button', {
                type: "button",
                id: "vaciar",
                title: "Eliminar Producto"
            })
            let contenedor_div_vaciarCarrito_i = crearElemento('i', {
                class: "fa-solid fa-trash"
            })
            contenedor_div_vaciarCarrito.append(contenedor_div_vaciarCarrito_i)
            contenedor_div_picture.append(contenedor_div_picture_img)
            contenedor_div.append(contenedor_div_picture, contenedor_div_h3, contenedor_div_form ,contenedor_div_p, contenedor_div_vaciarCarrito)
            

            contenedor_div_vaciarCarrito.addEventListener('click', () => {
                let usuario_id = contenedor_div_form.getAttribute('data-usuarioID')
                let producto_id = contenedor_div_form.getAttribute('data-productoID')
                let cantidad = contenedor_div_form_input.value
                eliminarProducto(
                    producto_id, 
                    usuario_id, 
                    dato.imagen, 
                    dato.nombre, 
                    contenedor_div, 
                    dato.precio, 
                    actualizarPrecioFinal,
                    cantidad
                )
            })
            contenedor_div_form_btnMas.addEventListener('click', async (event) => {
                event.preventDefault()
                if(contenedor_div_form_input.value >= dato.stock){
                    error("", "No tenemos más Stock en la tienda")
                }else{
                    let form = new FormData()
                    let usuario_id = contenedor_div_form.getAttribute('data-usuarioID')
                    let producto_id = contenedor_div_form.getAttribute('data-productoID')
                    form.append("usuario_id", usuario_id)
                    form.append("producto_id", producto_id)
                    form.append("cantidad", 1)
                    let valor = await agregarCarrito(form, true)
                    contenedor_div_form.classList.add('loading')
                    contenedor_div_form_input.value++
                    if(valor){
                        setTimeout(() => {
                            contenedor_div_form.classList.remove('loading')
                            contenedor_div_p.innerText = `$${dato.precio * contenedor_div_form_input.value}`
                            actualizarPrecioFinal(dato.precio)
                        }, 300);
                    }
                }
            })
            contenedor_div_form_btnMenos.addEventListener('click', async (event) => {
                event.preventDefault()
                let usuario_id = contenedor_div_form.getAttribute('data-usuarioID')
                let producto_id = contenedor_div_form.getAttribute('data-productoID')
                if(contenedor_div_form_input.value <= 1){
                    eliminarProducto(
                        producto_id, 
                        usuario_id, 
                        dato.imagen, 
                        dato.nombre, 
                        contenedor_div, 
                        dato.precio, 
                        actualizarPrecioFinal
                    )
                }else{
                    let form = new FormData()
                    form.append("usuario_id", usuario_id)
                    form.append("producto_id", producto_id)
                    form.append("cantidad", -1)
                    let valor = await agregarCarrito(form, true)
                    contenedor_div_form.classList.add('loading')
                    contenedor_div_form_input.value--
                    if(valor){
                        setTimeout(() => {
                            contenedor_div_form.classList.remove('loading')
                            contenedor_div_p.innerText = `$${dato.precio * contenedor_div_form_input.value}`
                            actualizarPrecioFinal(-(dato.precio))
                        }, 300);
                    }
                }
            })
            contenedor_div_form.addEventListener('submit', (event) => {
                event.preventDefault()
                console.log(event)
            })
            contenedorTablaDatos.append(contenedor_div)
        });
        let contenedor_divPago = crearElemento('div',{
            class: "resumenCarrito"
        })
        let contenedor_divPago_h3 = crearElemento('h3', {}, "Resumen de compra")
        let contenedor_divPago_pProductos = crearElemento('p', {
            class: "cantidadProductos" 
        }, `cantidad de productos: `) 
        let contenedor_divPago_pProductos_span = crearElemento('span', {}, cantidadFinal)
        contenedor_divPago_pProductos.append(contenedor_divPago_pProductos_span)
        let contenedor_divPago_pPrecioFinal = crearElemento('p', {
            class: "precioFinal"
        }, `TOTAL: `)
        let contenedor_divPago_pPrecioFinal_span = crearElemento('span', {},
            `$${precioFinal}`
        )
        let contenedor_btnPago = crearElemento('a',{
            href: "#PAGAR",
            class: "btnPago"
        }, "CONTINUAR LA COMPRA")
        contenedor_divPago_pPrecioFinal.append(contenedor_divPago_pPrecioFinal_span)
        contenedor_divPago.append(contenedor_divPago_h3, contenedor_divPago_pProductos, contenedor_divPago_pPrecioFinal, contenedor_btnPago)
        contenedorTablaDatos.append(contenedor_divPago)
    }else{
        let contenedor_h2 = crearElemento("h2", {
            class: "carrito_titulo"
        }, "CARRITO DE COMPRAS VACIO")  
        let contenedor_a = crearElemento('a', {
            href: "?sec=tienda",
            class: "tienda"
        }, "Busca productos para agregar al carrito")
        contenedorTablaDatos.append(contenedor_h2, contenedor_a)
    }
}

function actualizarPrecioFinal(valor, cantidad = 1){
    let contenedorPrecioFinal = document.querySelector("p.precioFinal span")
    let contenedorCantidad = document.querySelector('p.cantidadProductos span')
    let precioFinal = parseInt(contenedorPrecioFinal.innerText.replace("$", ''))
    let cantidadProducto = parseInt(contenedorCantidad.innerText)
    if(valor > 0){
        contenedorCantidad.innerText = cantidadProducto + cantidad
    }else{
        contenedorCantidad.innerText = cantidadProducto - cantidad
    }
    contenedorPrecioFinal.innerText = `$${precioFinal + parseInt(valor)}`


}