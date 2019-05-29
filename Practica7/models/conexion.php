<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=recupractica6","taw2019","taw123");
		return $link;

	}

}

?>