<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id='$id'"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $tujuan = $_POST['tujuan'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($koneksi, "UPDATE pesanan SET nama_pemesan='$nama', tujuan='$tujuan', jumlah_tiket='$jumlah', tanggal_berangkat='$tanggal' WHERE id='$id'");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal update data.";
    }
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <h2>Ubah Data Pesanan</h2>
    <form method="POST" action="">
        <label>Nama Pemesan:</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama_pemesan']; ?>" required><br><br>

        <label>Tujuan:</label><br>
        <select name="tujuan">
            <option value="Jakarta" <?php if($data['tujuan'] == 'Jakarta') echo 'selected'; ?>>Jakarta</option>
            <option value="Bandung" <?php if($data['tujuan'] == 'Bandung') echo 'selected'; ?>>Bandung</option>
            <option value="Surabaya" <?php if($data['tujuan'] == 'Surabaya') echo 'selected'; ?>>Surabaya</option>
            <option value="Yogyakarta" <?php if($data['tujuan'] == 'Yogyakarta') echo 'selected'; ?>>Yogyakarta</option>
        </select><br><br>

        <label>Jumlah Tiket:</label><br>
        <input type="number" name="jumlah" value="<?php echo $data['jumlah_tiket']; ?>" required><br><br>

        <label>Tanggal Berangkat:</label><br>
        <input type="date" name="tanggal" value="<?php echo $data['tanggal_berangkat']; ?>" required><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>