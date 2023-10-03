<?php
require_once APP_ROOT.'/app/models/ClassRoom.php';

class ClassRoomService{
    public function getByClassRoomId($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT *
            FROM theloai 
            WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $ClassRoom = new ClassRoom(
                    $result['id'],
                    $result['tenLop']
                );
                return $ClassRoom;
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
            FROM lop";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $countClassRoom = $result['count_theloai'];
                return $countClassRoom;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function getAllClassRoomService()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM lop";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $ClassRooms = [];
            while ($row = $stmt->fetch()) {
                $ClassRoom = new ClassRoom(
                    $row['id'],
                    $row['tenLop'],
                );
                $ClassRooms[] = $ClassRoom;
            }
            return $ClassRooms;
        } else {
            return $ClassRooms = [];
        }
    }
    public function getByClassRoomCount($key)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $quantity = 10;
            $offset = ($key - 1) * $quantity;
            $sql = "SELECT * FROM lop ORDER BY id DESC LIMIT $offset, $quantity ";
            $stmt = $conn->query($sql);
            $stmt->execute();

            $ClassRooms = [];
            while ($row = $stmt->fetch()) {
                $ClassRoom = new ClassRoom(
                    $row['id'],
                    $row['tenLop'],
                );
                $ClassRooms[] = $ClassRoom;
            }
            return $ClassRooms;
        } else {
            return $ClassRooms = [];
        }
    }
    public function addClassRoom($tenLop)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM lop WHERE tenLop = '$tenLop'";
            $stmt = $conn->query($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 || $tenLop === "") {
                return $check = 'false';
            } else {
                $sql = "SELECT MAX(id) AS max_id FROM lop";
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
                $sql = "INSERT INTO lop (id, tenLop) VALUES ($newId, '$tenLop');";
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
    public function editClassRoom($id, $tenLop)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $stmt = $conn->prepare("SELECT * FROM lop WHERE tenLop = '$tenLop' and id != $id");
            $stmt->execute();

            if ($stmt->rowCount() > 0 || $tenLop === "") {
                return $check='false';
            } else {
                $query = "UPDATE lop 
                SET tenLop = '$tenLop'
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
    public function deleteClassRoom($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null){
            $stmt = $conn->prepare("DELETE FROM lop WHERE id = $id");
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