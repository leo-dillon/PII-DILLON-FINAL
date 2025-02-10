<?php
class Secciones {
    private $seccion;
    private $texto;
    private $titulo;
    private $visible;

    public function getSeccion(): string {
        return $this -> seccion;
    }
    public function getTexto(): string {
        return $this -> texto;
    }
    public function getTitulo(): string {
        return $this -> titulo;
    }
    public function getVisible(): bool {
        return $this -> visible;
    }

    public static function seccionesVisibles(): array {
        $seccionesVisibles = [];
        $JSON_SECCIONES = file_get_contents('./JSON/paginas.json');
        $JSON_SECCIONES_DATOS = json_decode($JSON_SECCIONES);
        foreach( $JSON_SECCIONES_DATOS as $value){
            if($value -> visible){
                $seccion = new self();
                $seccion -> seccion = $value -> seccion;
                $seccion -> titulo = $value -> titulo;
                $seccionesVisibles[] = $seccion;
            }
        }
        return $seccionesVisibles;
    }

    public static function seccionesValidas(): array {
        $seccionesValidas = [];
        $JSON_SECCIONES = file_get_contents('./JSON/paginas.json');
        $JSON_SECCIONES_DATOS = json_decode($JSON_SECCIONES);
        foreach( $JSON_SECCIONES_DATOS as $value ){
            $seccionesValidas[] = $value -> seccion;
        }
        return $seccionesValidas;
    }
}
?>