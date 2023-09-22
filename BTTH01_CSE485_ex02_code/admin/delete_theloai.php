<?php
if (isset($_GET['id'])) {
    include('../connection.php');
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM theloai WHERE ma_tloai = $id");
    if($stmt->execute()){
        header("Location: theloai.php?check_delete=true");
        exit;
    }
    else{
        header("Location: theloai.php?check_delete=false");
        exit;
    }
}
?>
