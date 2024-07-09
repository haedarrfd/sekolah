<?php
include_once "../connection.php";

session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}

$kd_kompetensi = $_GET['kd_kompetensi'];
$sql = "DELETE FROM kompetensi WHERE kd_kompetensi='$kd_kompetensi'";
if ($conn->query($sql)) {
  header('location:index.php');
} else {
  echo "Gagal terhapus";
}
