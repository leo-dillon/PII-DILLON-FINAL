import { error } from "../../componentes/modal/error.js";
import { exito } from "../../componentes/modal/exito.js";

export function eliminarProductoSeleccionado(id){
    let datos = new FormData()
    datos.append('id', id)
    fetch("../actions/productos/eliminarProducto.php",{
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data){
            exito("", `Se elimino el producto correctamente`, "?sec=productos")
        }else{
            error("", "El id del producto seleccionado no existe")
        }
    })
    .catch(er => {
        console.log(er)
        error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
    });
}   