<?php $title = 'View Data Kompetensi'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>
<?php
include_once "../connection.php";

$kode_kompetensi = $_GET['kd_kompetensi'];
$sql = "SELECT * FROM kompetensi WHERE kd_kompetensi='$kode_kompetensi'";
$row = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-5">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th scope="row" class="text-center" style="width: 30%;">Kode Kompetensi</th>
            <td class="px-3"><?= $row['kd_kompetensi'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nama Kompetensi</th>
            <td class="px-3"><?= $row['nama_kompetensi'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Program Keahlian</th>
            <td class="px-3"><?= $row['prog_keahlian'] ?></td>
          </tr>
        </tbody>
      </table>

      <div>
        <a href="<?= BASE_URL; ?>/kompetensi/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>