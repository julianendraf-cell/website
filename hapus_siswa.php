<?php
session_start();
include 'koneksi_db.php';

if(!isset($_GET['nis'])){
    header("Location: data_siswa.php");
    exit;
}

$nis = $_GET['nis'];


$delete = mysqli_query($conn, "DELETE FROM siswa WHERE nis='$nis'");

if($delete){
    echo "<script>alert('Data siswa berhasil dihapus'); window.location='data_siswa.php';</script>";
}else{
    echo "<script>alert('Gagal menghapus data siswa: ".mysqli_error($conn)."'); window.location='data_siswa.php';</script>";
}
