<?php
session_start(); // Inicia la sesión

require "includes/header.php";
require "config.php";

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "Algunos campos están vacíos";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $login->bindParam(':email', $email);
    $login->execute();
    $data = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {
      if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        header("Location: index.php");
      } else {
        echo "Correo o contraseña incorrectos";
      }
    } else {
      echo "Correo o contraseña incorrectos";
    }
  }
}
?>

<main class="form-signin w-50 m-auto">
  <form method="post" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Inicia sesión</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com">
      <label for="floatingInput">Correo electrónico</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
      <label for="floatingPassword">Contraseña</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
    <h6 class="mt-3">¿No tienes una cuenta? <a href="register.php">Crea tu cuenta</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
