<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Keuangan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb, #a1c4fd, #c2e9fb);
      background-size: 300% 300%;
      animation: gradientBG 15s ease infinite;
      font-family: 'Source Sans Pro', sans-serif;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-box {
      width: 400px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      padding: 20px;
    }

    .login-box h2 {
      font-weight: 700;
      color: #007bff;
      margin-bottom: 20px;
    }

    .btn-primary {
      background: #007bff;
      border: none;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background: #0056b3;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: none;
    }

    .alert {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <center>
      <h2>Sistem Manajemen Keuangan</h2>
      <?php
      if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal") {
          echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
        } else if ($_GET['alert'] == "logout") {
          echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
        } else if ($_GET['alert'] == "belum_login") {
          echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
        }
      }
      ?>
    </center>
    <div class="login-box-body">
      <center>
        <img src="gambar/sistem/sistem.png" style="width: 120px; height: auto; margin-bottom: 20px;">
      </center>
      <form action="periksa_login.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
