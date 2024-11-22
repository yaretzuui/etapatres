<?php
$con = mysqli_connect("localhost", "root", "", "alumnos");
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir datos del formulario
$NOMBRE = $_POST['nombre'];
$ID = $_POST['id']; 
$APELLIDOS = $_POST['apellidos'];
$EDAD = $_POST['edad'];

// Consulta para actualizar los datos (considerar usar consultas preparadas)
$query = "UPDATE datos SET nombre='$NOMBRE', apellidos='$APELLIDOS', edad='$EDAD' WHERE id_matricula='$ID'";

if (mysqli_query($con, $query)) {
    // Redirigir solo si la consulta se realizó con éxito
    header("Location: actualizar_datos.php");
    exit; // Asegurarse de que no se ejecute el código posterior
} else {
    echo "Error en la actualización: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);
?>