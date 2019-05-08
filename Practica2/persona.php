<?php
    // Definir la clase persona
    class persona{
        // Definir propiedades
        public $nombre;
        public $edad;
        public $altura;
        public $peso;

        // Definir método obtención de datos
        // Getters
        public function getNombre(){
            return $this->nombre;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function getPeso(){
            return $this->peso;
        }
        public function getAltura(){
            return $this->altura;
        }

        // Definir métodos asignación de datos
        // Setters
        public function setNombre($valor){
            $this->nombre = $valor;
        }
        public function setEdad($valor){
            $this->edad = $valor;
        }
        public function setPeso($valor){
            $this->peso = $valor;
        }
        public function setAltura($valor){
            $this->altura = $valor;
        }

        // Método de cálculo de IMC mediante los métodos get
        public function imc2(){
            return $this->getPeso() / ($this->getAltura() * $this->getAltura());
        }

        // Método de cálculo de IMC accediendo a las propiedades
        public function imc(){
            return $this->peso / ($this->altura * $this->altura);
        }

        private function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        //Método que captura la información de POST
        public function capturar(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["nombre"])) {
                    $this->nombre = $this->test_input($_POST["nombre"]);
                }
                if (!empty($_POST["edad"])) {
                    $this->edad = $this->test_input($_POST["edad"]);
                }
                if (!empty($_POST["peso"])) {
                    $this->peso = $this->test_input($_POST["peso"]);
                }
                if (!empty($_POST["altura"])) {
                    $this->altura = $this->test_input($_POST["altura"]);
                }
                echo $this->subirBD();
            }
        }

        public function subirBD(){
            // Se crea un array asociativo con los datos necesarios
            $datos = [
                'nombre' => $this->nombre,
                'edad' => $this->edad,
                'peso' => $this->peso,
                'altura' => $this->altura,
                'imc' => $this->imc()
            ];
            // Se crea la conexión a mysql con PDO
            $mbd = new PDO('mysql:host=localhost;dbname=practica2', 'taw2019', 'taw123');
            // Se prepara la solicitud
            $stmt = $mbd->prepare("INSERT INTO persona(nombre, edad, peso, altura, imc) VALUES(:nombre, :edad, :peso, :altura, :imc)");
            // Se ejecuta enviando los datos necesarios
            if ($stmt->execute($datos)){
                // Si se ejecuta elimina (cierra) la conexión y muestra un mensaje de exito
                $mbd = null;
                return "Agregado exitosamente";
            }
            else{
                // Si no se ejecuta igual cierra la conexión y muestra Error
                $mbd = null;
                return "Error";
            }
        }
    }