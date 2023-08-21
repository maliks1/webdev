<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: addRute.php"); // Jika sudah masuk, arahkan ke halaman beranda
    exit();
}
$error_message = "";

// ... kode tampilan halaman login ...
?>

<head>
    <!--digunakan untuk menentukan jenis encoding karakter yang digunakan dalam halaman web.
    Encoding karakter mengacu pada cara karakter-karakter teks diwakili dalam komputer, yang sangat penting untuk memastikan bahwa karakter-karakter yang berbeda (seperti huruf, angka, tanda baca, dan simbol lainnya) ditampilkan dengan benar oleh browser.-->
    <meta charset="UTF-8">
    <!-- adalah elemen dalam tag <head> dalam dokumen HTML yang digunakan untuk mengontrol tampilan dan skala responsif dari halaman web pada berbagai perangkat, terutama perangkat mobile.
    Ini sangat penting untuk memastikan bahwa halaman web Anda tampil dengan baik dan sesuai pada layar yang berbeda, mulai dari layar komputer hingga layar ponsel pintar.-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tag <title> digunakan untuk menentukan judul atau nama dari halaman web yang sedang ditampilkan -->
    <title>Login</title>
    <!-- Menghubungkan dengan stylesheet Bootstrap untuk tampilan yang responsif -->
    <link rel="stylesheet" href="library/css/bootstrap.min.css">
    <link rel="stylesheet" href="library/css/style.css">
    <!-- Menghubungkan dengan script Bootstrap untuk fitur-fitur interaktif -->
    <script src="library/js/bootstrap.min.js"></script>
</head>

<body class="bodys">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Memeriksa kredensial dan validasi login
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Memvalidasi username dan password
        if ($username === 'user' && $password === '123') {
            $_SESSION['username'] = $username; // Mengatur sesi jika login berhasil
            header("Location: login.php");//ini adalah sebuah perintah dalam PHP yang digunakan untuk mengalihkan (redirect) pengguna ke halaman tersebut yaitu login.php
            exit();
        } else {
            // Pesan error jika login gagal
            $error_message = "Username atau password salah";
        }
    }
    ?>

    <!-- ... kode tampilan form login ...-->
    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <input type="text" name="username" class="login-input" placeholder="Username" required><br>
            <input type="password" name="password" class="login-input" placeholder="Password" required><br>
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
        </form>
    </div>
    <!-- ... kode tampilan error input akun ...-->
    <div class="error-message" style="margin-top: 5px;">
        <?php echo $error_message; ?>
    </div>

</body>

</html>