<?php $title = 'Data Matpel'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-4 text-center mb-5">DATA MATA PELAJARAN</h2>

  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="mt-2">
        <a class="btn btn-primary px-4" href="add.php" role="button">Tambah Data </a>
      </div>
      <table class="table table-bordered table-striped text-center mt-3">
        <thead class="table-secondary">
          <tr>
            <th scope="col">Kode Matpel</th>
            <th scope="col">Nama Matpel</th>
            <th scope="col">Jumlah Jam</th>
            <th scope="col">Tingkat</th>
            <th scope="col">Kode Kompetensi</th>
            <th scope="col">NIP</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../connection.php";
          $sql = "SELECT * FROM matpel";

          foreach ($conn->query($sql) as $row_matpel) :
          ?>
            <tr>
              <td><?= $row_matpel['kd_matpel'] ?></td>
              <td><?= $row_matpel['nama_matpel'] ?></td>
              <td><?= $row_matpel['jumlah_jam'] ?></td>
              <td><?= $row_matpel['tingkat'] ?></td>
              <td><?= $row_matpel['kd_kompetensi'] ?></td>
              <td><?= $row_matpel['nip'] ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href='view.php?kd_matpel=<?= $row_matpel['kd_matpel'] ?>'>
                  View
                </a>
                <a class="btn btn-warning btn-sm" href='edit.php?kd_matpel=<?= $row_matpel['kd_matpel'] ?>'>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href='delete.php?kd_matpel=<?= $row_matpel['kd_matpel'] ?>' onclick="return confirm('Anda yakin ingin menghapus data ini?');">
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