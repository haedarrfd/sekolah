<?php
include_once "../connection.php";

session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}

$nis = $_GET['nis'];
$sql = "DELETE FROM siswa WHERE nis='$nis'";
if ($conn->query($sql)) {
  header('location:index.php');
} else {
  echo "Gagal terhapus";
}
