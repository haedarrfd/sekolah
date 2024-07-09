<?php $title = 'Edit Data Kompetensi'; ?>
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
<?php
include_once "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kd_kompetensi = trim(stripslashes(htmlspecialchars($_POST['kd_kompetensi'])));
  $nama_kompetensi = trim(stripslashes(htmlspecialchars($_POST['nama_kompetensi'])));
  $prog_keahlian = trim(stripslashes(htmlspecialchars($_POST['prog_keahlian'])));

  if (!empty($kd_kompetensi) && !empty($nama_kompetensi) && !empty($prog_keahlian)) {
    $sql = "UPDATE kompetensi SET nama_kompetensi='$nama_kompetensi',prog_keahlian='$prog_keahlian' WHERE kd_kompetensi='$kd_kompetensi'";
    if ($conn->query($sql)) {
      header('location:index.php');
    } else {
      echo "Ada yang salah. Coba lagi!";
    }
  } else {
    echo "Kolom wajib terisi semua!";
  }
}
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-lg-8 mt-4 mb-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="mt-3 mb-5 text-center">EDIT KOMPETENSI</h2>
          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Kode Kompetensi</label>
              <input type="text" class="form-control" name="kd_kompetensi" value="<?= $row['kd_kompetensi'] ?>" placeholder="Masukkan Kode Kompetensi" required readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Kompetensi</label>
              <input type="text" class="form-control" name="nama_kompetensi" value="<?= $row['nama_kompetensi'] ?>" placeholder="Masukkan Nama Kompetensi" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Program Keahlian</label>
              <input type="text" class="form-control" name="prog_keahlian" value="<?= $row['prog_keahlian'] ?>" placeholder="Masukkan Program Keahlian" required>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary mt-3 fs-5" name="submit">
                Kirim
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-3">
        <a href="<?= BASE_URL; ?>/kompetensi/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>