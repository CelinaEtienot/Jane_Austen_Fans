<?php
// Para poder ver los errores y advertencias en el navegador
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
    $nombre = $_POST['nombre'];
    $año = $_POST['año'];
    $descripcion = $_POST['descripcion'];
    $genero = $_POST['genero'];
    $temporadas = $_POST['Temporadas'];
    $capitulos = $_POST['capitulos'];
    $trailer = $_POST['Trailer'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO films (Name, year, Description, genero, Temporadas, capitulos, Trailer) 
            VALUES ('$nombre', $año, '$descripcion', '$genero', '$temporadas', '$capitulos', '$trailer')";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "<html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body>
              <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Éxito',
                        text: 'Serie registrada con éxito',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../registro_series.html'
                        }
                    });
                });
              </script></body></html>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no permitido.";
}
?>
