<?php $title = 'View Data Nilai'; ?>
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

$kd_nilai = $_GET['kd_nilai'];
$sql = "SELECT * FROM nilai WHERE kd_nilai='$kd_nilai'";
$row = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-5">
      <table class="table  table-bordered">
        <tbody>
          <tr>
            <th scope="row" class="text-center" style="width: 30%;">Kode Nilai</th>
            <td class="px-3"><?= $row['kd_nilai'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">NIS</th>
            <td class="px-3"><?= $row['nis'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Kode Mata Pelajaran</th>
            <td class="px-3"><?= $row['kd_matpel'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nilai Pelajaran</th>
            <td class="px-3"><?= $row['nilai_p'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nilai Kompetensi</th>
            <td class="px-3"><?= $row['nilai_k'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Semester</th>
            <td class="px-3"><?= $row['semester'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Tahun Pelajaran</th>
            <td class="px-3"><?= $row['tapel'] ?></td>
          </tr>
        </tbody>
      </table>

      <div>
        <a href="<?= BASE_URL; ?>/nilai/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>