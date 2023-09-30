<?php
include('../connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tentheloai = $_POST['tentheloai'];
    $id = $_POST['matheloai'];

    $stmt = $conn->prepare("SELECT * FROM theloai WHERE ten_tloai = '$tentheloai' and ma_tloai <> $id");
    $stmt->execute();

    if ($stmt->rowCount() > 0 || $tentheloai === "") {
        header("Location: theloai_edit.php?check_coincide=true&id=$id");
        exit;
    } else {
        $query = "UPDATE theloai 
        SET ten_tloai = '$tentheloai'
        WHERE ma_tloai = $id";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            header("Location: theloai.php?check_edit=true");
            exit;
        } else {
            echo "Lỗi";
        }
    }
}
?>
