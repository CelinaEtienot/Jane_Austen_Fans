<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "janeaustenfans";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de la tabla
$sql = "SELECT * FROM films";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Name']}</td>
                <td>{$row['year']}</td>
                <td>{$row['Description']}</td>
                <td>{$row['genero']}</td>
                <td>{$row['director']}</td>
                <td>{$row['Valoracion']}</td>
               </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
}

$conn->close();
?>
