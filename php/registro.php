<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // El nombre de usuario por defecto en XAMPP es 'root'
$password = ""; // La contraseña por defecto en XAMPP es vacía
$dbname = "janeaustenfans";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $año = $_POST['año'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $director = $_POST['director'];
    $valoracion = $_POST['valoracion'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO films (Name, year, Description, genero, director, Valoracion) 
            VALUES ('$nombre', $año, '$descripcion', '$genero', '$director', $valoracion)";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Película registrada con éxito');
                window.location.href = '../index.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>
