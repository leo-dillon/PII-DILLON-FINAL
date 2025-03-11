<?php
include '../../clases/modelos/Usuario.php';
include '../../clases/servicios/Conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT id, nombre, email, telefono, direccion, fecha_creacion FROM `usuario` WHERE email = :email";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute([
            'email' => $email
        ]);
        $datosUer = $PDOStatement -> fetch();
        echo json_encode([
            'id' => $datosUer['id'],
            'nombre' => $datosUer['nombre'],
            'email' => $datosUer["email"],
            'telefono' => $datosUer['telefono'],
            'direccion' => $datosUer['direccion'],
            'fecha_creacion' => $datosUer['fecha_creacion']
        ]);
    } else {
        echo json_encode(['error' => 'Email no recibido']);
    }
}else{
    echo "error";
}
?>