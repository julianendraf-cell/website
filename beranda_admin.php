<?php
session_start();
include 'koneksi_db.php';

// Ambil data dari database
$total_siswa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM siswa"))['total'];
$total_pembayaran = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM pembayaran WHERE status='Lunas'"))['total'];
$total_kelas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM kelas"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - SPP Online</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family: 'Poppins', sans-serif; }
    body { display:flex; min-height:100vh; background:#f0f2f5; }

    
    .sidebar {
        width:250px;
        background:#1f2937;
        color:white;
        display:flex;
        flex-direction:column;
        padding-top:20px;
    }
    .sidebar h2 {
        text-align:center;
        font-size:24px;
        margin-bottom:30px;
        color:#facc15;
    }
    .sidebar a {
        padding:15px 25px;
        text-decoration:none;
        color:white;
        display:flex;
        align-items:center;
        gap:10px;
        transition:0.3s;
    }
    .sidebar a i { font-size:18px; }
    .sidebar a:hover {
        background:#374151;
        border-left:4px solid #facc15;
    }


    .main {
        flex:1;
        padding:20px 40px;
    }
    .header {
        font-size:28px;
        font-weight:600;
        margin-bottom:20px;
        color:#111827;
    }

    
    .cards {
        display:flex;
        flex-wrap:wrap;
        gap:20px;
    }
    .card {
        background:white;
        flex:1;
        min-width:220px;
        padding:20px;
        border-radius:12px;
        box-shadow:0 4px 15px rgba(0,0,0,0.1);
        display:flex;
        align-items:center;
        gap:15px;
    }
    .card i {
        font-size:40px;
        color:#facc15;
    }
    .card-info p { font-size:14px; color:#6b7280; }
    .card-info h2 { font-size:28px; color:#111827; margin-top:5px; }

    
    @media(max-width:768px){
        body { flex-direction:column; }
        .sidebar { width:100%; flex-direction:row; overflow-x:auto; }
        .sidebar a { flex:1; justify-content:center; }
        .cards { flex-direction:column; }
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SPP Admin</h2>
    <a><i class='bx bx-grid-alt'></i>Dashboard</a>
    <a href="data_siswa.php"><i class='bx bx-user'></i>Data Siswa</a>
    <a href="data_pembayaran.php"><i class='bx bx-wallet'></i>Pembayaran</a>
    <a href="laporan_pembayaran.php"><i class='bx bx-building'></i>Laporan Pembayaran</a>
    <a href="logout.php"><i class='bx bx-log-out'></i>Logout</a>
</div>

<div class="main">
    <div class="header">Dashboard</div>
    <div class="cards">
        <div class="card">
            <i class='bx bx-user'></i>
            <div class="card-info">
                <p>Total Siswa</p>
                <h2><?php echo $total_siswa; ?></h2>
            </div>
        </div>
        <div class="card">
            <i class='bx bx-wallet'></i>
            <div class="card-info">
                <p>Total Pembayaran Lunas</p>
                <h2>Rp <?php echo number_format($total_pembayaran,0,',','.'); ?></h2>
            </div>
        </div>
        <div class="card">
            <i class='bx bx-building'></i>
            <div class="card-info">
                <p>Total Kelas</p>
                <h2><?php echo $total_kelas; ?></h2>
            </div>
        </div>
    </div>
</div>

</body>
</html>
