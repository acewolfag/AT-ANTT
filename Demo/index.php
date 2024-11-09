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
