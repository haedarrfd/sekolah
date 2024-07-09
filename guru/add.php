<?php $title = 'Add Data Guru'; ?>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nip = trim(stripslashes(htmlspecialchars($_POST['nip'])));
  $nama = trim(stripslashes(htmlspecialchars($_POST['nama'])));
  $tempatLahir = trim(stripslashes(htmlspecialchars($_POST['tempatLahir'])));
  $tglLahir = trim(stripslashes(htmlspecialchars($_POST['tglLahir'])));
  $jk = trim(stripslashes(htmlspecialchars($_POST['jk'])));
  $alamat = trim(stripslashes(htmlspecialchars($_POST['alamat'])));
  $noHp = trim(stripslashes(htmlspecialchars($_POST['noHp'])));
  $pendidikan = trim(stripslashes(htmlspecialchars($_POST['pendidikan'])));

  if (!empty($nip) && !empty($nama) && !empty($tempatLahir) && !empty($tglLahir) && !empty($jk) && !empty($alamat) && !empty($noHp) && !empty($pendidikan)) {
    $sql = "INSERT INTO guru VALUES ('$nip','$nama','$tempatLahir','$tglLahir','$jk','$alamat','$noHp','$pendidikan')";
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
          <h2 class="mt-3 mb-5 text-center">TAMBAH GURU</h2>
          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">NIP</label>
              <input type="number" class="form-control" name="nip" placeholder="Masukkan NIP" required autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
              <label class="form-label">tempat Lahir</label>
              <input type="text" class="form-control" name="tempatLahir" placeholder="Masukkan Tempat Lahir" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tglLahir" placeholder="Masukkan Tanggal Lahir" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jk" required>
                <option selected value="">Pilih Menu</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">No HP</label>
              <input type="number" class="form-control" name="noHp" placeholder="Masukkan No HP" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Pendidikan</label>
              <input type="text" class="form-control" name="pendidikan" placeholder="Masukkan Pendidikan" required>
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
        <a href="<?= BASE_URL; ?>/guru/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>