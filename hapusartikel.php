<?php
include 'koneksi.php';
$id= $_POST['id'];
$sql = mysqli_query($koneksi,"delete from artikel where id ='$id'");
header("location:daftarartikel.php");
?>