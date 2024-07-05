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
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se recibió el ID
if (!isset($_GET['ID']) || empty($_GET['ID'])) {
    die("ID no proporcionado");
}

// Obtener el ID del registro a modificar
$id = $_GET['ID'];

// Consultar los datos actuales del registro
$sql = "SELECT * FROM films WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Registro no encontrado");
}

$registro = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="inicio.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .form-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
         }

    .form-group label {
      flex: 1;
      margin-right: 10px;
      text-align: center;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      flex: 2;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group textarea {
      resize: vertical;
      height: 50px; 
    }

    .form-group.flex {
      display: flex;
      flex-wrap: nowrap;
      justify-content: space-between;
    }

    .form-group.flex label {
      margin-right: 10px;
    }

    .form-group.flex .form-control {
      flex: 1;
      margin-right: 10px;
    }
    .formulario{
      justify-content: center;
      padding-left: 10px;
      padding-right: 10px;
    }
  </style>
</head>

<body>
    <div id="contenedor">
        <div class="animate__animated animate__fadeIn" id="contenido">
            <h1>Modificación de Registros</h1>
            <div class="formulario" id="formulario">
            <form action="php/actualizar.php" method="post" id="loginForm">
                <input type="hidden" name="ID" value="<?php echo $registro['ID']; ?>">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $registro['Name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="año" class="form-label">Año:</label>
                    <input type="number" id="año" name="año" class="form-control" min="1888" value="<?php echo $registro['year']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo $registro['Description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="genero" class="form-label">Género:</label>
                    <select id="genero" name="genero" class="form-control" required>
                        <option value="">Seleccione un género</option>
                        <option value="accion" <?php echo ($registro['genero'] == 'accion') ? 'selected' : ''; ?>>Acción</option>
                        <option value="aventura" <?php echo ($registro['genero'] == 'aventura') ? 'selected' : ''; ?>>Aventura</option>
                        <option value="comedia" <?php echo ($registro['genero'] == 'comedia') ? 'selected' : ''; ?>>Comedia</option>
                        <option value="drama" <?php echo ($registro['genero'] == 'drama') ? 'selected' : ''; ?>>Drama</option>
                        <option value="fantasia" <?php echo ($registro['genero'] == 'fantasia') ? 'selected' : ''; ?>>Fantasía</option>
                        <option value="horror" <?php echo ($registro['genero'] == 'horror') ? 'selected' : ''; ?>>Horror</option>
                        <option value="misterio" <?php echo ($registro['genero'] == 'misterio') ? 'selected' : ''; ?>>Misterio</option>
                        <option value="romance" <?php echo ($registro['genero'] == 'romance') ? 'selected' : ''; ?>>Romance</option>
                        <option value="ciencia_ficcion" <?php echo ($registro['genero'] == 'ciencia_ficcion') ? 'selected' : ''; ?>>Ciencia Ficción</option>
                        <option value="thriller" <?php echo ($registro['genero'] == 'thriller') ? 'selected' : ''; ?>>Thriller</option>
                        <option value="western" <?php echo ($registro['genero'] == 'western') ? 'selected' : ''; ?>>Western</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Temporadas" class="form-label">Temporadas:</label>
                    <input type="number" id="Temporadas" name="Temporadas" class="form-control" min="0" max="50" step="1" value="<?php echo $registro['Temporadas']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="capitulos" class="form-label">Capítulos:</label>
                    <input type="number" id="capitulos" name="capitulos" class="form-control" min="0" max="100" step="1" value="<?php echo $registro['capitulos']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="Trailer" class="form-label">Trailer:</label>
                    <input type="url" id="Trailer" name="Trailer" class="form-control" value="<?php echo $registro['Trailer']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

