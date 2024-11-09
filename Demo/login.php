<?php
session_start();
$conn = new mysqli("localhost", "root", "", "demo_injection");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn không an toàn, dễ bị SQL Injection (chỉ dùng để học)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username; // Lưu thông tin đăng nhập vào session
        header("Location: index.php"); // Chuyển hướng tới trang chính sau khi đăng nhập
        exit();
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login Page</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <?php if (isset($error_message)) { ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>
                <p class="mt-3">You can also <a href="signup.php">signup here</a>.</p>
                <p class="text-muted">Signup disabled. Please use the username <strong>test</strong> and the password <strong>test</strong>.</p>
            </div>
        </div>
    </div>
</body>
</html>
