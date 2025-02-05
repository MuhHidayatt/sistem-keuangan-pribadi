<?php 
include '../koneksi.php';
session_start();

// Validasi data yang diterima dari form
$user_id = $_POST['user_id'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis'];
$kategori = $_POST['kategori'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$bank = $_POST['bank'];

// Pastikan semua inputan valid
if (!is_numeric($nominal) || $nominal <= 0) {
    die("Nominal harus angka dan lebih besar dari 0.");
}

// Ambil data rekening untuk bank yang dipilih
$query_rekening = "SELECT * FROM bank WHERE bank_id = ?";
$stmt = mysqli_prepare($koneksi, $query_rekening);
mysqli_stmt_bind_param($stmt, "i", $bank);
mysqli_stmt_execute($stmt);
$rekening = mysqli_stmt_get_result($stmt);
$r = mysqli_fetch_assoc($rekening);

if (!$r) {
    die("Rekening bank tidak ditemukan.");
}

$saldo_sekarang = $r['bank_saldo'];
$total = 0;

if ($jenis == "Pemasukan") {
    $total = $saldo_sekarang + $nominal;
    // Update saldo bank untuk pemasukan
    $query_update = "UPDATE bank SET bank_saldo = ? WHERE bank_id = ?";
    $stmt_update = mysqli_prepare($koneksi, $query_update);
    mysqli_stmt_bind_param($stmt_update, "di", $total, $bank);
    mysqli_stmt_execute($stmt_update);
} elseif ($jenis == "Pengeluaran") {
    if ($saldo_sekarang < $nominal) {
        die("Saldo tidak cukup untuk pengeluaran.");
    }
    $total = $saldo_sekarang - $nominal;
    // Update saldo bank untuk pengeluaran
    $query_update = "UPDATE bank SET bank_saldo = ? WHERE bank_id = ?";
    $stmt_update = mysqli_prepare($koneksi, $query_update);
    mysqli_stmt_bind_param($stmt_update, "di", $total, $bank);
    mysqli_stmt_execute($stmt_update);
}

// Masukkan transaksi baru
$query_insert = "INSERT INTO transaksi (transaksi_tanggal, transaksi_jenis, transaksi_kategori, transaksi_nominal, transaksi_keterangan, transaksi_bank, user_id) 
                 VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($koneksi, $query_insert);
mysqli_stmt_bind_param($stmt_insert, "sssiisi", $tanggal, $jenis, $kategori, $nominal, $keterangan, $bank, $user_id);
if (mysqli_stmt_execute($stmt_insert)) {
    header("Location: transaksi.php");
} else {
    die("Error: " . mysqli_error($koneksi));
}

mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_update);
mysqli_stmt_close($stmt_insert);
?>
