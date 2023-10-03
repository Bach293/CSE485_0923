<?php
require_once APP_ROOT . '/app/models/Article.php';
class ArticleService
{
    public function getAllArticleService()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM baiviet";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $articles = [];
            while ($row = $stmt->fetch()) {
                $article = new Article(
                    $row['ma_bviet'],
                    $row['tieude'],
                    $row['ten_bhat'],
                    $row['ma_tloai'],
                    $row['tomtat'],
                    $row['noidung'],
                    $row['ma_tgia'],
                    $row['ngayviet'],
                    $row['hinhanh']
                );
                $articles[] = $article;
            }
            return $articles;
        } else {
            return $articles = [];
        }
    }
    public function getByArticleId($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM baiviet 
            WHERE ma_bviet = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $article = new Article(
                    $result['ma_bviet'],
                    $result['tieude'],
                    $result['ten_bhat'],
                    $result['ma_tloai'],
                    $result['tomtat'],
                    $result['noidung'],
                    $result['ma_tgia'],
                    $result['ngayviet'],
                    $result['hinhanh']
                );
                return $article;
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
            $sql = "SELECT count(ma_bviet) AS count_baiviet
            FROM baiviet";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0){
                $result = $stmt->fetch();
                $countArticle = $result['count_baiviet'];
                return $countArticle;
            }else {
                return null;
            }
        }else{
            return null;
        }
    }
    public function getByCategoryCount($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $quantity = 10;
            $offset = ($key - 1) * $quantity;
            $sql = "SELECT * FROM baiviet ORDER BY ma_bviet DESC LIMIT $offset, $quantity ";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $categorys = [];
            while ($row = $stmt->fetch()) {
                $category = new Category(
                    $row['ma_bviet'],
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
            $sql = "SELECT * FROM baiviet WHERE ten_tloai = '$ten_tloai'";
            $stmt = $conn->query($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 || $ten_tloai === "") {
                return $check = 'false';
            } else {
                $sql = "SELECT MAX(ma_bviet) AS max_id FROM baiviet";
                $stmt = $conn->query($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxId = $result['max_id'];
                for ($id = 1; $id <= $maxId + 1; $id++) {
                    $sql = "SELECT COUNT(ma_bviet) AS count_id FROM baiviet WHERE ma_bviet = $id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $count = $result['count_id'];

                    if ($count == 0) {
                        $newId = $id;
                        break;
                    }
                }
                $sql = "INSERT INTO baiviet (ma_bviet, ten_tloai) VALUES ($newId, '$ten_tloai');";
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
            $stmt = $conn->prepare("SELECT * FROM baiviet WHERE ten_tloai = '$ten_tloai' and ma_bviet != $id");
            $stmt->execute();

            if ($stmt->rowCount() > 0 || $ten_tloai === "") {
                return $check='false';
            } else {
                $query = "UPDATE baiviet 
                SET ten_tloai = '$ten_tloai'
                WHERE ma_bviet = $id";
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
            $stmt = $conn->prepare("DELETE FROM baiviet WHERE ma_bviet = $id");
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