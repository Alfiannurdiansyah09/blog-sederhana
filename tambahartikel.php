<?php
include  'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    

<h1>Form Tambah Artikel</h1>
   <form action="simpanaartikel.php" enctype="multipart/form-data" method="POST">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">id</label>
        <input type="text" name="id" class="form-control" id="formGroupExampleInput" placeholder="tambahkan id">
      </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">judul </label>
        <input type="text" name="judul" class="form-control" id="formGroupExampleInput" placeholder="tambahkan judul">
      </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">tanggal publish </label>
        <input type="date" name="tanggal_publish" class="form-control" id="formGroupExampleInput" placeholder="tambahkan tanggal publish">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">kategori</label>
        <select  name="id_kategori" class="from-control">
         
        <?php
        $kategori = mysqli_query($koneksi,"select * from kategori");
        while($k=mysqli_fetch_array($kategori)){
          echo "<option value='".$k['id']."'>".$k['nama_kategori']."</option>";
        }
        ?>
 </select>
   
       
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">isi artikel</label>
        <textarea  name="isi_artikel" class="form-control" id="formGroupExampleInput" placeholder="tambahkan isi artikel"></textarea>
      </div>
     
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">cover</label>
            <input type="file" name=cover class="form-control" id="formGroupExampleInput" placeholder="tambahkan Harga">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">id_user</label>
            <select name="id_user" class="from-control">
         
         <?php
         $user = mysqli_query($koneksi,"select * from user");
         while($u=mysqli_fetch_array($user)){
           echo "<option value='".$u['id']."'>".$u['nama_user']."</option>";
         }
         ?>
  </select>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">status aktif</label>
            <input type="tex" name="status_aktif" class="form-control" id="formGroupExampleInput" placeholder="tambahkan status">
          </div>
         <button type="submit" class="btn btn-warning btn-sm">Simpan</button></a>
          <a href="daftarartikel.php"><button class="btn btn-danger btn-sm">Batal</button></a>
</form>
    
<script src="js/bootstrap.bundle.js"></script>

</body>
</html>