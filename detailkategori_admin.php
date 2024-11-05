<?php
include 'koneksi.php';
// Mengambil ID kategori dari URL
$id_kategori = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query untuk mengambil kategori berdasarkan ID
$kategori_query = "SELECT * FROM kategori WHERE id = $id_kategori";
$kategori_result = $koneksi->query($kategori_query);
$kategori = $kategori_result->fetch_assoc();

// Query untuk mengambil artikel berdasarkan kategori
$sql = "SELECT * FROM artikel WHERE id_kategori = $id_kategori";
$artikel_result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Detaik kategori</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
     <a class="navbar-brand" href="index_admin.php">Home</a>
     <label for="formGroupExampleInput" class="form-label">kategori</label>
                   <div class="card-body">
                      <div class="row">
                           <div class="col-sm-12">
                              <ul class="list-unstyled mb-0">
                                <?php
                                // Fetch categories from the database
                                $kategori_query = "SELECT * FROM kategori";
                                $kategori_result = $koneksi->query($kategori_query);
                                if ($kategori_result->num_rows > 0) {
                                // Output data for each category
                                while ($kategori = $kategori_result->fetch_assoc()) {
                                    ?>
                                    
                                        <a href="detailkategori.php?id=<?php echo $kategori['id']; ?>">
                                            <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                                        </a>
                                    
                                    <?php
                                     }
                                     } else {
                                       echo "<li>No categories found.</li>";
                                     }
                                   ?>
                              </ul>
                                </div>
                            </div>
                        </div>
                    </div>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="artikel.php"></a>
            </li>                
          </ul>          
               
       </div>
  </div>
</nav>


<!-- carousel -->

<header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Selamat Datang</h1>
                    
                </div>
            </div>
        </header>


<div class="container">
<!-- ini card -->
<!-- <div class=" py-3">
  <div  class="row gap-5 ">
    <div class="container2">
   
     <?php
        $artikel = mysqli_query($koneksi,"SELECT a.*,k.nama_kategori
                                        FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id  " );
        $nomor=1;                             
        while($row=mysqli_fetch_array($artikel)){
      ?>
   <div class="card col-6 " style="width: 18rem;">
    <img align="center" src="file_cover/<?php echo $row['cover'] ?>" width="250">
     <div class="card-body">
       <h5 class="card-title"><?php echo $row['judul'] ?></h5>
      
     </div>
   
    <div class="card-body">
     <a href="lihatlebih.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm w-75">lihat lebih</a>
    
    </div>
   </div>
 <?php 
$nomor++;
}?> 
 
  </div>
</div>
</div> -->




<div class="container main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    if ($artikel_result->num_rows > 0) {
                        // Output data untuk setiap artikel
                        while ($artikel = $artikel_result->fetch_assoc()) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="file_cover/<?php echo htmlspecialchars($artikel['cover']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($artikel['judul']); ?></h5>
                                        <p class="card-text"><?php echo substr(htmlspecialchars($artikel['isi_artikel']), 0, 100); ?>...</p>
                                        <a href="lihatlebih_admin.php?id=<?php echo $artikel['id']; ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No articles found in this category.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>




</div>
</div>
 <!-- footer -->
 <footer class="py-1 text-center text-body-secondary bg-body-tertiary">
  <p>2024 My Awesome website All rights reserved </p> 
 
</footer>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>