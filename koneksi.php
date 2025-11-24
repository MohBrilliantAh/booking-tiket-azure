<?php
// Cek apakah kita punya alamat database dari Azure?
$azure_host = getenv('DB_HOST');

if ($azure_host) {
    // === INI SETTINGAN KHUSUS AZURE ===
    $host = getenv('DB_HOST');      // Mengambil dari App Settings Azure
    $user = getenv('DB_USERNAME');  // Mengambil dari App Settings Azure
    $pass = getenv('DB_PASSWORD');  // Mengambil dari App Settings Azure
    $db   = "db_tiket";             // Nama database kamu
    
    // Azure MySQL lebih stabil pakai mysqli_init + real_connect
    $koneksi = mysqli_init();
    // Port 3306 adalah port standar MySQL
    mysqli_real_connect($koneksi, $host, $user, $pass, $db, 3306);

} else {
    // === INI SETTINGAN KHUSUS LAPTOP (LARAGON) ===
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_tiket";
    
    $koneksi = mysqli_connect($host, $user, $pass, $db);
}

// Cek jika gagal
if (!$koneksi) {
    die("Gagal Konek Database: " . mysqli_connect_error());
} else {
    // (Opsional) Hilangkan baris echo ini nanti kalau sudah fix
    // echo "Koneksi Berhasil!"; 
}
?>
