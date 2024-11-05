<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from artikel where id='$id'");
$article = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lihat Lebih</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="index.php">Home</a>
        
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
          <a class="btn btn-sm btn-outline-secondary" href="formlogin.php">Sign up</a>     
    </div>
</nav>




<!-- carousel -->

 <header class="py-5 bg-light border-bottom mb-4">
       <div class="container">
             <div class="text-center my-5">
                   <h1 class="fw-bolder">Selamat Datang</h1>
                   <p class="lead mb-0">"Makin aku banyak membaca, makin aku banyak berpikir; makin aku banyak belajar, makin aku sadar bahwa aku tak mengetahui apa pun." - Voltaire</p>
              </div>
       </div>
 </header>



 <!-- Page content-->
<div class="container">
   <div class="row">
             
   
           <!-- ini card -->
              <div class=" py-3">
                 <div  class="row gap-5 ">
                     <div class="container2">  
                       <?php
                           $artikel = mysqli_query($koneksi,"SELECT a.*,k.nama_kategori
                                        FROM artikel as a JOIN kategori as k ON a.id_kategori=k.id  " );
                           $nomor=1;                             
                           while($row=mysqli_fetch_array($artikel)){
                       ?>
                           <div class="card col-6 " style="width: 18rem;">
                             <img  src="file_cover/<?php echo $row['cover'] ?>"    width="250">
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
              </div>




<!-- isi artikel -->
  <div class="col-lg-8">
    <div class="container ">
      
    <div class="">
      <article class="blog-post">
      
        <h2   class="display-5 link-body-emphasis mb-1"><?php echo $article['judul'] ?></h2>
        <img src="file_cover/<?php echo $article['cover'] ?>" width="250">
            <p class="blog-post-meta"><?php echo $article['tanggal_publish'] ?> <a href="#">Mark</a></p>
            <?php echo $article['isi_artikel'] ?>
     </div>

    </div>   
       </div>
    
    
  
  <!-- samping -->
  <div class="col-lg-4">
                  
                    <!-- Search widget-->
                    <div class="card mb-4">
                         <div class="card-header">Komentar</div>
                    <div class="card-body">
                        <form action="proses_komentar.php" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control" id="nama" name="nama" required />
                            </div>
                            <div class="mb-3">
                                <label for="komentar" class="form-label">Komentar</label>
                                <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
                            </div>
                            <input type="hidden" name="id_artikel" value="<?php echo $article['id']; ?>" />
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                        <div class="mt-4">
                            <h5>Daftar Komentar:</h5>
                            <?php
                            $komentar_query = "SELECT * FROM komentar WHERE id_artikel = $id ORDER BY created_at DESC";
                            $komentar_result = mysqli_query($koneksi, $komentar_query);
                            while ($komentar = mysqli_fetch_assoc($komentar_result)) {
                                echo "<div class='border p-2 mb-2'>";
                                echo "<strong>" . htmlspecialchars($komentar['nama']) . "</strong>";
                                echo "<p>" . nl2br(htmlspecialchars($komentar['komentar'])) . "</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>
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
                                        <a href="detailkategori.php?id=<?php echo $kategori['id']; ?>">
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
 <footer class="py-1 text-center text-body-secondary bg-body-tertiary">
  <p>2024 My Awesome website All rights reserved </p>
 
</footer>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>