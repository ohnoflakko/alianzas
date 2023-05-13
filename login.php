<?php
// Definir los detalles de la conexión
$host = 'containers-us-west-190.railway.app';
$port = '6291';
$username = 'root';
$password = 'eKxf6ZmmpI8dShZCi0Xy';
$database = 'railway';

// Establecer la conexión
$conexion = mysqli_connect($host . ':' . $port, $username, $password, $database);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die('Error al conectarse a la base de datos: ' . mysqli_connect_error());
}

// Desactivar las advertencias de PHP
error_reporting(E_ERROR | E_PARSE);

// Desactivar las advertencias de MySQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Obtener los datos del formulario
$usuario = $_POST['user'];
$contrasena = $_POST['password'];

// Consulta SQL para verificar si el usuario y la contraseña existen en la tabla "datausers"
$sql = "SELECT * FROM datausers WHERE nameuser='$usuario' AND passusers='$contrasena'";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontró al menos una fila
if (mysqli_num_rows($resultado) > 0) {
  // Iniciar sesión y redirigir a la página admin.php
  session_start();
  $_SESSION['usuario'] = $usuario;
  header("Location: admin.php");
} else {
  // Mostrar mensaje de error
  echo "";
}

mysqli_close($conexion);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/gnrl.css">
  <title>Login - Alianzas Inscovald</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="src/logo.png" width="150px" height="60px" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleNav()">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Estadisticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Inicio de sesión</h4>
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <input type="user" class="form-control" id="user" name="user" placeholder="Ingresar usuario">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    function toggleNav() {
      var navbarToggler = document.querySelector(".navbar-toggler");
      navbarToggler.classList.toggle("collapsed");
      var navbarNav = document.querySelector(".navbar-collapse");
      navbarNav.classList.toggle("show");
      navbarNav.classList.toggle("navbar-open");
    }

  </script>
</body>
</html>