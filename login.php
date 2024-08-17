<?php
require 'function.php';

if (isset($_POST)) {
  if (isset($_POST["login"])) {
    if (login($_POST["email"], $_POST["password"]) > 0) {
      header("Location: index.php");
      exit;
    } else {
      echo "<script>
              alert('Login gagal!');
            </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIAP | LOGIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style/style.css">
</head>

<body class="main">
  <div class="box d-flex ms-auto align-items-center justify-content-center text-center py-3">
    <form action="" method="POST">
      <div class="logo mx-auto mb-2">
        <img src="./img/logo.png" alt="">
      </div>
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="login-button">
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        <span style="font-size: 12px;">Dont have an account? <a href="registration.php">Register</a> now</span>
      </div>
    </form>
  </div>
</body>

</html>