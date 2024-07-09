<?php $title = 'Edit Data Siswa'; ?>
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
<?php
include_once "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nis = trim(stripslashes(htmlspecialchars($_POST['nis'])));
  $nama_siswa = trim(stripslashes(htmlspecialchars($_POST['nama_siswa'])));
  $tempat_lahir = trim(stripslashes(htmlspecialchars($_POST['tempat_lahir'])));
  $tgl_lahir = trim(stripslashes(htmlspecialchars($_POST['tgl_lahir'])));
  $alamat = trim(stripslashes(htmlspecialchars($_POST['alamat'])));
  $no_telepon = trim(stripslashes(htmlspecialchars($_POST['no_telepon'])));
  $kd_kompetensi = trim(stripslashes(htmlspecialchars($_POST['kd_kompetensi'])));

  if (!empty($nis) && !empty($nama_siswa) && !empty($tempat_lahir) && !empty($tgl_lahir) && !empty($alamat) && !empty($no_telepon) && !empty($no_telepon) && !empty($kd_kompetensi)) {
    $sql = "UPDATE siswa SET nama_siswa='$nama_siswa',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',no_telepon='$no_telepon',kd_kompetensi='$kd_kompetensi' WHERE nis='$nis'";
    if ($conn->query($sql)) {
      header("location:index.php");
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
          <h2 class="mt-3 mb-5 text-center">EDIT SISWA</h2>
          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">NIS</label>
              <input type="number" class="form-control" name="nis" value="<?= $row['nis'] ?>" placeholder="Masukkan NIS" readonly required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Siswa</label>
              <input type="text" class="form-control" name="nama_siswa" value="<?= $row['nama_siswa'] ?>" placeholder="Masukkan Nama Siswa" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>" placeholder="Masukkan Tempat Lahir" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>" placeholder="Masukkan Tanggal Lahir" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat" required><?= $row['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">No HP</label>
              <input type="number" class="form-control" name="no_telepon" value="<?= $row['no_telepon'] ?>" placeholder="Masukkan No HP" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Kode Kompetensi</label>
              <select class="form-select" name="kd_kompetensi" required>
                <option value="<?= $row['kd_kompetensi'] ?>"><?= $row['kd_kompetensi'] ?></option>
                <?php
                include_once "../connection.php";

                $sql = "SELECT * FROM kompetensi";
                foreach ($conn->query($sql) as $result) :
                ?>
                  <option value="<?= $result['kd_kompetensi'] ?>">
                    <?= $result['kd_kompetensi'] ?> - <?= $result['nama_kompetensi'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
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
        <a href="<?= BASE_URL; ?>/siswa/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>