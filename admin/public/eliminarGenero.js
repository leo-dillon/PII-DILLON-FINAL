import { error } from "../../componentes/modal/error.js";
import { exito } from "../../componentes/modal/exito.js";

export function eliminarGenero(id){
    let datos = new FormData()
    datos.append('id', id)
    fetch("../actions/genero/eliminarGenero.php",{
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data == "existe"){
            error("", "Debes eliminar los productos asociados con esta genero antes")
        }else if(data){
            exito("", `Se elimino la genero correctamente`, "?sec=generos")
        }else{
            error("", "El id de la genero seleccionada no existe")
        }
    })
    .catch(er => {
        console.log(er)
        error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
    });
}   