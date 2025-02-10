<main>
<section class="contacto">
    <h1>Contacto</h1>
    <p>Si tienes alguna duda o consulta, no dudes en escribirnos.</p>
    
    <form action="procesar_contacto.php" method="POST" class="contacto-form" onsubmit="return validarFormulario()">
        <div class="form-group">
            <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
        </div>

        <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email:</label>
            <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
        </div>

        <div class="form-group">
            <label for="mensaje"><i class="fas fa-comment"></i> Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" placeholder="Tu mensaje" required></textarea>
        </div>

        <input type="submit" value="Enviar" class="btn-enviar">
    </form>
</section>

</main>

<style scoped>
    /* Estilos para la sección de contacto */
.contacto {
    padding: 40px;
    background-color: var(--white--80);
    text-align: center;
}

.contacto h1 {
    font-size: var(--font--5);
    margin-bottom: 20px;
    color: var(--dark--100); /* Texto más visible */
}

.contacto p {
    font-size: var(--font--2);
    margin-bottom: 30px;
    color: var(--dark--60); /* Un tono gris más oscuro */
}

.contacto-form {
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.form-group label {
    font-size: var(--font--2);
    color: var(--dark--100); /* Texto más oscuro */
    margin-bottom: 8px;
}
.form-group i {
    color: var(--primary-dark); /* Iconos con color primario oscuro */
}
.form-group input,
.form-group textarea {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid var(--grey--30);
    font-size: var(--font--1);
    width: 100%;
    box-sizing: border-box;
    color: var(--dark--100);
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary);
}

.btn-enviar {
    background-color: var(--primary); /* Botón más visible */
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: var(--font--2);
    cursor: pointer;
    color: var(--dark--100);
    transition: background-color 0.3s;
}

.btn-enviar:hover {
    background-color: var(--primary-dark);
}

</style>

<script>
    function validarFormulario() {
    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const mensaje = document.getElementById("mensaje").value;

    if (nombre === "" || email === "" || mensaje === "") {
        alert("Por favor, completa todos los campos.");
        return false;
    }
    return true;
}
</script>