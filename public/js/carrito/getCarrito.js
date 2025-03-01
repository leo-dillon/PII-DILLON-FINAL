export async function getCarrito(usuario_id){
    let form = new FormData()
    form.append('usuario_id', usuario_id)
    return fetch('./actions/carrito/getCarrito.php',{
        method: "POST",
        body: form
    })
    .then(res => res.json())
    .then(datos => datos)
    .catch(er => error("", "Se podujo un error inesperado al intentar traer tu carrito"))
}