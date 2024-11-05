<?php
include 'koneksi.php';
$id               =$_POST['id'];
$judul            =$_POST['judul'];
$tanggal_publish  =$_POST['tanggal_publish'];
$id_kategori      =$_POST['id_kategori'];
$isi_artikel      =$_POST['isi_artikel'];
$id_user          =$_POST['id_user'];
$status_aktif     =$_POST['status_aktif'];

$target_dir = "file_cover/";
$namaFile = $_FILES["cover"]["name"];
$target_file = $target_dir . basename($namaFile);
$namaSementara = $_FILES['cover']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, $target_file);

$sql = mysqli_query($koneksi, "insert into artikel(id, judul,tanggal_publish,id_kategori,isi_artikel,cover,id_user,status_aktif)
values ('$id','$judul','$tanggal_publish','$id_kategori','$isi_artikel','$namaFile','$id_user','$status_aktif')");
header("location:daftarartikel_user.php");

?>
