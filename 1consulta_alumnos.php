<?php
$con = mysqli_connect("localhost", "root", "", "alumnos");
if (!$con) {
    die('No se estableció la conexión con el servidor: ' . mysqli_error($con)); 
}

// Sanear y validar datos antes de usarlos
$id_matricula = isset($_POST['id_matricula']) ? mysqli_real_escape_string($con, $_POST['id_matricula']) : '';
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($con, $_POST['nombre']) : '';
$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($con, $_POST['apellidos']) : '';
$edad = isset($_POST['edad']) ? mysqli_real_escape_string($con, $_POST['edad']) : '';

// Realizar la consulta SQL
$sql = "INSERT INTO datos (id_matricula, nombre, apellidos, edad) VALUES ('$id_matricula', '$nombre', '$apellidos', '$edad')";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "<center>";
echo "1 registro agregado<br>";
echo "<a href='consulta_alumnos.php'>Ver registros</a>";
mysqli_close($con);
?>