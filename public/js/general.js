
export function crearElemento(elemento, atributos = {}, texto = ''){
    let elementoCreado = document.createElement(elemento)
    Object.entries(atributos).forEach(([key, value]) => {
        elementoCreado.setAttribute(key, value)
    });
    elementoCreado.innerText = texto
    return elementoCreado
}