<?php
session_start();
$conn = new mysqli("localhost", "root", "", "demo_injection");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn không an toàn, dễ bị SQL Injection (chỉ dùng để học)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username; // Lưu thông tin đăng nhập vào session
        header("Location: index.php"); // Tải lại trang để hiển thị thông điệp chào mừng
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
    <title>Acunetix Demo</title>
    <!-- Link Bootstrap CSS từ CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link jQuery từ CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Link Bootstrap JS từ CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .sidebar {
            padding: 15px;
            border-right: 1px solid #ddd;
        }
        .content {
            padding: 15px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Acuart</a>
        <div>
            <?php if (isset($_SESSION['username'])) { ?>
                <span class="navbar-text">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="btn btn-danger ml-2">Logout</a>
            <?php } else { ?>
                <form method="POST" action="" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="form-group mr-2">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            <?php } ?>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h5>Search Art</h5>
                <form action="search.php" method="GET">
                    <input type="text" name="query" class="form-control mb-2" placeholder="Search">
                    <button type="submit" class="btn btn-primary btn-block">Go</button>
                </form>
                <h6 class="mt-4">Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Security Art</a></li>
                    <li><a href="#">PHP Scanner</a></li>
                    <li><a href="#">PHP Vuln Help</a></li>
                    <li><a href="#">Fractal Explorer</a></li>
                </ul>
            </div>
            <div class="col-md-9 content">
                <h4>Welcome to the Acuart demo page</h4>
                <p>This is a demonstration of a web page with potential SQL injection vulnerabilities.</p>
            </div>
        </div>
    </div>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Acunetix Ltd</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
