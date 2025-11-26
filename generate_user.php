<?php
include 'config/koneksi.php';

$username = "admin";
$email = "admin@gmail.com";
$password = password_hash("123456", PASSWORD_DEFAULT);
$nama_lengkap = "admin sayang";

$query =   "
            INSERT INTO users(username, email, password, nama_lengkap)
            VALUES('$username', '$email', '$password', '$nama_lengkap')
            ";

if (mysqli_query($conn, $query)){
    echo "akunnya udah selesai";
} else{
    echo "gagal bosku", mysqli_error($conn);
}

?>