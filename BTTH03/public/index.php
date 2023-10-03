<?php
require_once('../app/config/config.php');
require_once APP_ROOT . '/app/libs/DBConnection.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'song';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$key = isset($_GET['key']) ? $_GET['key'] : 1;
$add = isset($_GET['add']) ? $_GET['add'] : "";
$edit = isset($_GET['edit']) ? $_GET['edit'] : "";

if ($controller == 'home') {
    require_once APP_ROOT . '/app/controllers/HomeController.php';
    $homeController = new HomeController();

    //ClassRoom
    if ($action == "ClassRoom") {
        $homeController->ClassRoom($key);
    } else if ($action == 'add_ClassRoom' && $add == "") {
        $homeController->add_ClassRoom();
    } else if ($action == 'add_ClassRoom' && $add == "true") {
        $tenLop = $_POST['tenlop'];
        $homeController->ClassRoom_add($tenLop);
    } else if ($action == 'edit_ClassRoom' && $edit == "") {
        $homeController->edit_ClassRoom($id);
    } else if ($action == 'edit_ClassRoom' && $edit == "true") {
        $tenLop = $_POST['tenlop'];
        $homeController->ClassRoom_edit($id, $tenLop);
    } else if ($action == 'delete_ClassRoom') {
        $homeController->delete_ClassRoom($id);
    }

    //Student
    else if ($action == "Student") {
        $homeController->Student($key);
    } else if ($action == 'add_Student' && $add == "") {
        $homeController->add_Student();
    } else if ($action == 'add_Student' && $add == "true") {
        $tenSinhVien = $_POST['tenSinhVien'];
        $email = $_POST['email'];
        $ngaySinh = $_POST['ngaySinh'];
        $idLop = $_POST['idLop'];
        $homeController->Student_add($tenSinhVien, $email, $ngaySinh, $idLop);
    } else if ($action == 'edit_Student' && $edit == "") {
        $homeController->edit_Student($id);
    } else if ($action == 'edit_Student' && $edit == "true") {
        $tenSinhVien = $_POST['tenSinhVien'];
        $email = $_POST['email'];
        $ngaySinh = $_POST['ngaySinh'];
        $idLop = $_POST['idLop'];
        $homeController->Student_edit($id, $tenSinhVien, $email, $ngaySinh, $idLop);
    } else if ($action == 'delete_Student') {
        $homeController->delete_Student($id);
    }
} else {
    echo $controller . "__" . $action;
}