<?php 
//Sirve para evitar inyecciones sql en formularios. Se debe aplicar a los campos de un formulario
//$db es es $db = mysqli_connect($server, $username, $password, $database);
mysqli_real_escape_string($db, $_POST ['nombre']);

?>
