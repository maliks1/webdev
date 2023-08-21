<!DOCTYPE html> <!-- Deklarasi tipe dokumen HTML yang digunakan, dalam hal ini adalah HTML5 -->
<html lang="en">

<!--Tag <head> adalah bagian dari elemen utama dalam dokumen HTML. Ini digunakan untuk mengatur metadata dan berkas-berkas yang berkaitan
dengan tampilan dan sifat-sifat lain dari halaman web. Bagian ini biasanya tidak ditampilkan kepada pengguna secara langsung di halaman web, tetapi berisi informasi yang penting bagi browser, mesin pencari, dan alat lainnya yang mengakses halaman web.-->

<head>
    <!--digunakan untuk menentukan jenis encoding karakter yang digunakan dalam halaman web.
    Encoding karakter mengacu pada cara karakter-karakter teks diwakili dalam komputer, yang sangat penting untuk memastikan bahwa karakter-karakter yang berbeda (seperti huruf, angka, tanda baca, dan simbol lainnya) ditampilkan dengan benar oleh browser.-->
    <meta charset="UTF-8">
    <!-- adalah elemen dalam tag <head> dalam dokumen HTML yang digunakan untuk mengontrol tampilan dan skala responsif dari halaman web pada berbagai perangkat, terutama perangkat mobile.
    Ini sangat penting untuk memastikan bahwa halaman web Anda tampil dengan baik dan sesuai pada layar yang berbeda, mulai dari layar komputer hingga layar ponsel pintar.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tag <title> digunakan untuk menentukan judul atau nama dari halaman web yang sedang ditampilkan -->
    <title>Home</title>
    <!-- Menghubungkan dengan stylesheet Bootstrap untuk tampilan yang responsif -->
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <link rel="stylesheet" href="library/css/style.css">
    <!-- Menghubungkan dengan script Bootstrap untuk fitur-fitur interaktif -->
    <script src="library/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="hero-image"> <!-- Bagian ini adalah elemen <div> yang digunakan untuk menampilkan gambar latar belakang (hero image). -->
        <div class="hero-text"> <!-- Bagian ini adalah elemen <div> yang digunakan untuk menampilkan Text di bagian halaman. -->
            <h1>Selamat Datang</h1> <!-- Bagian ini adalah teks dengan ukuran yang paling besar -->
            <p>Silahkan login terlebih dahulu</p> <!-- Bagian ini adalah teks paragraf -->
            <a class="nav-link" href="login.php"> <!-- Bagian ini link untuk pindah ke halaman login.php -->
            <button type="button" class="btn btn-primary btn-lg">Login</button> <!-- ketika tombol di tekan maka akan pindah ke halaman login.php -->
            </a>
        </div>
    </div>
</body>
<!--ini adalah akhir dari kode html dengan penutup tag html-->

</html>