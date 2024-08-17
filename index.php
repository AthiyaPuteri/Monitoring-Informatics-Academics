<?php
session_start();
if (isset($_SESSION['login'])) {
  if ($_SESSION["type"] == 1) {
    header("Location: mahasiswa/dashboard_mahasiswa.php");
  } else if ($_SESSION["type"] == 2) {
    header("Location: dashboard_dosen.php");
  } else if ($_SESSION["type"] == 3) {
    header("Location: dashboard_operator_prodi.php");
  } else {
    header("Location: dashboard_department.php");
  }
} else {
  header("Location: login.php");
  exit;
}