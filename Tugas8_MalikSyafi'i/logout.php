<?php
//memulai sesi
session_start();

// Hapus semua data sesi
session_unset();

// Hapus sesi secara permanen
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- judul halaman logout serta mengimport data css dan javascript-->
    <title>Logout</title>
    <!-- Menghubungkan dengan stylesheet Bootstrap untuk tampilan yang responsif -->
    <link rel="stylesheet" href="library/css/style.css">
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <!-- Menghubungkan dengan script Bootstrap untuk fitur-fitur interaktif -->
    <script src="library/js/bootstrap.min.js"></script>
</head>

<body class="bodys"> <!-- Bagian ini adalah elemen <body> yang digunakan untuk menampilkan bagian body halaman. -->
    <div class="hero-text">
        <!-- Bagian ini adalah elemen <div> yang digunakan untuk menampilkan Text di bagian halaman. -->
        <h1>Terima kasih telah menggunakan layanan kami!</h1>
        <!-- Bagian ini adalah teks dengan ukuran yang paling besar -->
        <p>Anda telah berhasil logout dari akun Anda</p><!-- Bagian ini adalah teks paragraf -->
        <p>Silakan kembali ke halaman utama</p>
        <a class="nav-link" href="home.php"> <!-- Bagian ini link untuk pindah ke halaman home.php -->
            <button type="button" class="btn btn-primary btn-lg">Home</button>
            <!-- ketika tombol di tekan maka akan pindah ke halaman home.php -->
        </a>
    </div>
</body>

</html>