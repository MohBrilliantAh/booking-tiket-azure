<?php 
// PENTING: Baris ini wajib ada di paling atas!
include 'koneksi.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pemesanan Tiket</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2>Daftar Pemesanan Tiket</h2>
    <br>
    
    <a href="tambah.php" class="btn-tambah">+ Pesan Tiket Baru</a>
    <br><br>
    
    <table border="0" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Tujuan</th>
                <th>Jumlah</th>
                <th>Tgl Berangkat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query mengambil data dari database
            $query = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id DESC");
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_pemesan']; ?></td>
                <td><?php echo $data['tujuan']; ?></td>
                <td><?php echo $data['jumlah_tiket']; ?></td>
                <td><?php echo $data['tanggal_berangkat']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn-edit">Ubah</a> 
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Batalkan pesanan ini?')" class="btn-hapus">Batal</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>