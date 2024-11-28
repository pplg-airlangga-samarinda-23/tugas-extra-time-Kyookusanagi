<?php
session_start();
include 'db_connect.php'; 
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); 
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="left"></div>
        <div class="right">
            <div class="login-form">
                <img alt="Profile Image" height="100" src="logo.png" width="200"/>
                <form method="POST" action="">
                    <input placeholder="Username..." type="text" name="username" required>
                    <input placeholder="Password..." type="password" name="password" required>
                    <button type="submit">Login</button>
                    <a href="lupapasword.php">Forgot Password</a>
                    <?php if (!empty($error_message)): ?>
                        <script>
                            showAlert("<?php echo $error_message; ?>");
                        </script>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>