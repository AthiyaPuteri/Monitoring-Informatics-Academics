<?php
// add session
session_start();

// add function login
function login($email, $password)
{
  $conn = mysqli_connect("localhost", "root", "", "db_siap");
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;
      $_SESSION["type"] = $row["type"];
      $_SESSION["id_user"] = $row["id_user"];
      $_SESSION["nim"] = $row["nim"];

      return true;
    }
  }

  return false;
}

// add funtion registration
function registration(
  $email,
  $username,
  $password,
  $type
) {
  $conn = mysqli_connect("localhost", "root", "", "db_siap");
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

  // cek username
  if (mysqli_num_rows($result) === 1) {
    echo "<script>
            alert('Email sudah terdaftar!');
          </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  $identity = rand(10000000000000, 99999999999999);

  if ($type == 1) {
    $query = "INSERT INTO user VALUES(NULL, '$email', '$username', '$password', 1, '$identity', NULL, NULL, NULL)";
    $query2 = "INSERT INTO mahasiswa VALUES('$identity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
  } elseif ($type == 2) {
    $query = "INSERT INTO user VALUES(NULL, '$email', '$username', '$password', 2, NULL, '$identity', NULL, NULL)";
  } elseif ($type == 3) {
    $query = "INSERT INTO user VALUES(NULL, '$email', '$username', '$password', 3, NULL, NULL, '$identity', NULL)";
  } elseif ($type == 4) {
    $query = "INSERT INTO user VALUES(NULL, '$email', '$username', '$password', 4, NULL, NULL, NULL, '$identity')";
  }

  // tambahkan user baru
  mysqli_query($conn, $query);
  mysqli_query($conn, $query2);

  return mysqli_affected_rows($conn);
}

// update profile mahasiswa
function updateProfileMahasiswa($data)
{
  $conn = mysqli_connect("localhost", "root", "", "db_siap");

  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $kota_kab = htmlspecialchars($data["kota_kab"]);
  $provinsi = htmlspecialchars($data["provinsi"]);
  $angkatan = htmlspecialchars($data["angkatan"]);
  $jalur_masuk = htmlspecialchars($data["jalur_masuk"]);
  $no_hp = htmlspecialchars($data["no_hp"]);
  $status = htmlspecialchars($data["status"]);

  // upload photo
  $query = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', kota_kab = '$kota_kab', provinsi = '$provinsi', angkatan = '$angkatan', jalur_masuk = '$jalur_masuk', no_hp = '$no_hp', status = '$status' WHERE nim = '$_SESSION[nim]'";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

// add function update photo profil
function updatePhoto($data)
{
  global $conn;
  $nim = $_SESSION["nim"];
  $photo = upload();
  if (!$photo) {
    return false;
  }
  $query = "UPDATE mahasiswa SET photo = '$photo' WHERE nim = '$nim'";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// add function upload photo
function upload()
{
  $namaFile = $_FILES['photo']['name'];
  $ukuranFile = $_FILES['photo']['size'];
  $error = $_FILES['photo']['error'];
  $tmpName = $_FILES['photo']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>alert('pilih gambar terlebih dahulu!')</script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>alert('yang anda upload bukan gambar!')</script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>alert('ukuran gambar terlalu besar!')</script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  // upload gambar
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}

// function getuser detail
function getUserDetail($id_user)
{
  $conn = mysqli_connect("localhost", "root", "", "db_siap");
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");

  return mysqli_fetch_assoc($result);
}

// function get mahasiswa detail
function getMahasiswaDetail($nim)
{
  $conn = mysqli_connect("localhost", "root", "", "db_siap");
  $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim'");

  return mysqli_fetch_assoc($result);
}

// add function logout
function logout()
{
  session_destroy();
  session_unset();
  $_SESSION["login"] = false;
  header("Location: login.php");
  exit;
}