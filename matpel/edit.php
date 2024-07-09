<?php $title = 'Edit Data Mata Pelajaran'; ?>
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
<?php
include_once "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kd_matpel = trim(stripslashes(htmlspecialchars($_POST['kd_matpel'])));
  $nama_matpel = trim(stripslashes(htmlspecialchars($_POST['nama_matpel'])));
  $jumlah_jam = trim(stripslashes(htmlspecialchars($_POST['jumlah_jam'])));
  $tingkat = trim(stripslashes(htmlspecialchars($_POST['tingkat'])));
  $kd_kompetensi = trim(stripslashes(htmlspecialchars($_POST['kd_kompetensi'])));
  $nip = trim(stripslashes(htmlspecialchars($_POST['nip'])));

  if (!empty($kd_matpel) && !empty($nama_matpel) && !empty($jumlah_jam) && !empty($tingkat) && !empty($kd_kompetensi) && !empty($nip)) {
    $sql = "UPDATE matpel SET nama_matpel='$nama_matpel',jumlah_jam='$jumlah_jam',tingkat='$tingkat',kd_kompetensi='$kd_kompetensi',nip='$nip' WHERE kd_matpel='$kd_matpel'";
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
          <h2 class="mt-3 mb-5 text-center">EDIT MATA PELAJARAN</h2>
          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Kode Mata Pelajaran</label>
              <input type="text" class="form-control" name="kd_matpel" value="<?= $row['kd_matpel'] ?>" placeholder="Masukkan Kode Mata Pelajaran" required readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Mata Pelajaran</label>
              <input type="text" class="form-control" name="nama_matpel" value="<?= $row['nama_matpel'] ?>" placeholder="Masukkan Nama Mata Pelajaran" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah Jam</label>
              <input type="text" class="form-control" name="jumlah_jam" value="<?= $row['jumlah_jam'] ?>" placeholder="Masukkan Jumlah Jam" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tingkat</label>
              <input type="text" class="form-control" name="tingkat" value="<?= $row['tingkat'] ?>" placeholder="Masukkan Tingkat" required>
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
            <div class="mb-3">
              <label class="form-label">Nama Guru</label>
              <select class="form-select" name="nip" required>
                <option value="<?= $row['nip'] ?>"><?= $row['nip'] ?></option>
                <?php
                include_once "../connection.php";

                $sql = "SELECT * FROM guru";
                foreach ($conn->query($sql) as $result) :
                ?>
                  <option value="<?= $result['nip'] ?>">
                    <?= $result['nip'] ?> - <?= $result['nama_guru'] ?>
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
        <a href="<?= BASE_URL; ?>/matpel/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>