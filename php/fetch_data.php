<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión a la base de datos
$servername = "localhost"; 
$username = "id22390418_janeaustenfans"; 
$password = "Manz@nito01"; 
$dbname = "id22390418_web_peliculas";

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
        echo "<tr>";
        echo "<td>{$row['ID']}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td>{$row['year']}</td>";
        echo "<td>{$row['Description']}</td>";
        echo "<td>{$row['genero']}</td>";
        echo "<td>{$row['Temporadas']}</td>";
        echo "<td>{$row['capitulos']}</td>";
        echo "<td>";
        echo "<div class='video-container'>";
        echo "<iframe src='{$row['Trailer']}' frameborder='0' allowfullscreen></iframe>";
        echo "</div>";
        echo "</td>";
        echo "<td>";
        echo "<button class='delete-btn'onclick='deleteFilm({$row['ID']})'>Eliminar</button>";
        echo "<button class='edit-btn'onclick='updateFilm({$row['ID']})'>Editar</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No se encontraron registros</td></tr>";
}

$conn->close();
?>