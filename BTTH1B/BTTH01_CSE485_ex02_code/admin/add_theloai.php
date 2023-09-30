<?php
include('../connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tentheloai = $_POST['tentheloai'];

    $stmt = $conn->prepare("SELECT * FROM theloai WHERE ten_tloai = '$tentheloai'");
    $stmt->execute();

    if ($stmt->rowCount() > 0 || $tentheloai === "") {
        header("Location: theloai_add.php?check_coincide=true");
        exit;
    } else {
        $query = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxId = $result['max_id'];
        for ($id = 1; $id <= $maxId + 1; $id++) {
            $query = "SELECT COUNT(ma_tloai) AS count_id FROM theloai WHERE ma_tloai = $id";
            $stmt = $conn->prepare($query);
            echo $query;
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count_id'];

            if ($count == 0) {
                $newId = $id;
                break;
            }
        }

        $query = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES ($newId, '$tentheloai');";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute();
        if ($result) {
            header("Location: theloai.php?check_add=true");
            exit;
        } else {
            header("Location: theloai_add.php?check_coincide=true");
            exit;
        }
    }
}
?>
