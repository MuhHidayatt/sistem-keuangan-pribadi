<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator - Sistem Informasi Keuangan</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800">

  <?php
  include '../koneksi.php';
  session_start();
  if ($_SESSION['status'] != "administrator_logedin") {
    header("location:../index.php?alert=belum_login");
  }
  ?>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .main-header .navbar {
      background-color: #007bff;
    }

    .main-header .logo {
      background-color: #0056b3;
      color: #fff;
    }

    .main-header .logo:hover {
      background-color: #003d80;
    }

    .main-sidebar {
      background-color: #343a40;
    }

    .main-sidebar .sidebar-menu>li>a {
      color: #c2c7d0;
    }

    .main-sidebar .sidebar-menu>li.active>a {
      background-color: #007bff;
      color: #fff;
    }

    .main-sidebar .sidebar-menu>li>a:hover {
      background-color: #0056b3;
      color: #fff;
    }

    .main-sidebar .sidebar-menu .treeview-menu>li>a {
      color: #adb5bd;
    }

    .main-sidebar .sidebar-menu .treeview-menu>li>a:hover {
      color: #fff;
    }

    .navbar-custom-menu>.navbar-nav>li>a {
      color: #fff;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="index.php" class="logo">
        <span class="logo-mini"><b><i class="fa fa-money"></i></b></span>
        <span class="logo-lg"><b>Keuangan</b></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $id_user = $_SESSION['id'];
                $profil = mysqli_query($koneksi, "select * from user where user_id='$id_user'");
                $profil = mysqli_fetch_assoc($profil);
                if ($profil['user_foto'] == "") {
                ?>
                  <img src="../gambar/sistem/user.png" class="user-image">
                <?php } else { ?>
                  <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="user-image">
                <?php } ?>
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - <?php echo $_SESSION['level']; ?></span>
              </a>
            </li>
            <li>
              <a href="logout.php" onclick="return confirm('Apakah Anda yakin untuk logout?')">
                <i class="fa fa-sign-out"></i> LOGOUT
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <?php
            $id_user = $_SESSION['id'];
            $profil = mysqli_query($koneksi, "select * from user where user_id='$id_user'");
            $profil = mysqli_fetch_assoc($profil);
            if ($profil['user_foto'] == "") {
            ?>
              <img src="../gambar/sistem/user.png" class="img-circle">
            <?php } else { ?>
              <img src="../gambar/user/<?php echo $profil['user_foto'] ?>" class="img-circle" style="max-height:45px">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
            </a>
          </li>

          <li>
            <a href="kategori.php">
              <i class="fa fa-folder"></i> <span>DATA KATEGORI</span>
            </a>
          </li>

          <li>
            <a href="transaksi.php">
              <i class="fa fa-folder"></i> <span>DATA TRANSAKSI</span>
            </a>
          </li>

          <!--<li class="treeview">
            <a href="#">
              <i class="fa fa-hand-paper-o"></i>
              <span>HUTANG PIUTANG</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="hutang.php"><i class="fa fa-circle-o"></i> Catatan Hutang</a></li>
              <li><a href="piutang.php"><i class="fa fa-circle-o"></i> Catatan Piutang</a></li>
            </ul>
          </li>-->

          <li class="treeview">
            <a href="#">
              <i class="fa fa-dollar"></i>
              <span>RINCIAN TRANSAKSI</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="transaksi_bri.php"><i class="fa fa-circle-o"></i> BANK BRI</a></li>
              <li><a href="transaksi_bca.php"><i class="fa fa-circle-o"></i> BANK BCA</a></li>
              <li><a href="transaksi_cash.php"><i class="fa fa-circle-o"></i> CASH</a></li>
            </ul>
          </li>

          <li>
            <a href="bank.php">
              <i class="fa fa-building"></i> <span>REKENING BANK</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>DATA PENGGUNA</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="user.php"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
              <li><a href="user_tambah.php"><i class="fa fa-circle-o"></i> Tambah Pengguna</a></li>
            </ul>
          </li>

          <li>
            <a href="laporan.php">
              <i class="fa fa-file"></i> <span>LAPORAN</span>
            </a>
          </li>

          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>GANTI PASSWORD</span>
            </a>
          </li>

          <li>
            <a href="logout.php" onclick="return confirm('Apakah Anda yakin untuk logout?')">
              <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
