<?php
require '../function.php';

if (!isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

if (isset($_POST["update"])) {
  if (updateProfileMahasiswa($_POST) > 0) {
    echo "<script>
            alert('Profile berhasil diupdate!');
            document.location.href = 'profile_mahasiswa.php';
          </script>";
  } else {
    echo "<script>
            alert('Profile gagal diupdate!');
          </script>";
  }
  // upload photo
  // if (updatePhoto($_FILES) > 0) {
  //   echo "sukses upload photo";
  //   echo var_dump($_FILES);
  //   echo var_dump($_POST['photo']);
  // } else {
  //   echo "gagal upload photo";
  //   echo var_dump($_FILES);
  //   echo var_dump($_POST['photo']);
  // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>

<body>
  <form action="" method="POST">
    <div>Logo Undip</div>
    <div>Nama</div>
    <div><input type="text" name="nama" value=""></div>
    <div>Alamat</div>
    <div><input type="text" name="alamat" value=""></div>
    <div>Kota/Kabupaten</div>
    <div><input type="text" name="kota_kab" value=""></div>
    <div>Provinsi</div>
    <div><input type="text" name="provinsi" value=""></div>
    <div>Angkatan</div>
    <div><input type="text" name="angkatan"></div>
    <div>Jalur Masuk</div>
    <div><input type="text" name="jalur_masuk"></div>
    <div>No. HP</div>
    <div><input type="text" name="no_hp"></div>
    <div>Status</div>
    <div>
      <select name="status" id="status">
        <option value="1">Aktif</option>
        <option value="0">Cuti</option>
      </select>
    </div>
    <div>
      <!-- upload photo -->
      <!-- <input type="file" name="photo" id="photo"> -->
    </div>
    <div>
      <button type="submit" name="update">Update</button>
    </div>
    <div>
      <a href="dashboard_mahasiswa.php">Kembali</a>
    </div>
  </form>
</body>

</html>