<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $komentar = $_POST['komentar'];
    $id_artikel = (int)$_POST['id_artikel'];

    // Masukkan komentar ke database
    $query = "INSERT INTO komentar (nama, komentar, id_artikel) VALUES ('$nama', '$komentar', $id_artikel);";
    if (mysqli_query($koneksi, $query)) {
        header("Location: lihatlebih_user.php?id=$id_artikel");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>