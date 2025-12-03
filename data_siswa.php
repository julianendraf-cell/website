<?php
session_start();
include 'koneksi_db.php';

$keyword = '';
if(isset($_GET['search'])){
    $keyword = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM siswa 
              WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' 
              ORDER BY nis ASC";
}else{
    $query = "SELECT * FROM siswa ORDER BY nis ASC";
}

$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Siswa - SPP Online</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family: 'Poppins', sans-serif; }
body{ display:flex; min-height:100vh; background:#f0f2f5; }
.sidebar{ width:250px; background:#1f2937; color:white; display:flex; flex-direction:column; padding-top:20px; }
.sidebar h2{ text-align:center; font-size:24px; margin-bottom:30px; color:#facc15; }
.sidebar a{ padding:15px 25px; text-decoration:none; color:white; display:flex; align-items:center; gap:10px; transition:0.3s; }
.sidebar a i{ font-size:18px; }
.sidebar a:hover, .sidebar a.active{ background:#374151; border-left:4px solid #facc15; }
.main{ flex:1; padding:20px 40px; }
.header{ font-size:28px; font-weight:600; margin-bottom:20px; color:#111827; }
.table-container{ background:white; padding:20px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); }
.table-container table{ width:100%; border-collapse:collapse; }
.table-container th, .table-container td{ padding:12px 10px; border-bottom:1px solid #ddd; text-align:left; }
.table-container th{ background:#f3f4f6; }
.btn{ text-decoration:none; padding:6px 12px; border-radius:6px; color:white; font-size:14px; }
.btn-edit{ background:#3b82f6; }
.btn-delete{ background:#ef4444; }
.btn-add{ background:#10b981; margin-bottom:10px; display:inline-block; }
.search-bar input{ padding:6px 10px; border:1px solid #ccc; border-radius:6px; }
.search-bar button{ padding:6px 12px; border:none; border-radius:6px; background:#3b82f6; color:white; cursor:pointer; }
@media(max-width:768px){ body{ flex-direction:column; } .sidebar{ width:100%; flex-direction:row; overflow-x:auto; } .sidebar a{ flex:1; justify-content:center; } .main{ padding:20px; } }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SPP Admin</h2>
    <a href="beranda_admin.php"><i class='bx bx-grid-alt'></i>Dashboard</a>
    <a><i class='bx bx-user'></i>Data Siswa</a>
    <a href="data_pembayaran.php"><i class='bx bx-wallet'></i>Pembayaran</a>
    <a href="laporan_pembayaran.php"><i class='bx bx-building'></i>Laporan Pembayaran</a>
    <a href="logout.php"><i class='bx bx-log-out'></i>Logout</a>
</div>

<div class="main">
    <div class="header">Data Siswa</div>

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; flex-wrap:wrap;">
        <a href="tambah_siswa.php" class="btn btn-add">+ Tambah Siswa</a>

        <form method="GET" class="search-bar" style="display:flex; gap:10px;">
            <input type="text" name="search" placeholder="Cari nama atau kelas..." value="<?php echo htmlspecialchars($keyword); ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <div class="table-container">
       
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nis']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['kelas']."</td>";
            echo "<td>".$row['jurusan']."</td>";
            echo "<td>
                    <a href='edit_siswa.php?nis=".$row['nis']."' class='btn btn-edit'>Edit</a>
                    <a href='hapus_siswa.php?nis=".$row['nis']."' class='btn btn-delete' onclick=\"return confirm('Yakin ingin hapus siswa ini?')\">Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
    </div>
</div>

</body>
</html>
