<?php
$conn = new mysqli("localhost", "root", "", "demo_injection");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h4>Searched for:</h4>
        <?php
        if (isset($_GET['query'])) {
            $query = $_GET['query'];

            // Truy vấn không an toàn, dễ bị SQL Injection (chỉ dùng để học)
            $sql = "SELECT * FROM products WHERE name LIKE '%$query%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul class='list-unstyled'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='media mb-4'>";
                    echo "<img src='path/to/image/" . htmlspecialchars($row['image']) . "' class='mr-3' alt='" . htmlspecialchars($row['name']) . "' style='width: 150px; height: 150px;'>";
                    echo "<div class='media-body'>";
                    echo "<h5 class='mt-0 mb-1'><a href='product.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</a></h5>";
                    echo "<p>by: " . htmlspecialchars($row['author']) . "; from category " . htmlspecialchars($row['category']) . "</p>";
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Không tìm thấy kết quả.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
