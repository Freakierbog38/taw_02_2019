<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>


<?php
class form{

    //Atributos de la clase
    public $name = "";
    public $email = "";
    public $gender = "";
    public $comment = "";
    public $website = "";
    //Atributos de error
    public $nameErr = "";
    public $emailErr = "";
    public $genderErr = "";
    public $commentErr = "";
    public $websiteErr = "";

    //Método que captura la información de POST
    public function capturar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = test_input($_POST["name"]);
                // Checa si solamente hay letras o espacios en blanco
                if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
                    $this->nameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = test_input($_POST["email"]);
                // Revisa si el formato de email está bien formulado
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErr = "Invalid email format";
                }
            }
            if (empty($_POST["website"])) {
                $this->website = "";
            } else {
                $this->website = test_input($_POST["website"]);
                // Revisa si es una URL valida
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) {
                    $this->websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $this->comment = "";
            } else {
                $this->comment = test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                //Revisa si el genero no está vacio
                $this->genderErr = "Gender is required";
            } else {
                $this->gender = test_input($_POST["gender"]);
            }
        }
    }

    public function mostrar(){
        echo "<h2>Your Input:</h2>";
        echo $this->name;
        echo "<br>";
        echo $this->email;
        echo "<br>";
        echo $this->website;
        echo "<br>";
        echo $this->comment;
        echo "<br>";
        echo $this->gender;
    }
    
}

$f1 = new form();
$f1->capturar();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $f1->name;?>">
    <span class="error">* <?php echo $f1->nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $f1->email;?>">
    <span class="error">* <?php echo $f1->emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $f1->website;?>">
    <span class="error"><?php echo $f1->websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $f1->comment;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($f1->gender) && $f1->gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($f1->gender) && $f1->gender=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $f1->genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    $f1->mostrar();
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
