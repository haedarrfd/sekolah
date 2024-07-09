<?php
include_once "../connection.php";

session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}

$nip = $_GET['nip'];
$sql = "DELETE FROM guru WHERE nip='$nip'";
if ($conn->query($sql)) {
  header('location:index.php');
} else {
  echo "Gagal terhapus";
}
