<?php
session_start();
include 'koneksi_db.php';

if(!isset($_GET['id'])){
    header("Location: data_pembayaran.php");
    exit;
}

$id = $_GET['id'];


$delete = mysqli_query($conn, "DELETE FROM pembayaran WHERE id='$id'");

if($delete){
    echo "<script>alert('Pembayaran berhasil dihapus'); window.location='data_pembayaran.php';</script>";
}else{
    echo "<script>alert('Gagal menghapus pembayaran: ".mysqli_error($conn)."'); window.location='data_pembayaran.php';</script>";
}
