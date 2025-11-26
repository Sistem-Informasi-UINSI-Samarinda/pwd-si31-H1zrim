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
    <header>
      <a href="kategori.php">List Kategori</a>
      <a href="tambahberita.php">+ Tambah Berita</a>
    </header>

    <section class="cards">
      
    </section>
  </div>

<?php include 'footer.php' ?>
</html>