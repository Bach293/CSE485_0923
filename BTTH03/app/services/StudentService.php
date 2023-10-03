<?php
require_once APP_ROOT.'/app/models/Student.php';
class StudentService{
    public function getByStudentId($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM sinhvien 
            WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $Student = new Student(
                    $result['id'],
                    $result['tenSinhVien'],
                    $result['email'],
                    $result['ngaySinh'],
                    $result['idLop']
                );
                return $Student;
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
            $sql = "SELECT count(id) AS count_theloai
            FROM sinhvien";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $countStudent = $result['count_theloai'];
                return $countStudent;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function getAllStudentService()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM sinhvien";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $Students = [];
            while ($row = $stmt->fetch()) {
                $Student = new Student(
                    $row['id'],
                    $row['tenSinhVien'],
                    $row['email'],
                    $row['ngaySinh'],
                    $row['idLop']
                );
                $Students[] = $Student;
            }
            return $Students;
        } else {
            return $Students = [];
        }
    }
    public function getByStudentCount($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $quantity = 10;
            $offset = ($key - 1) * $quantity;
            $sql = "SELECT * FROM sinhvien ORDER BY id DESC LIMIT $offset, $quantity ";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $Students = [];
            while ($row = $stmt->fetch()) {
                $Student = new Student(
                    $row['id'],
                    $row['tenSinhVien'],
                    $row['email'],
                    $row['ngaySinh'],
                    $row['idLop']
                );
                $Students[] = $Student;
            }
            return $Students;
        } else {
            return $Students = [];
        }
    }
    public function addStudent($tenSinhVien, $email, $ngaySinh, $idLop)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM sinhvien WHERE email = '$email'";
            $stmt = $conn->query($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 || $email === "") {
                return $check = 'false';
            } else {
                $sql = "SELECT MAX(id) AS max_id FROM sinhvien";
                $stmt = $conn->query($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxId = $result['max_id'];
                for ($id = 1; $id <= $maxId + 1; $id++) {
                    $sql = "SELECT COUNT(id) AS count_id FROM lop WHERE id = $id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $count = $result['count_id'];

                    if ($count == 0) {
                        $newId = $id;
                        break;
                    }
                }
                $sql = "INSERT INTO lop (id, tenSinhVien, email, ngaySinh, idLop) VALUES ($newId, '$tenSinhVien', '$email', '$ngaySinh', $idLop);";
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
    public function editStudent($id, $tenSinhVien, $email, $ngaySinh, $idLop)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $stmt = $conn->prepare("SELECT * FROM lop WHERE email = '$email' and id != $id");
            $stmt->execute();

            if ($stmt->rowCount() > 0 || $email === "") {
                return $check='false';
            } else {
                $query = "UPDATE sinhvien 
                SET email = '$email', tenSinhVien = '$tenSinhVien', ngaySinh = '$ngaySinh', idLop = $idLop
                WHERE id = $id";
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
    public function deleteStudent($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null){
            $stmt = $conn->prepare("DELETE FROM sinhvien WHERE id = $id");
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