<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="daftarartikel.php">artikel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="kategori.php">kategori</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <li class="nav-item">
        <a href="logout.php" class="btn btn-outline-success" type="submit">logout</a href="logout.php">
        </li>
        
             
    </div>
</nav>


<header class="py-5 bg-light border-bottom mb-4">
    <div class="container" >
        <div class="text-center my-5">
            <h1 class="fw-bolder">Selamat Datang</h1>
            <p class="lead mb-0"></p>
        </div>
    </div>
</header>

<!-- Page content -->
<div class="container">
    <div class="row">
       
    
       <!-- ini card -->
       <div class="py-3">
                 <div class="row gap-5 ">
                     <div class="container2">  
                     <?php
      $artikel = mysqli_query($koneksi,"SELECT a.*,k.nama_kategori
                                        FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id;" );
      $nomor=1;                             
      while($row=mysqli_fetch_array($artikel)){
      ?>
                           <div class="card col-6" style="width: 18rem;">
                             <img src="file_cover/<?php echo $row['cover'] ?>" width="250">
                                <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['judul'] ?></h5>
                                </div>
                               <div class="card-body">
                                 <a href="lihatlebih_admin.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm w-75">lihat lebih</a>
                               </div>
                          </div>
                         <?php 
                         $nomor++;
                        }?> 
                     </div>                
                 </div>
              </div>

      <!-- isi artikel --> 
        <div class="col-lg-8">
            <div class="container1">
                <?php
                $search_query = isset($_GET['search']) ? $_GET['search'] : '';
                $search_query = mysqli_real_escape_string($koneksi, $search_query);

                if ($search_query) {
                    $artikel = mysqli_query($koneksi, "SELECT a.*, k.nama_kategori FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id WHERE a.judul LIKE '%$search_query%' OR a.isi_artikel LIKE '%$search_query%'");
                } else {
                    $artikel = mysqli_query($koneksi, "SELECT a.*, k.nama_kategori FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id LIMIT 25");
                }

                while ($row = mysqli_fetch_array($artikel)) {
                    ?>
                    <div class="col-md-8">
                        <article class="blog-post">      
                            <h2 class="display-5 link-body-emphasis mb-1"><?php echo $row['judul']; ?></h2>
                            <img src="file_cover/<?php echo $row['cover']; ?>" width="250">
                            <p class="blog-post-meta"><?php echo $row['tanggal_publish']; ?></p>
                            <?php echo $row['isi_artikel']; ?>
                        </article>
                    </div>
                    <?php
                }
                ?>
            </div> 
        </div>
        
        <!-- samping -->
        <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form method="GET" action="">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" placeholder="Enter search term..." aria-label="Enter search term..." />
                                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Kategori</div>
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
                                    <li>
                                        <a href="detailkategori_admin.php?id=<?php echo $kategori['id']; ?>">
                                            <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                                        </a>
                                    </li>
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
                    
                </div>
        </div>
        
   </div>      
</div>

<!-- footer -->
<footer class="py-1 text-center text-body-secondary bg-body-tertiary w-100">
    <p>2024 My Awesome website All rights reserved</p>
</footer>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>