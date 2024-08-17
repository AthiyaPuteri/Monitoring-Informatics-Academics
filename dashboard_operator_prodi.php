<?php
// logout
require 'function.php';

if (isset($_POST)) {
  if (isset($_POST["logout"])) {
    if (logout() > 0) {
      echo "<script>
              alert('Logout berhasil!');
            </script>";
      header("Location: login.php");
    } else {
      echo "<script>
              alert('Logout gagal!');
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
  <title>dashboard</title>
</head>

<body>
  <form action="" method="POST">
    <tr>Logo Undip</tr>
    <tr>Dashboard operator prodi</tr>
    <tr>
      <button type="submit" name="logout">Logout</button>
    </tr>
  </form>
</body>

</html>