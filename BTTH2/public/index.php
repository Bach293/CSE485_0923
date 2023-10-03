<?php
require_once('../app/config/config.php');
require_once APP_ROOT . '/app/libs/DBConnection.php';




$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if($controller=='home' || $controller=='login'){
    session_start(); // Bắt đầu session

    // Hủy bỏ tất cả các biến session
    $_SESSION = array();
    
    // Hủy bỏ session
    session_destroy();
}else{
    session_start();

    if(!isset($_SESSION['isLoggedIn'])){
        header("location: ?controller=login&action=login");
        exit();
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : "";
$key = isset($_GET['key']) ? $_GET['key'] : 1;
$add = isset($_GET['add']) ? $_GET['add'] : "";
$edit = isset($_GET['edit']) ? $_GET['edit'] : "";
if ($controller == 'home') {
    require_once APP_ROOT . '/app/controllers/HomeController.php';

    $homeController = new HomeController();
    if ($action == "index") {
        $homeController->index();
    } else if ($action == "detail" && $id != "") {
        $homeController->detail($id);
    }
} else if ($controller == 'login') {
    require_once APP_ROOT . '/app/controllers/LoginController.php';
    $loginController = new LoginController();
    if ($action == 'login'){
        $loginController->login();
    }else if ($action == 'check_account'){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $loginController->check_account($user, $pass);
    }else if ($action=='signup'){
        $loginController->signup();
    }else if ($action=='check_signup'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginController->check_signup($username, $password);
    }
    
} else if ($controller == "admin") {
    require_once APP_ROOT . '/app/controllers/AdminController.php';
    $adminController = new AdminController();

    if ($action == "index") {
        $adminController->index();
    } else if ($action == "category") {
        $adminController->category($key);
    } else if ($action == 'add_category' && $add =="") {
        $adminController->add_category();
    }else if ($action == 'add_category' && $add =="true"){
        $ten_tloai = $_POST['tentheloai'];
        $adminController->category_add($ten_tloai);
    }else if ($action == 'edit_category' && $edit ==""){
        $adminController->edit_category($id);
    }else if ($action == 'edit_category' && $edit =="true"){
        $ten_tloai = $_POST['tentheloai'];
        $adminController->category_edit($id,$ten_tloai);
    }else if ($action == 'delete_category'){
        $adminController->delete_category($id);
    }else if ($action == "author"){
        $adminController->author($key);
    }else if ($action == 'add_author' && $add =="") {
        $adminController->add_author();
    }else if ($action == 'add_author' && $add =="true"){
        $ten_tgia = $_POST['tentacgia'];
        $adminController->author_add($ten_tgia);
    }
} else {
    echo "Không tìm thấy" . $controller . "__" . $action;
}