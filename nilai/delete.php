<?php
include_once "../connection.php";

session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}

$kd_nilai = $_GET['kd_nilai'];
$sql = "DELETE FROM nilai WHERE kd_nilai='$kd_nilai'";
if ($conn->query($sql)) {
  header('location:index.php');
} else {
  echo "Gagal terhapus";
}
