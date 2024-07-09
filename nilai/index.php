<?php $title = 'Data Nilai'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-4 text-center mb-5">DATA NILAI</h2>

  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="mt-2">
        <a class="btn btn-primary px-4" href="add.php" role="button">Tambah Data </a>
      </div>
      <table class="table table-bordered table-striped text-center mt-3">
        <thead class="table-secondary">
          <tr>
            <th scope="col">Kode Nilai</th>
            <th scope="col">NIS</th>
            <th scope="col">Kode Matpel</th>
            <th scope="col">Nilai Pelajaran</th>
            <th scope="col">Nilai Kompetensi</th>
            <th scope="col">Semester</th>
            <th scope="col">Tahun Pelajaran</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../connection.php";
          $sql = "SELECT * FROM nilai";

          foreach ($conn->query($sql) as $row_nilai) :
          ?>
            <tr>
              <td><?= $row_nilai['kd_nilai'] ?></td>
              <td><?= $row_nilai['nis'] ?></td>
              <td><?= $row_nilai['kd_matpel'] ?></td>
              <td><?= $row_nilai['nilai_p'] ?></td>
              <td><?= $row_nilai['nilai_k'] ?></td>
              <td><?= $row_nilai['semester'] ?></td>
              <td><?= $row_nilai['tapel'] ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href='view.php?kd_nilai=<?= $row_nilai['kd_nilai'] ?>'>
                  View
                </a>
                <a class="btn btn-warning btn-sm" href='edit.php?kd_nilai=<?= $row_nilai['kd_nilai'] ?>'>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href='delete.php?kd_nilai=<?= $row_nilai['kd_nilai'] ?>'>
                  Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include_once '../templates/footer.php' ?>