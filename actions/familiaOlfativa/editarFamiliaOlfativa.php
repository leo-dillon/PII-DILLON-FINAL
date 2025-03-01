<?php 
    include '../../clases/modelos/FamiliasOlfativas.php';
    include '../../clases/servicios/Conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["familiaOlfativa"];  
        $id = $_POST["id"];  
        if(FamiliasOlfativas::existeFamiliaOlfativa($nombre)){
            $respuesta = "existe";
        }else{
            $respuesta = FamiliasOlfativas::editarFamiliaOlfativa($id, $nombre);
        }
        echo json_encode($nombre);
    }
?>