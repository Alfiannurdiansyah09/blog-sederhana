<?php
include  'koneksi.php';
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from artikel where id='$id'");
$artikel = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit artikel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    

<h1>Form Tambah Artikel</h1>
   <form action="updateartikel.php" enctype="multipart/form-data" method="POST">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">id</label>
        <input type="text" name="id"   value="<?php echo $artikel['id']?>" class="form-control" id="formGroupExampleInput" placeholder="tambahkan id">
      </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">judul </label>
        <input type="text" name="judul"   value="<?php echo $artikel['judul']?>" class="form-control" id="formGroupExampleInput" placeholder="tambahkan judul">
      </div>
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">tanggal publish </label>
        <input type="text" name="tanggal_publish"   value="<?php echo $artikel['tanggal_publish']?>" class="form-control" id="formGroupExampleInput" placeholder="tambahkan tanggal publish">
      </div>
      <div class="mb-3">
      <label for="kategori">Kategori</label>
      <select name="id_kategori" class="form-select" value="<?php echo $artikel['nama_kategori']?>"  aria-label="Default select example">
         
        <?php
        $kategori = mysqli_query($koneksi,"select * from kategori");
        while($k=mysqli_fetch_array($kategori)){
          echo "<option value='".$k['id']."'>".$k['nama_kategori']."</option>";
        }
        ?>
 </select>
   
       
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">isi artikel</label>
        <input type="textarea" name="isi_artikel"   value="<?php echo $artikel['isi_artikel']?>" class="form-control" id="formGroupExampleInput" placeholder="tambahkan isi artikel">
      </div>
     
   
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">cover</label>
            <input type="file" value="<?php echo $artikel['cover']?>" name=cover class="form-control" id="formGroupExampleInput" placeholder="tambahkan Harga">
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" >id_user</label>
            <select class="form-select" name="id_user"  value="<?php echo $artikel['nama_kategori']?>" type="text"  class="from-control" >
         
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
            <input type="text" name="status_aktif"   value="<?php echo $artikel['status_aktif']?>" class="form-control" id="formGroupExampleInput" placeholder="tambahkan status">
          </div>
         <button type="submit" class="btn btn-warning btn-sm">Simpan</button></a>
          <a href="daftarartikel.php"><button class="btn btn-danger btn-sm">Batal</button></a>
</form>
    
<script src="js/bootstrap.bundle.js"></script>

</body>
</html>