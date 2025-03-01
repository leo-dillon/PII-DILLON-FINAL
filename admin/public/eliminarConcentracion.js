import { error } from "../../componentes/modal/error.js";
import { exito } from "../../componentes/modal/exito.js";

export function eliminarConcentracion(id){
    let datos = new FormData()
    datos.append('id', id)
    fetch("../actions/concentracion/eliminarConcentracion.php",{
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data == "existe"){
            error("", "Debes eliminar los productos asociados con esta concentracion antes")
        }else if(data){
            exito("", `Se elimino la concentracion correctamente`, "?sec=concentraciones")
        }else{
            error("", "El id de la concentracion seleccionada no existe")
        }
    })
    .catch(er => {
        console.log(er)
        error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
    });
}   