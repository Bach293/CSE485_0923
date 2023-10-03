<?php
require_once APP_ROOT . '/app/models/User.php';
class UserService
{
    public function getCount()
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if ($conn != null) {
            $sql = "SELECT count(user_id) AS count_user
            FROM users";
            $stmt = $conn->query($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch();
                $countUser = $result['count_user'];
                return $countUser;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function checkAccount($user, $pass)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if ($conn != null) {
            if ($user !== "" && $pass !== "") {
                $stmt = $conn->prepare("SELECT user_pass FROM users where user_name = '$user'");
                $stmt->execute();
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashedPassword = $results['user_pass'];
                if (password_verify($pass, $hashedPassword)) {
                    session_start();
                    $_SESSION['isLoggedIn'] = true;
                    return $check = 'true';
                } else {
                    return $check = 'false';
                }
            } else {
                return $check = 'false';
            }
        } else {
            return $check = 'false';
        }
    }
    public function checkSignUp($username, $password)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if ($conn != null) {
            $newPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = '$username'");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $query = "SELECT MAX(user_id) AS max_id FROM users";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $maxId = $result['max_id'];
                for ($id = 1; $id <= $maxId + 1; $id++) {
                    $query = "SELECT COUNT(user_id) AS count_id FROM users WHERE user_id = $id";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $count = $result['count_id'];

                    if ($count == 0) {
                        $newId = $id;
                        break;
                    }
                }

                $query = "INSERT INTO users VALUES ($newId, '$username', '$newPassword');";
                $stmt = $conn->prepare($query);
                $result = $stmt->execute();
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}