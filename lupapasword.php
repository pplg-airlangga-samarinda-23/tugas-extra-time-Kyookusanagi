<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pw.css">
    <title>Lupa Password</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script>
        function showAlert(event) {
            event.preventDefault();
            alert("Email telah dikirim, Harap periksa email anda!");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Lupa Password</h2>
        <form onsubmit="showAlert(event)">
            <label for="email">Alamat Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Kirim Tautan Reset Password</button>
        </form>
        <p>Sudah memiliki akun? <a href="login.php">Masuk di sini</a></p>
    </div>
</body>
</html>