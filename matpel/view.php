<?php $title = 'View Data Mata Pelajaran'; ?>
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

$kd_matpel = $_GET['kd_matpel'];
$sql = "SELECT * FROM matpel WHERE kd_matpel='$kd_matpel'";
$row = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-5">
      <table class="table  table-bordered">
        <tbody>
          <tr>
            <th scope="row" class="text-center" style="width: 30%;">Kode Mata Pelajaran</th>
            <td class="px-3"><?= $row['kd_matpel'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nama Mata Pelajaran</th>
            <td class="px-3"><?= $row['nama_matpel'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Jumlah Jam</th>
            <td class="px-3"><?= $row['jumlah_jam'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Tingkat</th>
            <td class="px-3"><?= $row['tingkat'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Kode Kompetensi</th>
            <td class="px-3"><?= $row['kd_kompetensi'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">NIP</th>
            <td class="px-3"><?= $row['nip'] ?></td>
          </tr>
        </tbody>
      </table>

      <div>
        <a href="<?= BASE_URL; ?>/matpel/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>