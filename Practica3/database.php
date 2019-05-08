<?php

class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="taw2019";
    private $dbpass="taw123";
    private $dbname="practica3";

    function __construct(){
        $this->connect_db();
    }
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
    public function create($nombres, $apellidos, $telefono, $direccion, $correo_electronico){
        
    }
}