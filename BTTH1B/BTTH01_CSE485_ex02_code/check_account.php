<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = '$username' AND user_pass = '$password'");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: login.php?check_account=true");
        exit;
    } else {
        header("Location: login.php?check_account=false");
        exit;
    }
}
?>
