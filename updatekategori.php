<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$update = mysqli_query($koneksi,"update kategori set nama_kategori='$nama_kategori' where id='$id'");
header("location:kategori.php");

?>