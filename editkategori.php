<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <?php
include 'koneksi.php';
$id = $_GET['id_kategori'];
$sql = mysqli_query($koneksi, "select * from kategori where id ='$id'");
$kategori = mysqli_fetch_array($sql);

?>
    <h1>Form Edit kategori</h1>
   
    <form action="updatekategori.php" method="POST">
           
      <div class="mb-3">
        <label for="namaKategori" class="form-label">id kategori</label>
        <input name="id" value="<?php echo $kategori['id']?>"type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="namaKategori" class="form-label">Nama kategori</label>
        <input name="nama_kategori" value="<?php echo $kategori['nama_kategori']?>"type="text" class="form-control" id="namaKategori" placeholder="tambahkan nama kategori" required>
      </div>
     
     
          <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
          <a href="kategori.php"><button class="btn btn-danger btn-sm">Batal</button></a>
    </form>

        
    
    <script src="js/bootstrap.bundle.js"></script>