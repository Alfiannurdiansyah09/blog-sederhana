<?php
include 'koneksi.php';
$id= $_POST['id'];
$sql = mysqli_query($koneksi,"delete from kategori where id ='$id'");
header("location:kategori.php");
?>