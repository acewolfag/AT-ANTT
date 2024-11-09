<?php
$conn = new mysqli("localhost", "root", "", "demo_injection");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn không an toàn, dễ bị SQL Injection (chỉ dùng để học)
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    echo "<div class='container mt-5'>";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2 class='mb-3'>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<img src='path/to/image/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='img-fluid mb-3'>";
        echo "<p><strong>Giá:</strong> $" . $row['price'] . "</p>";
        echo "<p><strong>Tác giả:</strong> " . htmlspecialchars($row['author']) . "</p>";
        echo "<p><strong>Thể loại:</strong> " . htmlspecialchars($row['category']) . "</p>";
        echo "<p><strong>Mô tả:</strong> " . htmlspecialchars($row['description']) . "</p>";
    } else {
        echo "<p>Sản phẩm không tồn tại.</p>";
    }
    echo "</div>";
}

$conn->close();
?>
