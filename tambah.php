<?php
include 'koneksi.php';

if (isset($_POST['pesan'])) {
    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_pemesan, tujuan, jumlah_tiket, tanggal_berangkat) VALUES ('$nama', '$tujuan', '$jumlah', '$tanggal')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal memesan tiket.";
    }
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <h2>Form Pemesanan Tiket</h2>
    <form method="POST" action="">
        <label>Nama Pemesan:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Tujuan:</label><br>
        <select name="tujuan">
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Yogyakarta">Yogyakarta</option>
        </select><br><br>

        <label>Jumlah Tiket:</label><br>
        <input type="number" name="jumlah" min="1" required><br><br>

        <label>Tanggal Berangkat:</label><br>
        <input type="date" name="tanggal" required><br><br>

        <button type="submit" name="pesan">Pesan Sekarang</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>