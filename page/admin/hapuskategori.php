<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include '../../config/koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM kategori_berita WHERE id_kategori = '$id' ";

    if(mysqli_query($conn, $query)){
        header("location: kategori.php");
        exit();
    }else{
        header("location: kategori.php");
        exit();
    }


}else{
    header("location: kategori.php");
        exit();
}
?>