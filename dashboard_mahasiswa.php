<?php
// logout
require '../function.php';

$_SESSION['userDetail'] = getUserDetail($_SESSION["id_user"]);
$_SESSION['mahasiswaDetail'] = getMahasiswaDetail($_SESSION["nim"]);

if (!isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

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
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Mahasiswa</title>
  <link rel="stylesheet" href="./style/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
  .title {
    font-size: 50px;
  }

  .info-mhs {
    background-color: #256d85;
    color: white;
    font-size: 16px;
    display: flex;
    align-items: center;
    padding: 20px;
    border-radius: 15px;
  }

  .profile-photo i {
    font-size: 80px;
  }

  .profile-info {
    font-size: 14px;
    padding: 0px 50px;
  }

  .type {
    font-size: 30px;
    font-weight: bold;
  }

  .image img {
    border-radius: 50%;
  }
  </style>
</head>

<body class="flex w-screen h-screen space-x-6 bg-gray-300">
  <div class="flex flex-col items-center w-40 h-full overflow-hidden text-gray-400 bg-gray-900 rounded">
    <a class="flex items-center w-full px-3 mt-3" href="#">
      <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path
          d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
      </svg>
      <span class="ml-2 text-sm font-bold">The App</span>
    </a>
    <div class="w-full px-2">
      <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span class="ml-2 text-sm font-medium">Dasboard</span>
        </a>
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <span class="ml-2 text-sm font-medium">Search</span>
        </a>
        <a class="flex items-center w-full h-12 px-3 mt-2 text-gray-200 bg-gray-700 rounded" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <span class="ml-2 text-sm font-medium">Insights</span>
        </a>
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
          </svg>
          <span class="ml-2 text-sm font-medium">Docs</span>
        </a>
      </div>
      <div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="ml-2 text-sm font-medium">Products</span>
        </a>
        <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
          </svg>
          <span class="ml-2 text-sm font-medium">Settings</span>
        </a>
        <a class="relative flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
          href="#">
          <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
          </svg>
          <span class="ml-2 text-sm font-medium">Messages</span>
          <span class="absolute top-0 left-0 w-2 h-2 mt-2 ml-2 bg-indigo-500 rounded-full"></span>
        </a>
      </div>
    </div>
    <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-800 hover:bg-gray-700 hover:text-gray-300"
      href="#">
      <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="ml-2 text-sm font-medium">Account</span>
    </a>
    <!-- a to logout -->
    <a href="logout.php">Logout</a>
    </a>
  </div>
  <div class="content-right p-8">
    <!-- add image -->
    <div class="info-mhs d-flex align-items-center w-100">
      <div class="image">
        <img src="../img/<?= $_SESSION['mahasiswaDetail']["photo"]; ?>" alt="foto" width="100" height="100">
      </div>
      <div class="bio ps-3">
        <h1><?= $_SESSION['mahasiswaDetail']["nama"]; ?></h1>
        <h2><?= $_SESSION['mahasiswaDetail']["nim"]; ?></h2>
        <p><?= $_SESSION['userDetail']["email"]; ?></p>
        <p><?= $_SESSION['mahasiswaDetail']["no_hp"]; ?></p>
        <p>Status : <?php if ($_SESSION['mahasiswaDetail']["status"]) {
                      echo "Aktif";
                    } else {
                      echo "Tidak Aktif";
                    } ?></p>

      </div>
    </div>
    <div class="mt-4">
      <!-- href to profile -->
      <a class="btn btn-primary" href="profile_mahasiswa.php">Profile</a>
      <!-- href to data irs -->
      <a class="btn btn-primary" href="data_irs.php">Data IRS</a>
      <!-- href to data khs -->
      <a class="btn btn-primary" href="data_khs.php">Data KHS</a>
      <!-- href to data pkl -->
      <a class="btn btn-primary" href="data_pkl.php">Data PKL</a>
      <!-- href to data skripsi -->
      <a class="btn btn-primary" href="data_skripsi.php">Data Skripsi</a>
      <!-- href to logout -->
      <a class="btn btn-danger" href="../logout.php">Logout</a>
    </div>
  </div>



  <!-- <form action="" method="POST">
      <tr>Logo Undip</tr>
      <tr>Dashboard Dosen</tr>
      <tr>
        <button type="submit" name="logout">Logout</button>
      </tr>
    </form> -->
</body>

</html>