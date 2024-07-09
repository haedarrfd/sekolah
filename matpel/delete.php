<?php
include_once "../connection.php";

session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}

$kd_matpel = $_GET['kd_matpel'];
$sql = "DELETE FROM matpel WHERE kd_matpel='$kd_matpel'";
if ($conn->query($sql)) {
  header('location:index.php');
} else {
  echo "Gagal terhapus";
}
