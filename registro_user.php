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

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$nacimiento = $_POST['fecha_nacimiento'];
$nacionalidad = $_POST['nacionalidad'];

// Insertar datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre, apellido, correo, password, nacimiento, nacionalidad) VALUES ('$nombre', '$apellido','$correo', '$password','$nacimiento','$nacionalidad')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a la página de inicio
    header("Location: mostrar_usuarios.php");
    exit(); // Asegurarse de que no se ejecute más código después de la redirección
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>