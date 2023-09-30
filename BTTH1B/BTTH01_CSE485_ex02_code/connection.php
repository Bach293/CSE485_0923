<?php
$servername = "localhost";
$username = "root";
$password = "29032003";

try {
    $conn = new PDO("mysql:host=$servername;dbname=btth01_cse485", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
