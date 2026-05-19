<?php
include 'koneksi.php';

$pesan = "";
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['name']);
    $password = $_POST['pass'];

    if (!empty($username) && !empty($password)) {
        // Enkripsi password demi keamanan
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        // Query insert data
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password_hashed', 'user')";
        
        if (mysqli_query($koneksi, $query)) {
            $pesan = "<script>alert('Pendaftaran berhasil! Silahkan login.'); window.location='login.php';</script>";
        } else {
            $pesan = "<p class='text-red-500 font-[fredoka] mb-4'>Username sudah digunakan!</p>";
        }
    } else {
        $pesan = "<p class='text-red-500 font-[fredoka] mb-4'>Semua field wajib diisi!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Register-ResepKita</title>
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('./assets/background2.jpg');">

    <?php echo $pesan; ?>

    <div class="flex items-center justify-center min-h-screen backdrop-blur-sm">
        <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">

            <form action="" method="POST" class="flex flex-col justify-center p-8 md:p-14">
                
                <div class="flex items-center gap-3 mb-3">
                    <img src="./assets/logo.png" alt="Logo" class="w-12 h-12 object-contain" />
                    <span class="text-4xl font-[playfair-display] text-yellow-950 font-bold">Resep Kita</span>
                </div>
                
                <span class="font-light font-[fredoka] text-gray-400 mb-8">
                    Selamat datang di ResepKita, Silahkan Daftar untuk melanjutkan !
                </span>
                
                <div class="py-4">
                    <span class="mb-2 font-[fredoka] text-yellow-950 text-md">Username</span>
                    <input
                        type="text"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                        name="name"
                        id="name" required />
                </div>
                <div class="py-4">
                    <span class="mb-2 font-[fredoka] text-yellow-950 text-md">Password</span>
                    <input
                        type="password"
                        name="pass"
                        id="pass"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                </div>
                
                <button type="submit" name="register"
                    class="w-full bg-yellow-950 font-[fredoka] text-white p-2 rounded-lg mb-6 hover:bg-[#997d60] hover:text-white hover:border hover:border-gray-300 transition-all">
                    Daftar Sekarang !
                </button>
                
                <div class="text-center font-[fredoka] text-gray-400">
                    Sudah punya akun?
                    <a href="login.php" class="font-bold text-yellow-950 hover:text-gray-600 transition-colors">Login disini</a>
                </div>
            </form>

            <div class="relative">
                <img src="./assets/iconlogin.jpg" alt="img" class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover" />
                <div class="absolute hidden bottom-10 right-6 p-6 bg-white bg-opacity-30 backdrop-blur-sm rounded drop-shadow-lg md:block">
                    <span class="text-white font-[fredoka] text-xl">"Temukan berbagai cita rasa kuliner <br/> nusantara dari berbagai tempat di <br/> seluruh Indonesia"</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>