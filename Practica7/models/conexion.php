<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=practica7","taw2019","taw123");
		return $link;

	}

}

?>