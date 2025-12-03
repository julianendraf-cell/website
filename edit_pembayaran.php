<?php
session_start();
include 'koneksi_db.php';

// Ambil ID dari query string
if(!isset($_GET['id'])){
    header("Location: data_pembayaran.php");
    exit;
}

$id = $_GET['id'];

// Ambil data pembayaran
$result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id='$id'");
$pembayaran = mysqli_fetch_assoc($result);

if(!$pembayaran){
    echo "<script>alert('Data pembayaran tidak ditemukan'); window.location='data_pembayaran.php';</script>";
    exit;
}

// Proses update
if(isset($_POST['submit'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $update = mysqli_query($conn, "UPDATE pembayaran SET 
                                    nis='$nis', 
                                    nama='$nama', 
                                    kelas='$kelas', 
                                    jurusan='$jurusan', 
                                    jumlah='$jumlah', 
                                    status='$status', 
                                    tanggal='$tanggal' 
                                    WHERE id='$id'");

    if($update){
        echo "<script>alert('Data pembayaran berhasil diperbarui'); window.location='data_pembayaran.php';</script>";
    }else{
        echo "<script>alert('Gagal memperbarui pembayaran: ".mysqli_error($conn)."');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Pembayaran - SPP Online</title>
<link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<style>
* { margin:0; padding:0; box-sizing:border-box; font-family: 'Poppins', sans-serif; }
body { display:flex; min-height:100vh; background:#f0f2f5; }
.sidebar { width:250px; background:#1f2937; color:white; display:flex; flex-direction:column; padding-top:20px; }
.sidebar h2 { text-align:center; font-size:24px; margin-bottom:30px; color:#facc15; }
.sidebar a { padding:15px 25px; text-decoration:none; color:white; display:flex; align-items:center; gap:10px; transition:0.3s; }
.sidebar a i { font-size:18px; }
.sidebar a:hover, .sidebar a.active { background:#374151; border-left:4px solid #facc15; }
.main { flex:1; padding:20px 40px; }
.header { font-size:28px; font-weight:600; margin-bottom:20px; color:#111827; }
.form-container { background:white; padding:20px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.1); max-width:600px; }
.form-container label { display:block; margin-top:15px; font-weight:500; color:#111827; }
.form-container input, .form-container select { width:100%; padding:10px; margin-top:5px; border:1px solid #ccc; border-radius:6px; }
.form-container button { margin-top:20px; padding:10px 20px; border:none; border-radius:6px; background:#3b82f6; color:white; cursor:pointer; font-size:16px; }
.form-container button:hover { background:#2563eb; }
@media(max-width:768px){ body { flex-direction:column; } .sidebar { width:100%; flex-direction:row; overflow-x:auto; } .sidebar a { flex:1; justify-content:center; } .main { padding:20px; } }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SPP Admin</h2>
    <a href="dashboard.php"><i class='bx bx-grid-alt'></i>Dashboard</a>
    <a href="data_siswa.php"><i class='bx bx-user'></i>Data Siswa</a>
    <a class="active" href="data_pembayaran.php"><i class='bx bx-wallet'></i>Pembayaran</a>
    <a href="data_kelas.php"><i class='bx bx-building'></i>Kelas</a>
    <a href="logout.php"><i class='bx bx-log-out'></i>Logout</a>
</div>

<div class="main">
    <div class="header">Edit Pembayaran</div>
    <div class="form-container">
        <form method="POST">
            <label for="nis">NIS</label>
            <input type="text" id="nis" name="nis" value="<?php echo $pembayaran['nis']; ?>" required>

            <label for="nama">Nama Siswa</label>
            <input type="text" id="nama" name="nama" value="<?php echo $pembayaran['nama']; ?>" required>

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" value="<?php echo $pembayaran['kelas']; ?>" required>

            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" value="<?php echo $pembayaran['jurusan']; ?>" required>

            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="<?php echo $pembayaran['jumlah']; ?>" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Lunas" <?php if($pembayaran['status']=='Lunas') echo 'selected'; ?>>Lunas</option>
                <option value="Belum Lunas" <?php if($pembayaran['status']=='Belum Lunas') echo 'selected'; ?>>Belum Lunas</option>
            </select>

            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo $pembayaran['tanggal']; ?>" required>

            <button type="submit" name="submit">Simpan Perubahan</button>
        </form>
    </div>
</div>

</body>
</html>
