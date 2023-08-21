<!-- Deklarasi tipe dokumen HTML yang digunakan, dalam hal ini adalah HTML5 -->
<html lang="en"> <!-- Mulai elemen <html> dengan atribut bahasa "en" (Inggris) untuk pengaturan bahasa halaman -->

<?php
session_start(); // Memulai sesi atau melanjutkan sesi yang sudah ada

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum masuk, arahkan kembali ke halaman login
    exit();
}
// Bagian awal dari tag PHP, menandakan dimulainya kode PHP
// Mengimpor definisi variabel dan kode dari file globalVar.php
require_once "globalVar.php";
//Fungsi ini digunakan untuk membaca data tiket penerbangan kemudian menampilkan nya
function displaySortedFlightData()
{
    // Baca data JSON dari file
    $jsonData = file_get_contents('data/data.json'); // Mengambil dari folder "data"
    $data = json_decode($jsonData, true);

    // Mengurutkan data berdasarkan nama maskapai dari A-Z
    usort($data, function ($a, $b) {
        return strcmp($a['maskapai'], $b['maskapai']);
    });

    // Output data ketika variable tidak kosong menggunakan for each untuk array
    if (!empty($data)) {
        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . $row['maskapai'] . '</td>';
            echo '<td>' . $row['bandaraAsal'] . '</td>';
            echo '<td>' . $row['bandaraTujuan'] . '</td>';
            echo '<td>' . $row['hargaTiket'] . '</td>';
            echo '<td>' . $row['pajakTiket'] . '</td>';
            echo '<td>' . $row['totalHargaTiket'] . '</td>';
            echo '</tr>';
        }
    }
}
// Bagian akhir dari tag PHP, menandakan berakhirnya kode PHP
?>

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
    <title>Daftar Rute</title>
    <!-- Menghubungkan dengan stylesheet Bootstrap untuk tampilan yang responsif -->
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <!-- Menghubungkan dengan script Bootstrap untuk fitur-fitur interaktif -->
    <script src="library/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Elemen <body> dengan kelas "container" digunakan untuk mengatur tata letak konten halaman -->
    <!-- Elemen <header> digunakan untuk mengelompokkan konten yang berkaitan dengan bagian kepala halaman -->
    <header>
        <!-- Isi dari elemen <header> bisa termasuk judul, logo, menu navigasi, dan elemen lainnya -->
        <!-- Elemen <nav> dengan kelas "navbar navbar-expand-lg navbar-dark bg-dark" digunakan untuk membuat navigasi dengan tampilan gelap (navbar dark) yang responsif (expand-lg) -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Isi dari elemen <nav> biasanya berisi menu navigasi atau tautan ke halaman-halaman terkait -->
            <!-- Elemen <div> dengan kelas "container-fluid" digunakan untuk membuat wadah (container) dengan lebar penuh (fluid) yang merespons lebar layar -->
            <div class="container-fluid">
                <!-- Isi dari elemen <div> ini akan mengisi seluruh lebar layar dan menyesuaikan responsif terhadap perangkat yang digunakan -->
                <!-- Elemen <ul> dengan kelas "navbar-nav" digunakan untuk membuat daftar navigasi (unordered list) dalam tampilan navigasi -->
                <ul class="navbar-nav">
                    <!-- Setiap elemen <li> dalam <ul> ini mewakili sebuah tautan navigasi dalam menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="addRute.php">Add Rute</a>
                    </li>
                    <li class="nav-item">
                        <!-- class nav-link active digunakan untuk memberikan highlight warna putih sesuai halaman yang ditampilkan-->
                        <a class="nav-link active" aria-current="page" href="daftarRute.php">Daftar Rute</a>
                    </li>
                    <li class="nav-item">
                        <!-- Elemen <a> dengan kelas "nav-link" adalah tautan navigasi yang mengarah ke halaman yang sesuai setiap string yang ada dalam href="" -->
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <!-- Elemen <main> digunakan untuk mengelompokkan konten utama atau inti dari halaman web -->
    <main>
        <div class="text-center">
            <!-- Menambahkan kelas "text-center" untuk mengatur teks berada di tengah horizontal -->
            <h2>Daftar Rute Penerbangan</h2>
        </div>
        <!-- Memulai elemen tabel dengan kelas "table" untuk mengaplikasikan gaya tampilan tabel. -->
        <table class="table">
            <!-- Di sini, kita menggunakan kelas "table" untuk memanfaatkan gaya tampilan bawaan dari kerangka kerja CSS, misalnya Bootstrap. -->
            <!-- class ini membantu mengatur tampilan tabel agar lebih responsif dan mudah diatur. -->
            <thead class="thead-light">
                <!-- Di bagian kepala tabel, biasanya terdapat baris-baris yang menyajikan informasi tentang kolom-kolom di bawahnya. -->
                <!-- Menggunakan kelas "thead-light" untuk mengatur latar belakang yang lebih terang pada bagian kepala tabel. -->
                <!-- Baris tabel yang berisi judul-judul kolom (header) untuk data penerbangan. -->
                <tr>
                    <!-- Kolom pertama dengan judul "maskapai" -->
                    <th scope="col">maskapai</th>

                    <!-- Kolom kedua dengan judul "Asal Penerbangan" -->
                    <th scope="col">Asal Penerbangan</th>

                    <!-- Kolom ketiga dengan judul "Tujuan Penerbangan" -->
                    <th scope="col">Tujuan Penerbangan</th>

                    <!-- Kolom keempat dengan judul "Harga Tiket" -->
                    <th scope="col">Harga Tiket</th>

                    <!-- Kolom kelima dengan judul "Pajak" -->
                    <th scope="col">Pajak</th>

                    <!-- Kolom keenam dengan judul "Total Harga" -->
                    <th scope="col">Total Harga</th>
                </tr>
                <!-- Akhir dari baris tabel judul kolom. -->
            </thead>
            <!-- Memulai bagian tubuh (body) dari tabel untuk menampilkan data penerbangan. -->
            <tbody>
                <?php
                // Panggil function untuk menampilkan data yang sudah diurutkan
                displaySortedFlightData();
                ?>
            </tbody>
        </table>
    </main>
    <!-- tag footer digunakan untuk menampilkan bagian bawah website class bg-dark dan mt-5 digunakan untuk membuat warna hitam dengan
    margin atas (margin top) sebanyak 5 unit
    pada div class bermaksud membuat text rata tengah dengan warna text ffffff-->
    <footer class="bg-dark mt-5">
        <div class="text-center p-3" style="color: #ffffff;">
            Copyright &copy; 2023
        </div>
    </footer>
</body>
<!--ini adalah akhir dari kode html dengan penutup tag html-->

</html>