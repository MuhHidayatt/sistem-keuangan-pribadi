<?php include 'header.php'; ?>
<style>
  /* Menambahkan gaya untuk membuat kotak dengan sudut yang lebih bulat */
  .small-box {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan agar terlihat lebih elegan */
    transition: all 0.3s ease; /* Efek transisi saat hover */
  }

  .small-box:hover {
    transform: scale(1.05); /* Menambahkan efek zoom saat hover */
  }

  /* Gaya untuk mengganti warna kotak menjadi lebih soft */
  .bg-green {
    background-color: #a8e6a1 !important; /* Warna hijau yang lebih soft */
    color: #3e3e3e; /* Warna teks lebih gelap */
  }

  .bg-blue {
    background-color: #a1c8e6 !important; /* Warna biru yang lebih soft */
    color: #3e3e3e;
  }

  .bg-orange {
    background-color: #f7b88b !important; /* Warna oranye yang lebih soft */
    color: #3e3e3e;
  }

  .bg-red {
    background-color: #f7a8a1 !important; /* Warna merah yang lebih soft */
    color: #3e3e3e;
  }

  .bg-black {
    background-color: #d1d1d1 !important; /* Warna hitam yang lebih soft */
    color: #3e3e3e;
  }

  /* Warna teks pada bagian dalam kotak */
  .small-box .inner h4 {
    color: #333;
    font-weight: bolder;
    font-size: 1.2em;
  }

  /* Mengubah warna icon */
  .small-box .icon {
    color: #fff; /* Warna icon putih agar lebih kontras */
  }

  /* Menambahkan efek hover pada tombol info */
  .small-box-footer {
    background-color: rgba(0, 0, 0, 0.1);
    border-top: 1px solid #ddd;
    color: #3e3e3e;
  }

  .small-box-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: #1a73e8; /* Warna link yang menonjol */
  }
</style>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and transaksi_tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Pemasukan Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php 
            $pemasukan = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pemasukan FROM transaksi WHERE transaksi_jenis='Pemasukan'");
            $p = mysqli_fetch_assoc($pemasukan);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pemasukan'])." ,-" ?></h4>
            <p>Seluruh Pemasukan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and transaksi_tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?></h4>
            <p>Pengeluaran Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and month(transaksi_tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?></h4>
            <p>Pengeluaran Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran' and year(transaksi_tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?></h4>
            <p>Pengeluaran Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php 
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(transaksi_nominal) as total_pengeluaran FROM transaksi WHERE transaksi_jenis='pengeluaran'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder"><?php echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" ?></h4>
            <p>Seluruh Pengeluaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="bank.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs pull-right">
            <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Bulan</b></h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Grafik Data Pemasukan & Pengeluaran Per <b>Tahun</b></h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              b
            </div>
          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


        <!-- Calendar -->
        <div class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>
        

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->










  </section>

</div>







<?php include 'footer.php'; ?>