import {exito} from "../../../componentes/modal/exito.js"
import {error} from "../../../componentes/modal/error.js"

export function deleteProductoCarrito(usuario_id, producto_id){
    let data = new FormData()
    data.append("usuario_id", usuario_id)
    data.append("producto_id", producto_id)
    fetch("./actions/carrito/deleteProducto.php", {
        method: "POST",
        body: data
    })
    .then( res => res.json())
    .then( data => {
        if(data == "los datos estan vacios"){
            error("", data)
        }else{
            exito("", data)
        }
    })
    .catch(er => error("", "Se produjo un error inesperado al eliminiar producto del carrito, intentalo denuevo más tarde") )

}