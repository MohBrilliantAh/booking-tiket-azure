<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id='$id'");

if ($query) {
    header("Location: index.php");
} else {
    echo "Gagal membatalkan pesanan.";
}
?>