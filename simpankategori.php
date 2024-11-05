<?php
include 'koneksi.php';
$nama_kategori = $_POST['nama_kategori'];
$sql = mysqli_query($koneksi, "insert into kategori(nama_kategori) values ('$nama_kategori')");
header("location:kategori.php");
?>