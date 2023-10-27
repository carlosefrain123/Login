<?php
session_start(); // Inicia la sesión

require "includes/header.php";

if (isset($_SESSION['username'])) {
  echo "Bienvenido " . $_SESSION['username'];
} else {
  header("Location: login.php"); // Redirige al usuario a la página de inicio de sesión si no está autenticado
}

require "includes/footer.php";
?>
