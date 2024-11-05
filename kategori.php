<?php
include 'koneksi.php';
session_start();
if(empty($_SESSION['nama'])){
    header("location : logiin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index_admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="daftarartikel.php">artikel</a>
        </li>
        <li class="nav_item">
            <a class="nav-link active"><?php echo $_SESSION['nama'];?></a>  
        <li class="nav-item">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">teknologi</a></li>
            <li><a class="dropdown-item" href="#">kesehatan</a></li>
            <li><a class="dropdown-item" href="#">lingkungaan</a></li>
            <li><a class="dropdown-item" href="#">pendidikan</a></li>
            <li><a class="dropdown-item" href="#">gaya hidup</a></li>
          </ul> -->
          <li class="nav-item">
        <a href="logout.php" class="btn btn-outline-success" type="submit">logout</a href="logout.php">
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

<div class="container mt-5">

<h1 align="center"> daftar kategori artikel</h1>
  
<table class="table table-bordered table-hover" margin="0">
    <thead class="table-dark">
      <tr align="center">
        <th>id </th>
        <th>Nama kategoori</th>
     
        <th>Aksi</th> 
      </tr>
    </thead>
    <tbody>
      <?php
      $kategori = mysqli_query($koneksi,"select * from kategori");
      $nomor = 1;
      while($row=mysqli_fetch_array($kategori)){
      ?>
      <tr>
        <td><?php echo $nomor;?></td>
        <td><?php echo $row['nama_kategori'] ?></td>            
        <td>
             <div class="d-flex gap-2">
                <a href="editkategori.php?id_kategori=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"> edit   </a>
                <form action="hapuskategori.php" method="POST">
        <input type="hidden" value="<?php echo $row['id']?>" name="id">
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
      </form>
        </td>
      </tr>

      <tr>
     <?php
      $nomor++;
     } 
     ?>
        <td colspan="3"  align="center">
            <a href="tambahkategori.php"> <button class="btn btn-primary btn-sm w-75"> tambah kategori</button>
        </th>
      </tr>
      
</thead>
</table>
<script src="js/bootstrap.bundle.js"></script>
</div>

</body>
</html>