<?php
require_once APP_ROOT . '/app/models/Author.php';
class AuthorService
{
    public function getByAuthorId($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM tacgia 
            WHERE ma_tgia = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $author = new Author(
                    $result['ma_tgia'],
                    $result['ten_tgia'],
                    $result['hinh_tgia']
                );
                return $author;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function getCount(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if ($conn != null){
            $sql = "SELECT count(ma_tgia) AS count_tacgia
            FROM tacgia";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0){
                $result = $stmt->fetch();
                $countAuthor = $result['count_tacgia'];
                return $countAuthor;
            }else {
                return null;
            }
        }else{
            return null;
        }
    }
    public function getAllAuthorService()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM tacgia";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $authors = [];
            while ($row = $stmt->fetch()) {
                $author = new Author(
                    $row['ma_tgia'],
                    $row['ten_tgia'],
                    $row['hinh_tgia']
                );
                $authors[] = $author;
            }
            return $authors;
        } else {
            return $authors = [];
        }
    }
    public function getByAuthorCount($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $quantity = 10;
            $offset = ($key - 1) * $quantity;
            $sql = "SELECT * FROM tacgia ORDER BY ma_tgia DESC LIMIT $offset, $quantity ";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $authors = [];
            while ($row = $stmt->fetch()) {
                $author = new Author(
                    $row['ma_tgia'],
                    $row['ten_tgia'],
                    $row['hinh_tgia']
                );
                $authors[] = $author;
            }
            return $authors;
        } else {
            return $authors = [];
        }
    }
    public function addAuthor($ten_tgia)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM tacgia WHERE ten_tgia = '$ten_tgia'";
            $stmt = $conn->query($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 || $ten_tgia === "") {
                return $check = 'false';
            } else {
                $sql = "SELECT MAX(ma_tgia) AS max_id FROM tacgia";
                $stmt = $conn->query($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxId = $result['max_id'];
                for ($id = 1; $id <= $maxId + 1; $id++) {
                    $sql = "SELECT COUNT(ma_tgia) AS count_id FROM tacgia WHERE ma_tgia = $id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $count = $result['count_id'];

                    if ($count == 0) {
                        $newId = $id;
                        break;
                    }
                }
                $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES ($newId, '$ten_tgia');";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                if ($result) {
                    return $check = 'true';
                } else {
                    return $check = 'false';
                }
            }
        } else {
            return null;
        }
    }
    public function editCategory($id, $ten_tgia)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $stmt = $conn->prepare("SELECT * FROM tacgia WHERE ten_tgia = '$ten_tgia' and ma_tgia != $id");
            $stmt->execute();

            if ($stmt->rowCount() > 0 || $ten_tgia === "") {
                return $check='false';
            } else {
                $query = "UPDATE tacgia 
                SET ten_tgia = '$ten_tgia'
                WHERE ma_tgia = $id";
                $stmt = $conn->prepare($query);
                if ($stmt->execute()) {
                    return $check='true';
                } else {
                    return $check='false';
                }
            }
        } else {
            return null;
        }
    }
    public function deleteCategory($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null){
            $stmt = $conn->prepare("DELETE FROM tacgia WHERE ma_tgia = $id");
            if($stmt->execute()){
                return $check='true';
            }
            else{
                return $check='false';
            }
        }
        else{
            return null;
        }
    }
}