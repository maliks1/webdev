<!DOCTYPE html> <!-- Deklarasi tipe dokumen HTML yang digunakan, dalam hal ini adalah HTML5 -->
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

//mendeklarasikan array bandaraData dan data pajak bandara asal dan tujuan
$bandaraData = array(
    'Soekarno-Hatta (CGK)' => 50000,
    'Husein Sastranegara (BDO)' => 30000,
    'Abdul Rachman Saleh (MLG)' => 40000,
    'Juanda (SUB)' => 40000,
    'Ngurah Rai (DPS)' => 80000,
    'Hasanuddin (UPG)' => 70000,
    'Inanwatan (INX)' => 90000,
    'Sultan Iskandarmuda (BTJ)' => 70000
);
// Inisialisasi variabel error dan sukses
$error = "";
$sukses = "";

//Fungsi ini digunakan untuk menyimpan data tiket penerbangan ke dalam file json
function simpanDataTiket($maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $pajakTiket)
{
    // Baca data JSON dari file (jika sudah ada)
    $jsonData = file_get_contents('data/data.json');
    $data = json_decode($jsonData, true);

    // Tambahkan data baru ke dalam array
    $data[] = array(
        'maskapai' => $maskapai,
        'bandaraAsal' => $bandaraAsal,
        'bandaraTujuan' => $bandaraTujuan,
        'hargaTiket' => $hargaTiket,
        'pajakTiket' => $pajakTiket,
        'totalHargaTiket' => $hargaTiket + $pajakTiket
    );

    // Simpan array data ke dalam file JSON
    file_put_contents('data/data.json', json_encode($data));
}

// Fungsi untuk menghitung pajak tiket
function hitungPajakTiket($asal, $tujuan)
{
    global $bandaraData; //memanggil variable global bandaraData
    return $bandaraData[$asal] + $bandaraData[$tujuan]; //mengembalikan nilai setelah menambahkan kedua variable
}

function prosesForm()
{
    //deklarasi variable error dan sukses
    $error = "";
    $sukses = "";

    // Cek apakah sudah menekan tombol simpan
    if (isset($_POST['simpan'])) {
        // Mengambil data yang sudah diinput menggunakan $_POST kedalam variabel baru
        $maskapai = $_POST['maskapai'];
        $bandaraAsal = $_POST['bandaraAsal'];
        $bandaraTujuan = $_POST['bandaraTujuan'];
        $hargaTiket = $_POST['hargaTiket'];

        // Mengecek data yang dimasukkan
        if ($maskapai == '' or $hargaTiket == '') {
            $error = "Silahkan masukkan data yang belum diisi";
        }

        if (!$error) {
            // Panggil function untuk menghitung pajak tiket
            $pajakTiket = hitungPajakTiket($bandaraAsal, $bandaraTujuan);

            // Panggil function untuk menyimpan data tiket
            simpanDataTiket($maskapai, $bandaraAsal, $bandaraTujuan, $hargaTiket, $pajakTiket);
            $sukses = "Sukses memasukkan data";
        }
    }
    // Menampilkan pesan error jika ada
    if ($error) {
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    }

    // Menampilkan pesan sukses jika ada
    if ($sukses) {
        echo '<div class="alert alert-primary" role="alert">' . $sukses . '</div>';
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
    <title>Add Rute</title>
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
                            
                            <!-- class nav-link active digunakan untuk memberikan highlight warna putih sesuai halaman yang ditampilkan-->
                            <a class="nav-link active" href="addRute.php">Add Rute</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftarRute.php">Daftar Rute</a>
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
            <h2>Penambahan Rute Penerbangan</h2>
        </div>
        <!-- Isi dari elemen <main> biasanya berisi konten utama halaman seperti artikel, informasi, atau tampilan utama -->
        <!-- Elemen <form> digunakan untuk membuat formulir interaktif yang mengirim data ke server dengan metode POST -->
        <div class="text-center">
            <form action="" method="post">
                <!-- Isi formulir, seperti input, label, dan tombol, akan ditempatkan di dalam elemen <form> ini -->
                <!-- Elemen <br> digunakan untuk membuat jeda baris (line break) dalam konten HTML -->
                <br />
                <!-- Elemen <div> dengan kelas "mb-2 row" digunakan untuk membuat wadah dengan margin bottom (mb) 2 unit dalam tampilan tata letak berbasis grid (row) -->
                <div class="mb-2 row">
                    <!-- Isi dari elemen <div> ini akan mengisi baris dalam sistem grid dengan margin bawah 2 unit -->
                    <!-- Elemen <label> dengan atribut "for" yang sesuai dengan "maskapai" dan kelas "col-sm-2 col-form-label" digunakan untuk membuat label terkait dengan elemen input dalam bentuk kolom dalam tampilan form -->
                    <label for="maskapai" class="col-sm-2 col-form-label">Maskapai</label>
                    <!-- Elemen <div> dengan kelas "col-sm-5" digunakan untuk membuat wadah dengan lebar kolom 5 unit dalam tampilan berbasis grid (kolom tampilan menengah) -->
                    <div class="col-sm-5">
                        <!-- Isi dari elemen <div> ini akan mengisi kolom dalam sistem grid dengan lebar 5 unit pada tampilan menengah -->
                        <!-- Elemen <input> dengan tipe "text", kelas "form-control", id "maskapai", dan nama "maskapai" digunakan untuk membuat field input teks dalam formulir -->
                        <input type="text" class="form-control" id="maskapai" name="maskapai">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="asal" class="col-sm-2 col-form-label">Bandara Asal</label>
                    <div class="col-sm-5">
                        <!-- Elemen <select> dengan kelas "form-select", atribut aria-label, dan nama "bandaraAsal" digunakan untuk membuat dropdown list dalam formulir -->
                        <select class="form-select" aria-label="Default select example" name="bandaraAsal">
                            <!-- Setiap elemen <option> dalam <select> mewakili pilihan yang dapat dipilih oleh pengguna -->
                            <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                            <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                            <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                            <option value="Juanda (SUB)">Juanda (SUB)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="tujuan" class="col-sm-2 col-form-label">Bandara Tujuan</label>
                    <div class="col-sm-5">
                        <select class="form-select" aria-label="Default select example" name="bandaraTujuan">
                            <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                            <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                            <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                            <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2 row">
                    <label for="isi" class="col-sm-2 col-form-label">Harga Tiket</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="hargaTiket" value="<?php echo $judul ?>"
                            name="hargaTiket">
                    </div>
                </div>
                <div class="mb-3 row">
                    <!-- Elemen <div> dengan kelas "col-sm-5 d-flex align-items-center justify-content-center" digunakan untuk membuat wadah kolom dengan lebar 5 unit pada tampilan menengah,
                serta mengaktifkan tampilan fleksibel, mengatur item secara vertikal dan horizontal tengah -->
                    <div class="col-sm-5 d-flex align-items-center justify-content-center">
                        <!-- Isi dari elemen <div> ini akan berada di tengah vertikal dan horizontal tampilan wadah kolom -->
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
        <?php
        //memanggil fungsi prosesForm
        prosesForm();
        ?>
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