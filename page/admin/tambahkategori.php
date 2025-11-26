<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>

<div class="main-content">
    <section class="cards">
        <form action="" method="post">
            <label for="">Nama Kategori</label>
            <br>
            <input type="text" name="nama_kategori">
            <br>
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
     
    </section>
  </div>
<?php 
include '../../config/koneksi.php';

if(isset($_POST['simpan'])){
    $nama_kategori = $_POST['nama_kategori'];
    $created_at = date("Y-m-d H:i:s");

    $query = "
            INSERT INTO kategori_berita 
            (nama_kategori, created_at) VALUES
            ('$nama_kategori','$created_at')
            ";

    if(mysqli_query($conn, $query)){
        header("location: kategori.php");
        exit();
    }
    else{
        echo "Gagal menambahkan data: ". mysqli_error($conn);
        exit();
    }
}
?>

<?php include 'footer.php' ?>
</html>