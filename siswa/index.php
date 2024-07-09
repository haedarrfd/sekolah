<?php $title = 'Data Siswa'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-4 text-center mb-5">DATA SISWA</h2>

  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="mt-2">
        <a class="btn btn-primary px-4" href="add.php" role="button">Tambah Data </a>
      </div>
      <table class="table table-bordered table-striped text-center mt-3">
        <thead class="table-secondary">
          <tr>
            <th scope="col">NIS</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Kode Kompetensi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../connection.php";
          $sql = "SELECT * FROM siswa";

          foreach ($conn->query($sql) as $row_siswa) :
          ?>
            <tr>
              <td><?= $row_siswa['nis'] ?></td>
              <td><?= $row_siswa['nama_siswa'] ?></td>
              <td><?= $row_siswa['tempat_lahir'] ?></td>
              <td><?= $row_siswa['tgl_lahir'] ?></td>
              <td><?= $row_siswa['alamat'] ?></td>
              <td><?= $row_siswa['no_telepon'] ?></td>
              <td><?= $row_siswa['kd_kompetensi'] ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href='view.php?nis=<?= $row_siswa['nis'] ?>'>
                  View
                </a>
                <a class="btn btn-warning btn-sm" href='edit.php?nis=<?= $row_siswa['nis'] ?>'>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href='delete.php?nis=<?= $row_siswa['nis'] ?>'>
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