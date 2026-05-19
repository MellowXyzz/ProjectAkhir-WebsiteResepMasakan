<?php
include 'auth.php'; // Memastikan user sudah login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index-ResepKita</title>
</head>
<body>
    <h1>berhasil login, Selamat Datang <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php" style="color: red;">Logout</a>
</body>
</html>