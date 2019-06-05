<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=practica7","root","taw123");
		return $link;

	}

}

?>