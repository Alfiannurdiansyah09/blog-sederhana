<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah kategori</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h1>Form tambah kategori</h1>
    <form action="simpankategori.php" method="POST">
   
    <!-- <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">ID kategori</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="tambahkan ID kategori">
      </div> -->
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Nama kategori</label>
        <input type="text" name="nama_kategori" class="form-control" id="formGroupExampleInput2" placeholder="tambahkan nama kategori">
      </div>
      <div class="mb-3">
     
          <a href="kategori.php"><button class="btn btn-warning btn-sm">Simpan</button></a>
          <a href="kategori.php"><button class="btn btn-danger btn-sm">Batal</button></a>
</form>
    
    <script src="js/bootstrap.bundle.js"></script>