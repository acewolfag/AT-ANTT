<?php
session_start();
session_destroy(); // Hủy bỏ tất cả các session
header("Location: index.php"); // Chuyển hướng về trang index
exit();
?>