<?php
require 'function.php';

if (isset($_POST)) {
  if (isset($_POST["registration"])) {
    if (registration(
      $_POST["email"],
      $_POST["username"],
      $_POST["password"],
      1
    ) > 0) {
      echo "<script>
              alert('User baru berhasil ditambahkan!');
            </script>";
      header("Location: login.php");
    } else {
      echo mysqli_error($conn);
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
  <title>SIAP | REGISTER</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style/style.css">
</head>

<body class="main">
  <!-- add form registration -->
  <div class="box d-flex ms-auto align-items-center justify-content-center text-center py-3">
    <form action="" method="POST">
      <div class="logo mx-auto mb-2">
        <img src="./img/logo.png" alt="">
      </div>
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
      </div>
      <div class="mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="login-button">
        <button type="submit" name="registration" class="btn btn-primary w-100">Registration</button>
        <span style="font-size: 12px;">Dont have an account? <a href="login.php">Login</a> now</span>
      </div>
    </form>
  </div>
  <!-- <table>
    <form action="" method="POST">
      <tr>
        <td>Logo Undip</td>
        <td>Email</td>
        <td><input type="text" name="email"></td>
        <td>Username</td>
        <td><input type="text" name="username"></td>
        <td>Name</td>
        <td><input type="text" name="name"></td>
        <td>Type</td>
        <td>
          <select name="type" id="type">
            <option value="1">Mahasiswa</option>
            <option value="2">Dosen</option>
            <option value="3">Operator Prodi</option>
            <option value="4">Department</option>
          </select>
        </td>
        <td>Alamat</td>
        <td><input type="text" name="alamat"></td>
        <td>Kab/Kota</td>
        <td><input type="text" name="kab_kota"></td>
        <td>Provinsi</td>
        <td><input type="text" name="provinsi"></td>
        <td>Angkatan</td>
        <td><input type="text" name="angkatan"></td>
        <td>Jalur Masuk</td>
        <td><input type="text" name="jalur_masuk"></td>
        <td>No HP</td>
        <td><input type="text" name="no_hp"></td>
        <td>Password</td>
        <td><input type="password" name="password"></td>
        add button registration
  <button type="submit" name="registration">Registration</button>
  </tr>
  </form>
  </table> -->
</body>

</html>