<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Consultar Alumnos</title>
    <link rel="stylesheet" type="text/css" href="CSS.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "alumnos");

if (!$con) {
    // Manejo de errores de conexión
    die("Conexión fallida: " . mysqli_connect_error());
}

$resultado = mysqli_query($con, "SELECT * FROM datos");

if ($resultado === FALSE) {
    // Manejo de errores en la consulta
    die("Error en la consulta: " . mysqli_error($con));
}

echo "<h1>Consulta de la tabla Datos</h1>";
echo "<a href='consulta_alumnos.php'>Actualizar tabla</a>";
echo "<table>
<tr>
<th>Matricula</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Edad</th>
</tr>";

while ($row = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td align='center'>" . htmlspecialchars($row['id_matricula']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['edad']) . "</td>";
    echo "</tr>";
}

echo "</table>";
$registros = mysqli_num_rows($resultado);
echo "<br>Registros: " . $registros;

mysqli_close($con);
?>

</body>
</html>