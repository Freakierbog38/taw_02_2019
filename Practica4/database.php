<?php

// Se crea la clase Database, la cual será responsable de la conexión y acciones a la base de datos
class Database{
    //Los atributos de la conexión
    private $con;
    private $dbhost="localhost";
    private $dbuser="taw2019";
    private $dbpass="taw123";
    private $dbname="practica3";

    // Constructor, que llama al método connect_db
    function __construct(){
        $this->connect_db();
    }
    // Método que realiza la conexión a la base de datos
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    // Método que realiza una inseción en la tabla
    public function create($nombres, $apellidos, $telefono, $direccion, $correo_electronico){
        $sql = "INSERT INTO `clientes` (nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres', '$apellidos', '$telefono', '$direccion', '$correo_electronico')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        } else{
            return false;
        }
    }

    // Consulta de todos los registros de la tabla
    public function read(){
        $sql = "SELECT * FROM clientes";
        $res = mysqli_query($this->con, $sql);
        return $res;
    }

    // Consulta de un solo registro de la tabla, identificado mediante el id
    public function single_record($id){
        $sql = "SELECT * FROM clientes WHERE id='$id'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    // Actualización de un registro existente en la tabla
    public function update($nombres, $apellidos, $telefono, $direccion, $correo_electronico, $id){
        $sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id='$id'";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        } else{
            return false;
        }
    }

    // Eliminación de un registro previamente ingresado
    public function delete($id){
        $sql = "DELETE FROM clientes WHERE id='$id'";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        } else{
            return false;
        }
    }

    // Método que da funcionalidad al login
    public function login($nombre){
        // Almacena la consulta
        $sql = "SELECT * FROM user WHERE nombre='$nombre'";
        // Ejecuta la consulta con la conexión guardada
        $res = mysqli_query($this->con, $sql);
        // Guarda los datos que regresa la consulta
        $return = mysqli_fetch_object($res);
        return $return;
    }
}