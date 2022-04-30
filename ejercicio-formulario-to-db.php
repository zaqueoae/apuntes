<?php

$servername = "localhost";
$username = "web2";
$password = "web2";
$dbname = "web2";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$nombremsg1 = $nombremsg2 = $edadmsg1 = $edadmsg2 = $passwordmsg1 = $passwordmsg2 = "";

if (isset($_POST['submit'])){
    if (empty($_POST['nombre'])){
        $nombremsg1 = "escribe un nombre";
    }
    if (!empty($_POST['nombre'])){
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $caracteres_nombre = '/^[a-zA-Z ]*$/';
        if (!preg_match($caracteres_nombre, $nombre)){
            $nombremsg2 = "Escribe un nombre válido";
        }
    }
    if (empty($_POST['edad'])){
        $edadmsg1 = "escribe una edad";
    }
    if (!empty($_POST['edad'])){
        $edad = mysqli_real_escape_string($db, $_POST['edad']);
        if (!is_numeric($edad) || $edad < 18){
            $edadmsg2 = "Escribe una edad válida";
        }
    }
    if (empty($_POST['password'])){
        $passwordmsg1 = "escribe una contraseña";
    }
    if (!empty($_POST['password'])){
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $passwordmsg2 = 'La contraseña debe tener al menos 8 caracteres de longitud y debe incluir al menos una letra mayúscula, un número y un carácter especial.';
        }
    }
    if ($nombremsg1 == "" && $nombremsg2 == "" && $edadmsg1 == "" && $edadmsg2 == "" && $passwordmsg1 == "" && $passwordmsg2 == "") {
        
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        $db = mysqli_connect($server, $username, $password, $database);
        $sql = "INSERT INTO usuarios VALUES (null, $nombre, $edad, $password, CURDATE())";
        $query = mysqli_query($db, $sql);

        if ($query === TRUE){
            $exito = "Te has registrado correctamente";
        }

        $db->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo $exito; ?>
<form action="" method="post">
<?php echo $nombremsg1; echo $nombremsg2; ?>
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <?php echo $edadmsg1; echo $edadmsg2; ?>
 <p>Su edad: <input type="text" name="edad" /></p>
 <?php echo $passwordmsg1; echo $passwordmsg2; ?>
 <p>Su contraseña: <input type="paswword" name="password" /></p>
 <p><input type="submit" value="enviar"/></p>
</form>
</body>
</html>
