import {exito} from "../../../componentes/modal/exito.js"
import {error} from "../../../componentes/modal/error.js"
export function crearUsuario(formData){
    
    fetch('./actions/usuarios/procesar_registro.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data){
            exito('', "Registro exitoso", "?sec=iniciarSesion")   
        }else{
            error('', "Se podujo un error al registrar. Intente denuevo más adelante")
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en el registro');
    });
}