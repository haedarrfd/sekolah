<?php $title = 'Data Kompetensi'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-4 text-center mb-5">DATA KOMPETENSI</h2>

  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="mt-2">
        <a class="btn btn-primary px-4" href="add.php" role="button">Tambah Data </a>
      </div>
      <table class="table table-bordered table-striped text-center mt-3">
        <thead class="table-secondary">
          <tr>
            <th scope="col">Kode Kompetensi</th>
            <th scope="col">Nama Kompetensi</th>
            <th scope="col">Program Keahlian</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../connection.php";
          $sql = "SELECT * FROM kompetensi";

          foreach ($conn->query($sql) as $row_kompetensi) :
          ?>
            <tr>
              <td><?= $row_kompetensi['kd_kompetensi'] ?></td>
              <td><?= $row_kompetensi['nama_kompetensi'] ?></td>
              <td><?= $row_kompetensi['prog_keahlian'] ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href='view.php?kd_kompetensi=<?= $row_kompetensi['kd_kompetensi'] ?>'>
                  View
                </a>
                <a class="btn btn-warning btn-sm" href='edit.php?kd_kompetensi=<?= $row_kompetensi['kd_kompetensi'] ?>'>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href='delete.php?kd_kompetensi=<?= $row_kompetensi['kd_kompetensi'] ?>'>
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