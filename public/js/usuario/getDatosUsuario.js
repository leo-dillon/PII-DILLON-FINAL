export function getDatosUsuario(email){
    return fetch('./actions/usuarios/datosUsuario.php',{
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `email=${encodeURIComponent(email)}`   
    })
        .then(res => res.json())
        .then(datosUsuario => datosUsuario)
        .catch(er => false)
}