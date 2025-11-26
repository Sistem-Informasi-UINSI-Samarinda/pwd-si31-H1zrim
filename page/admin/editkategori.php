<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

if(isset($_GET['id'])){
    $id_kategori = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM kategori_berita WHERE id_kategori = '$id_kategori'");
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>
    alert('ID Kategori tidak ditemukan'); 
    window.location.href='kategori.php';
    </script>";
}
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>

 <div class="main-content">
    <section class="cards">
        <form action="" method="post">
            <label for="">Nama Kategori</label>
            <br>
            <input type="text" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>">
            <br>
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
     
    </section>
  </div>
<?php 

if(isset($_POST['simpan'])){
    $nama_kategori = $_POST['nama_kategori'];

    $query = "
            UPDATE kategori_berita 
            SET nama_kategori = '$nama_kategori'
            WHERE id_kategori = '$id_kategori'
            ";

    if(mysqli_query($conn, $query)){
        header("Location: kategori.php");
        exit();
    }
    else{
        echo "Gagal menambahkan data: ". mysqli_error($conn);
    }
}
?>

<?php include 'footer.php' ?>
</html>