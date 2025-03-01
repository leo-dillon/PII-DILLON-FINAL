import { error } from "../../componentes/modal/error.js";
import { exito } from "../../componentes/modal/exito.js";

export function eliminarMarca(id){
    let datos = new FormData()
    datos.append('id', id)
    fetch("../actions/marca/eliminarMarca.php",{
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data == "existe"){
            error("", "Debes eliminar los productos asociados con esta marca antes")
        }else if(data){
            exito("", `Se elimino la marca correctamente`, "?sec=marcas")
        }else{
            error("", "El id de la marca seleccionada no existe")
        }
    })
    .catch(er => {
        console.log(er)
        error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
    });
}   