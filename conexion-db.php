
<?php 
//Conectar a la base de datos
$host = 'localhost';
$user = 'db001';
$password = 'db001';
$database = 'db001';
$conexion = mysqli_connect($host, $user, $password, $database);

//Comprobar si la conexión es correcta
if (mysqli_connect_errno()) {
    echo "La conexión ha fallado";
} else{
    echo"La conexión es existosa";
}
//Consulta para configurar codificación de caracteres
mysqli_query($conexion, "SET NAMES 'utf8'");

//Consulta SELECT desde php
$query = mysqli_query($conexion, "SELECT * FROM notas");

//Creo un bucle que crea una varible (nota) que es igual a cada iteración de $query que además me lo pone en un array gracias a mysqli_fetch_assoc
while ($nota = mysqli_fetch_assoc($query)){
    //Cojo el array que me crea en cada iteración y saco un elemento concreto del array.
    echo "<h2>".$nota['titulo']."</h2>";
    echo "<p>".$nota['descripcion']."</p><br>";
}

?>
