<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta charset="utf-8"/>
    <style type="text/css"></style>
</head>
<body>
<?php
// Conectarse a la base de datos
$con = mysqli_connect("localhost", "root", "", "alumnos");

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Ejecutar la consulta
$resultado = mysqli_query($con, "SELECT * FROM datos"); 

// Verificar si la consulta tuvo éxito
if ($resultado === FALSE) {
    die("Error en la consulta: " . mysqli_error($con));
}

echo "<center>";
echo "<h1>Actualizar Datos</h1>";
echo "<table border='1'>
<tr>
<th>Matricula</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Edad</th>
</tr>";

// Recorrer los resultados y mostrarlos en la tabla
while($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id_matricula']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
    echo "<td>" . htmlspecialchars($row['edad']) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Contar la cantidad de registros
$registros = mysqli_num_rows($resultado);
echo "<br>El número de registros son: " . $registros;

mysqli_close($con);
?>

<h3>Escribe la MATRICULA del Registro a editar</h3> 
<form action="Actualizar2_datos.php" method="post">
    Matricula: <input type="text" name="id" />
    <input type="submit" value="Editar" />
</form>
</body>
</html>