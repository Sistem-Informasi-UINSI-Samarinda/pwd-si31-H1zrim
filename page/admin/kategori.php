<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/koneksi.php';

$kategori = "SELECT * FROM kategori_berita";
$tampilkategori = mysqli_query($conn, $kategori);

?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>

<div class="main-content">
    <header>
      <a href="tambahkategori.php">+ tambah Kategori</a>
      <a href="berita.php"><- Kembali</a>
    </header>

    <section class="cards">
        <div class="card">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($tampilkategori)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama_kategori'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td>
                        <a href="editkategori.php?id=<?php echo $row['id_kategori'] ?>">Edit</a> |
                        <a href="hapuskategori.php?id=<?php echo $row['id_kategori'] ?>"
                        onclick = "return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
                    </td>
                </tr>

                <?php } ?>
            </table>
        </div>
    </section>
  </div>

<?php include 'footer.php' ?>
</html>