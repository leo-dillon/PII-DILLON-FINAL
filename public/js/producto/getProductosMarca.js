import { producto } from "../../../componentes/producto.js"
import { error } from "../../../componentes/modal/error.js"

export function getProductosMarca(marca, donde){
    fetch("./actions/productos/getProductoMarca.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `marca=${encodeURIComponent(marca)}`
    })
    .then(res => res.json())
    .then( data => {
        let contenedorProductos = document.querySelector(donde)
        if(data.length < 1){
            contenedorProductos.innerHTML = `<h3>No se encontraron productos con marca ${marca}</h3>`
        }else{
            contenedorProductos.innerHTML = ''
            data.forEach(value => {
                let productoCreado = producto(value)
                contenedorProductos.append(productoCreado)
            })
        }
    })
    .catch(er => {
        error('', "Se produjo un error inesperado al buscar los productos. Intente denuevo más tarde")
    })
}