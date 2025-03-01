<?php 
    include '../../clases/modelos/Usuario.php';
    include '../../clases/servicios/Conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger los datos del formulario
        $email = $_POST['email'];
        $password = $_POST['contraseña'];
        
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT * FROM usuario WHERE email = :email";
        $PDOStatement = $conexion -> prepare($query);
        $PDOStatement -> execute(["email" => $email]);
        $usuario = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($password, $usuario['password'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];
                
                echo true;
            } else {
                echo json_encode("contraseña");
            }
        } else {
            echo json_encode("usuario");
        }
    }

?>