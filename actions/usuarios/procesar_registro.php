<?php
include '../../clases/modelos/Usuario.php';
include '../../clases/servicios/Conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $password = $_POST['contraseña'];

    if(Usuario::existeUsuario($email)){
        echo true;
    }else{
        echo false;
        if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($direccion) && !empty($password)) {
            $resultado = Usuario::crearUsuario($nombre, $email, $telefono, $direccion, $password);
    
            echo json_encode($resultado);
        } else {
            echo json_encode(false);
        }
    }

}
?>