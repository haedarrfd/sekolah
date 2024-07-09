<?php $title = 'Add Data Nilai'; ?>
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
  $kd_nilai = trim(stripslashes(htmlspecialchars($_POST['kd_nilai'])));
  $nis = trim(stripslashes(htmlspecialchars($_POST['nis'])));
  $kd_matpel = trim(stripslashes(htmlspecialchars($_POST['kd_matpel'])));
  $nilai_p = trim(stripslashes(htmlspecialchars($_POST['nilai_p'])));
  $nilai_k = trim(stripslashes(htmlspecialchars($_POST['nilai_k'])));
  $semester = trim(stripslashes(htmlspecialchars($_POST['semester'])));
  $tapel = trim(stripslashes(htmlspecialchars($_POST['tapel'])));

  if (!empty($kd_nilai) && !empty($nis) && !empty($kd_matpel) && !empty($nilai_p) && !empty($nilai_k) && !empty($semester) && !empty($tapel)) {
    $sql = "INSERT INTO nilai VALUES ('$kd_nilai','$nis','$kd_matpel','$nilai_p','$nilai_k','$semester','$tapel')";
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
          <h2 class="mt-3 mb-5 text-center">TAMBAH NILAI</h2>
          <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Kode Nilai</label>
              <input type="text" class="form-control" name="kd_nilai" placeholder="Masukkan Kode Nilai" required autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">NIS</label>
              <select class="form-select" name="nis" required>
                <option selected value="">Pilih Menu</option>
                <?php
                include_once "../connection.php";

                $sql = "SELECT * FROM siswa";
                foreach ($conn->query($sql) as $result) :
                ?>
                  <option value="<?= $result['nis'] ?>">
                    <?= $result['nis'] ?> - <?= $result['nama_siswa'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Kode Matpel</label>
              <select class="form-select" name="kd_matpel" required>
                <option selected value="">Pilih Menu</option>
                <?php
                include_once "../connection.php";

                $sql = "SELECT * FROM matpel";
                foreach ($conn->query($sql) as $result) :
                ?>
                  <option value="<?= $result['kd_matpel'] ?>">
                    <?= $result['kd_matpel'] ?> - <?= $result['nama_matpel'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Nilai Pelajaran</label>
              <input type="text" class="form-control" name="nilai_p" placeholder="Masukkan Nilai Pelajaran" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nilai Kompetensi</label>
              <input type="text" class="form-control" name="nilai_k" placeholder="Masukkan Nilai Kompetensi" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Semester</label>
              <input type="text" class="form-control" name="semester" placeholder="Masukkan Semester" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tahun Pelajaran</label>
              <input type="text" class="form-control" name="tapel" placeholder="Masukkan Tahun Pelajaran" required>
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
        <a href="<?= BASE_URL; ?>/nilai/index.php" class="btn btn-secondary">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>