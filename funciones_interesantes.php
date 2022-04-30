<?php 
//Sirve para evitar inyecciones sql en formularios. Se debe aplicar a los campos de un formulario
mysqli_real_escape_string($_POST ['nombre']);

?>
