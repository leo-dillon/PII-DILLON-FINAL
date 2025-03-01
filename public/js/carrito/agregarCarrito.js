import {exito} from "../../../componentes/modal/exito.js"
import {error} from "../../../componentes/modal/error.js"

export async function agregarCarrito( formData, action = false ){
    return fetch("./actions/carrito/agregarCarrito.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data == "los datos estan vacios"){
            error("", data)
        }else{
            if(action){
                return true
            }else{
                exito("", data)
                return true

            }
        }
        
    })
    .catch(er => error("", "Se produjo un error inesperado al agregar el producto al carrito, intentalo denuevo más tarde") )
}