<?php $title = 'Data Guru'; ?>
<?php include_once '../templates/header.php' ?>
<?php
session_start();
if (!isset($_SESSION['status']) && !isset($_SESSION['username'])) {
  header("Location: ../login.php");
  exit();
}
?>

<div class="container">
  <h2 class="mt-4 text-center mb-5">DATA GURU</h2>

  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="mt-2">
        <a class="btn btn-primary px-4" href="add.php" role="button">Tambah Data</a>
      </div>
      <table class="table table-bordered table-striped text-center mt-3">
        <thead class="table-secondary">
          <tr>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">Pendidikan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once "../connection.php";
          $sql = "SELECT * FROM guru";

          foreach ($conn->query($sql) as $row_guru) :
          ?>
            <tr>
              <td><?= $row_guru['nip'] ?></td>
              <td><?= $row_guru['nama_guru'] ?></td>
              <td><?= $row_guru['tempat_lahir'] ?></td>
              <td><?= $row_guru['tgl_lahir'] ?></td>
              <td><?= $row_guru['jenkel'] ?></td>
              <td><?= $row_guru['alamat'] ?></td>
              <td><?= $row_guru['no_hp'] ?></td>
              <td><?= $row_guru['pend_akhir'] ?></td>
              <td>
                <a class="btn btn-primary btn-sm" href='view.php?nip=<?= $row_guru['nip'] ?>'>
                  View
                </a>
                <a class="btn btn-warning btn-sm" href='edit.php?nip=<?= $row_guru['nip'] ?>'>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href='delete.php?nip=<?= $row_guru['nip'] ?>'>
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