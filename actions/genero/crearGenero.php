<?php 
    include '../../clases/modelos/Generos.php';
    include '../../clases/servicios/Conexion.php';
    include '../../clases/modelos/Productos.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["genero"];  
        $respuesta = Generos::crearGenero($nombre);
        echo json_encode($respuesta);
    }
?>