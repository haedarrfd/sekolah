<?php $title = 'Halaman Home'; ?>
<?php include_once 'templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-5 mb-5 text-center">Selamat Datang, <?= $_SESSION['username']; ?></h2>
</div>

<?php include_once 'templates/footer.php' ?>