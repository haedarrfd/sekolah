<?php $title = 'View Data Siswa'; ?>
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

$nis = $_GET['nis'];
$sql = "SELECT * FROM siswa WHERE nis='$nis'";
$row = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-5">
      <table class="table  table-bordered">
        <tbody>
          <tr>
            <th scope="row" class="text-center" style="width: 25%;">NIS</th>
            <td class="px-3"><?= $row['nis'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nama Siswa</th>
            <td class="px-3"><?= $row['nama_siswa'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Tempat Lahir</th>
            <td class="px-3"><?= $row['tempat_lahir'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Tanggal Lahir</th>
            <td class="px-3"><?= $row['tgl_lahir'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Alamat</th>
            <td class="px-3"><?= $row['alamat'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">No HP</th>
            <td class="px-3"><?= $row['no_telepon'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Kode Kompetensi</th>
            <td class="px-3"><?= $row['kd_kompetensi'] ?></td>
          </tr>
        </tbody>
      </table>

      <div>
        <a href="<?= BASE_URL; ?>/siswa/index.php" class="btn btn-secondary"> Kembali</a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>