<?php
$con = mysqli_connect("localhost", "root", "", "alumnos");
echo "<br><center>";

if (!$con) {
    die('No se estableció la conexión con el servidor:' . mysqli_error($con));
}

// Valida que 'id_matricula' está establecido en la solicitud POST
if (isset($_POST["id_matricula"]) && is_numeric($_POST["id_matricula"])) {
    $id_matricula = intval($_POST["id_matricula"]); // Convierte el ID a entero
    
    // Consulta SQL para borrar el registro
    $sql = "DELETE FROM datos WHERE id_matricula = $id_matricula"; // Usar directamente la variable segura

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Registro borrado<br><br>";
} else {
    echo "ID de matrícula no válido. Por favor intente de nuevo.<br><br>";
}

echo "<a href='2borrardatos.html'>Regresar</a>";
mysqli_close($con);
?>