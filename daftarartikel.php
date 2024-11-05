<?php
include 'koneksi.php';
session_start();
if(empty($_SESSION['nama'])){
    header("location : logiin.php");
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>daftar artikel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/navbar-fixed.css" rel="stylesheet">
  </head>
  <body>
  <!----navbar---->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> 
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index_admin.php">home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kategori.php">kategori</a>
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
    


<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container mt-5">

<h1 align="center"> daftar artikel</h1>
  
<table class="table table-bordered table-hover" margin="0">
    <thead class="table-dark">
      <tr align="center">
        <th>id</th>
        <th>judul</th>
        <th>tanggal_publish</th>
        <th>id_kategori</th>
        <th>isi_artikel</th>   
        <th>cover </th> 
        <th>id_user </th> 
        <th>status_aktif</th> 
        <th> aksi</th> 
      </tr>
    </thead>

    <tbody>
      <?php
      $artikel = mysqli_query($koneksi,"SELECT a.*,k.nama_kategori
                                        FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id;" );
      $nomor=1;                             
      while($row=mysqli_fetch_array($artikel)){
      ?>
      <tr>
        <td><?php echo $row['id']?></td> 
        <td><?php echo $row['judul'] ?></td>
        <td><?php echo $row['tanggal_publish'] ?></td>
        <td><?php echo $row['nama_kategori'] ?></td>
        <td><?php echo $row['isi_artikel'] ?></td>
       
        <td><img src="file_cover/<?php echo $row['cover'] ?>" width="100"></td>
        <td><?php echo $row['id_user'] ?></td>      
        <td><?php echo $row['status_aktif'] ?></td>
        <td>   
        <div class="d-flex gap-2">
            <a href="editartikel.php?id=<?php echo $row ['id'] ?>" class="btn btn-warning btn-sm"> edit
      </a>  
        
      <form action="hapusartikel.php" method="POST">
        <input type="hidden" value="<?php echo $row['id']?>" name="id">
          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
      </form>
        </td>
      </tr>
      <tr>
        
      <?php
      $nomor++;
     } ?>
        <td colspan="9"  align="center">
            <a href="tambahartikel.php"> <button class="btn btn-primary btn-sm w-75"> tambah artikel</button>
        </th>
      </tr>
      
   


    </body>
</html>