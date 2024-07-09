<?php
include_once 'connection.php';

session_start();
if (isset($_SESSION['status']) && isset($_SESSION['username'])) {
  header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
  $password = md5($_POST['password']);

  if (!empty($username) && !empty($password)) {
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    $user = $result->num_rows;
    if ($user == 1) {
      $_SESSION["username"] = $username;
      $_SESSION["status"] = "login";
      header("Location: index.php");
    } else {
      echo 'Data tidak sesuai dengan credentials!';
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
  <title>Halaman Login</title>
</head>

<body>
  <div class="container">
    <div class="card mt-5 mx-auto shadow-sm p-3 bg-body rounded" style="width: 28rem;">
      <div class="card-body">
        <h2 class="text-center mb-3">Login</h2>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required autocomplete="off">
          </div>
          <button type="submit" class="btn btn-success text-uppercase mt-2" name="submit" style="width: 100%;">
            Login
          </button>
        </form>
        <div class="text-center mt-3">
          <p>Belum mempunyai akun? <a class="text-decoration-none" href="signup.php"> Sign Up</a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>