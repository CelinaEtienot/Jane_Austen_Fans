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

// Verificar que la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['ID'];
    $nombre = $_POST['nombre'];
    $año = $_POST['año'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $temporadas = $_POST['Temporadas'];
    $capitulos = $_POST['capitulos'];
    $trailer = $_POST['Trailer'];

    // Preparar la consulta SQL
    $sql = "UPDATE films SET 
            Name='$nombre', 
            year=$año, 
            Description='$descripcion', 
            genero='$genero', 
            Temporadas=$temporadas, 
            capitulos=$capitulos, 
            Trailer='$trailer' 
            WHERE ID=$id";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Serie actualizada con éxito.";
        header("Location: ../series.php"); // Redirige a la página de registros
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>
