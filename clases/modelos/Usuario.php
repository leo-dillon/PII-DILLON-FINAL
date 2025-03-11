<?php class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    private $password;
    private $fecha_de_creacion;
    private $ultimo_acceso;
    private $rol;

    public function getId(){
        return $this -> id;
    }

    public function getNombre() {
        return $this -> nombre;
    }

    public function getEmail() {
        return $this -> email;
    }

    public function getTelefono(){
        return $this -> telefono;
    }

    public function getDireccion(){
        return $this -> direccion;
    }

    public function getPassword(){
        return $this -> password;
    }

    public function getFechaDeCreaccion(){
        return $this -> fecha_de_creacion;
    }

    public function getUltimaAcceso(){
        return $this -> ultimo_acceso;
    }

    public function getRol(){
        return $this -> rol;
    }

    public static function traerDatoUsuario($email){
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT nombre, email, telefono, direccion, fecha_creacion FROM `usuario` WHERE email = :email";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement -> execute([
            'email' => $email
        ]);
        $datosUSer = $PDOStatement -> fetch();
        return $datosUSer;
    }

    public static function usuarioLogeado(){
        $email = '';
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            if( filter_var($email, FILTER_VALIDATE_EMAIL) ){
                if(!self::existeUsuario($email)){
                    session_unset();    
                    session_destroy();
                    return false;
                }else{
                    return true;
                }
            }
        }else{
            return false;
        }
    }

    public static function existeUsuario($email){
        $conexion = (new Conexion()) -> getConexion();
        $query = "SELECT * FROM `usuario` WHERE email = :email";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> execute([
            'email' => $email
        ]);
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public static function crearUsuario($nombre, $email, $telefono, $direccion, $password){
        $conexion = (new Conexion()) -> getConexion();
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO 
            usuario(nombre, email, telefono, direccion, password)
            VALUES(:nombre, :email, :telefono, :direccion, :password)
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> execute([
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'password' => $passwordHash
        ]);
        if ($PDOStatement->rowCount() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

    public static function ediarDato($email, $campo, $nuevoValor){
        $conexion = (new Conexion()) -> getConexion();
            $query = " UPDATE
                usuario
                SET $campo = :nuevoValor
                WHERE email = :email
        ";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement -> execute([
            'email' => $email,
            'nuevoValor' => $nuevoValor
        ]);
        $res = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
}