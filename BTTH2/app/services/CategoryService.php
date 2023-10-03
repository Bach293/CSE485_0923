<?php
require_once APP_ROOT . '/app/models/Category.php';
class CategoryService
{
    public function getByCategoryId($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM theloai 
            WHERE ma_tloai = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $category = new Category(
                    $result['ma_tloai'],
                    $result['ten_tloai']
                );
                return $category;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function getCount()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if ($conn != null) {
            $sql = "SELECT count(ma_tloai) AS count_theloai
            FROM theloai";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $countCategory = $result['count_theloai'];
                return $countCategory;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function getAllCategoryService()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM tacgia";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $categorys = [];
            while ($row = $stmt->fetch()) {
                $category = new Category(
                    $row['ma_tloai'],
                    $row['ten_tloai'],
                );
                $categorys[] = $category;
            }
            return $categorys;
        } else {
            return $categorys = [];
        }
    }
    public function getByCategoryCount($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $quantity = 10;
            $offset = ($key - 1) * $quantity;
            $sql = "SELECT * FROM theloai ORDER BY ma_tloai DESC LIMIT $offset, $quantity ";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $categorys = [];
            while ($row = $stmt->fetch()) {
                $category = new Category(
                    $row['ma_tloai'],
                    $row['ten_tloai'],
                );
                $categorys[] = $category;
            }
            return $categorys;
        } else {
            return $categorys = [];
        }
    }
    public function addCategory($ten_tloai)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM theloai WHERE ten_tloai = '$ten_tloai'";
            $stmt = $conn->query($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 || $ten_tloai === "") {
                return $check = 'false';
            } else {
                $sql = "SELECT MAX(ma_tloai) AS max_id FROM theloai";
                $stmt = $conn->query($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxId = $result['max_id'];
                for ($id = 1; $id <= $maxId + 1; $id++) {
                    $sql = "SELECT COUNT(ma_tloai) AS count_id FROM theloai WHERE ma_tloai = $id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $count = $result['count_id'];

                    if ($count == 0) {
                        $newId = $id;
                        break;
                    }
                }
                $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES ($newId, '$ten_tloai');";
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
    public function editCategory($id, $ten_tloai)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $stmt = $conn->prepare("SELECT * FROM theloai WHERE ten_tloai = '$ten_tloai' and ma_tloai != $id");
            $stmt->execute();

            if ($stmt->rowCount() > 0 || $ten_tloai === "") {
                return $check='false';
            } else {
                $query = "UPDATE theloai 
                SET ten_tloai = '$ten_tloai'
                WHERE ma_tloai = $id";
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
            $stmt = $conn->prepare("DELETE FROM theloai WHERE ma_tloai = $id");
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