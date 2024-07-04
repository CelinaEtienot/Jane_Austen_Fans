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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="movies.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English+SC&            display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Movies</title>
</head>

<body>
    <Header>
        <div class="container">
            <div class="animate__animated animate__fadeInDown" id="Logotipo">
                <img src="Img/logo.png" alt="Jane Austen" id="logo">
                <a href="index.html" id="titulo">Jane Austen - Fans</a>
            </div>
        </div>
        <Nav>
            <a href="tendencias.html" target="_blank">Tendencias</a>
            <a href="registro_usuario.html" target="_blank">Registrarse</a>
            <a href="iniciar_sesion.html" target="_blank">Iniciar Sesión</a>
            <a href="conexion_api.html" target="_blank">Conexion Api</a>
        </Nav>
    </Header>
    <main>
    <section class="fondo">
            <h1>Lista de Usuarios registrados</h1>
            
            <a href="registro_usuario.html" class="botonBuscador">Registrate</a>
        </section>




<div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
    </tbody>
    </table>
</div>  

    </main>
    <footer>
        <Nav>
            <a href="tendencias.html">Términos y condiciones</a>
            <a href="registrarse.html">Preguntas frecuentes</a>
            <a href="contacto.html">Contacto</a>
        </Nav>
        <div>
            <h4 id="equipo">Desarrollado por Celina Etienot, Jeremias Ianigro, Pablo Pugliese y Jonatan Pedalino</h4>
            <h4>©2024 todos los derechos reservados</h4>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>



<?php
// Cerrar conexión
$conn->close();
?>