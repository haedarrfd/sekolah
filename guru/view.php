<?php $title = 'View Data Guru'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>
<?php
include "../connection.php";

$nip = $_GET['nip'];
$sql = "SELECT * FROM guru WHERE nip='$nip'";
$row = mysqli_fetch_array($conn->query($sql), MYSQLI_ASSOC);
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-5">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <th scope="row" class="text-center" style="width: 25%;">NIP</th>
            <td class="px-3"><?= $row['nip'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Nama</th>
            <td class="px-3"><?= $row['nama_guru'] ?></td>
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
            <th scope="row" class="text-center">Jenis Kelamin</th>
            <td class="px-3"><?= $row['jenkel'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Alamat</th>
            <td class="px-3"><?= $row['alamat'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">No HP</th>
            <td class="px-3"><?= $row['no_hp'] ?></td>
          </tr>
          <tr>
            <th scope="row" class="text-center">Pendidikan</th>
            <td class="px-3"><?= $row['pend_akhir'] ?></td>
          </tr>
        </tbody>
      </table>

      <div>
        <a href="<?= BASE_URL; ?>/guru/index.php" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>