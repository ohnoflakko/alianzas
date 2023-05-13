<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
  // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Página de administración</title>
</head>
<body>
  <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
  <p>Esta es la página de administración.</p>
  <!-- Aquí colocarías el contenido de la página de administración -->
  <!-- ... -->
</body>
</html>