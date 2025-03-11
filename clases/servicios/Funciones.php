<?php class Funciones{
        public static function seccionActual(){
            if(isset($_SESSION['rol']) && $_SESSION['rol'] == "admin" ){
                $seccion = isset($_GET['sec']) ? $_GET['sec']: 'inicioAdmin';
            }else{
                $seccion = isset($_GET['sec']) ? $_GET['sec']: 'inicio';
            }
            return $seccion;
        }

        public static function traerDatoUrl(String $datoABuscar, String $default = ""){
            $seccion = isset($_GET[$datoABuscar]) ? $_GET[$datoABuscar]: $default;
            return $seccion;
        }

        public static function mostrar($a) : void {
            echo '<pre>';
            print_r($a);
            echo '</pre>';
        }

        public static function generarSelect($title, $name , $opciones, $seleccionado = ''): string {
            $select = "<div>";
            $select .= "<label for='{$name}'>{$title}:</label>";
            $select .= "<select name='{$name}' id='{$name}'>";
            $select .= "<option style='display:none' value='' disebled select>{$opciones[0]}</option>";
            foreach ($opciones as $opc) {
                $select .= "<option value='{$opc}'>{$opc}</option>";
            }
            $select .= "</select>";
            $select .= "</div>";
            return $select;
        }

        public static function generarProducto($producto) : string {
            $imagen = $producto['imagen'];
            $nombre = $producto['nombre'];
            $descripcion = $producto['descripcion'];
            $precio = $producto['precio'];
            $id = $producto['id'];
            $prodcuto = "<article class='producto'>
                        <picture>";
            $prodcuto .= "<img src='$imagen' alt='imagen $nombre'>";
            $prodcuto .= "</picture>";
            $prodcuto .= "<h3> $nombre </h3>";
            $prodcuto .= "<p class='descripcion'>$descripcion</p>
                        <div>";
            $prodcuto .= "<p class='precio'>$ $precio</p>";
            $prodcuto .= "<a href='?sec=producto&id=$id' class='hover_2'>Comprar</a>
                        </div>
                    </article>";
            return $prodcuto;
        }
    }