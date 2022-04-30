<?php 
//Sirve para evitar inyecciones sql en formularios. Se debe aplicar a los campos de un formulario
//$db es es $db = mysqli_connect($server, $username, $password, $database);
mysqli_real_escape_string($db, $_POST ['nombre']);

//Cifrar la contraseña antes de guardarla
$paswword = "micontraseña";
$password_segura = password_hash($password), PASSWORD_BYCRYPT, ['cost'=>4]);

//Comparar la contraseña que introduce con la cifrada en la base de datos
//Si es la misma nos devuelve un true y si no coincide devuelve un false.
password_verify($paswword, $password_segura);

?>
