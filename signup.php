<?php
include_once "connection.php";

session_start();
if (isset($_SESSION['status']) && isset($_SESSION['username'])) {
  header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = trim(stripslashes(htmlspecialchars($_POST['nama'])));
  $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
  if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password harus cocok!");
  }
  $password = md5($_POST['password']);

  if (!empty($nama) && !empty($username) && !empty($password)) {
    $sql = "INSERT INTO user (nama,username,password) VALUES ('$nama','$username','$password')";
    if ($conn->query($sql)) {
      header('location:login.php');
    } else {
      echo "Ada yang salah. Coba lagi!";
    }
  } else {
    echo "Kolom wajib terisi semua!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Halaman Sign Up</title>
</head>

<body>
  <div class="container">
    <div class="card mt-5 mx-auto shadow-sm p-3 mb-5 bg-body rounded" style="width: 28rem;">
      <div class="card-body">
        <h2 class="text-center mb-3">Sign Up</h2>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="mb-2">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required autocomplete="off">
          </div>
          <div class="mb-2">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required autocomplete="off">
          </div>
          <div class="mb-2">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required autocomplete="off">
          </div>
          <div class="mb-2">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autocomplete="off">
          </div>
          <button type="submit" class="btn text-uppercase btn-success mt-2" name="submit" style="width: 100%;">
            Sign Up
          </button>
        </form>
        <div class="text-center mt-3">
          <p>Sudah mempunyai akun? <a class="text-decoration-none" href="login.php">Login</a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>