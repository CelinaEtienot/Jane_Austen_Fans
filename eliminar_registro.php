<?php
// Conexión a la base de datos
$servername = "localhost"; 
$username = "id22390418_janeaustenfans"; 
$password = "Manz@nito01"; 
$dbname = "id22390418_web_peliculas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para eliminar el registro
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} else {
    echo "ID no proporcionado";
}

// Cerrar conexión
$conn->close();

// Redirigir de vuelta a la página principal
header("Location: index.php");
exit();
?>
