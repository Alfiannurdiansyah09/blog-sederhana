<?php
include 'koneksi.php';
session_start();
//cara membaca inputan dari form
$nama_user = $_POST['nama_user'];
$password =  $_POST['password'];

//melakukan pengecekan ke tabel user
$sql ="select * from user where (nama_user='$nama_user' or email='$nama_user') and password='$password'";
//melakukan konversi hasil menjadi quary
$user = mysqli_fetch_array(mysqli_query($koneksi,$sql));

if($user){
    echo "berhasil login";
   $_SESSION['nama'] = $user['nama_user'];
    header("location:index_user.php");
    if($user ['is_admin']=="1"){
        header("location:index_admin.php");
    }
} else{
   echo "gagal login";
    header("location:index.php");
}

exit;


?>