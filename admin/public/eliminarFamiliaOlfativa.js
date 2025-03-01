import { error } from "../../componentes/modal/error.js";
import { exito } from "../../componentes/modal/exito.js";

export function eliminarFamiliaOlfativa(id){
    let datos = new FormData()
    datos.append('id', id)
    fetch("../actions/familiaOlfativa/eliminarFamiliaOlfativa.php",{
        method: "POST",
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data == "existe"){
            error("", "Debes eliminar los productos asociados con este aroma antes")
        }else if(data){
            exito("", `Se elimino la fragancia correctamente`, "?sec=fragancias")
        }else{
            error("", "El id de la fragancia seleccionada no existe")
        }
    })
    .catch(er => {
        console.log(er)
        error("", `Se produjo un error inesperado. Vuelva a intentarlo más adelante.`)
    });
}   