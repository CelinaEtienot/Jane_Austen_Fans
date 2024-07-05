<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "janeaustenfans";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Falla de conexion: ' . $conn->connect_error]));
}

// Verificar si se recibió el ID
if (!isset($_POST['ID']) || empty($_POST['ID'])) {
    die(json_encode(['success' => false, 'error' => 'ID no proporcionado']));
}

// Obtener el ID de la película a eliminar
$id = $_POST['ID'];

// Preparar la consulta SQL
$sql = "DELETE FROM films WHERE ID = ?";

// Preparar y ejecutar la declaración
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die(json_encode(['success' => false, 'error' => 'Error en la preparación de la consulta: ' . $conn->error]));
}

$stmt->bind_param("i", $id);
$result = $stmt->execute();

// Enviar respuesta
if ($result) {
    echo "<html><head><script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></head><body>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              title: 'Éxito',
              text: 'Registro eliminado con éxito',
              icon: 'success',
              confirmButtonText: 'OK'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = '../series.php'
              }
          });
      });
    </script></body></html>";
} else {
    echo json_encode(['success' => false, 'error' => 'Error al eliminar: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
