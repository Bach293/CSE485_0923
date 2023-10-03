<?php
require_once APP_ROOT . '/app/services/UserService.php';
class LoginController{
    public function login()
    {
        include APP_ROOT . '/app/views/home/login.php';
    }
    public function check_account($user, $pass){
        $userService = new UserService();
        $check_account = $userService->checkAccount($user, $pass);
        if ($check_account == 'true'){
            $link = DOMAIN . 'public/index.php?controller=admin&action=index';
            header("Location: $link");
            exit;
        }else{
            include APP_ROOT . '/app/views/home/login.php';
        }
    }
    public function signup(){
        include APP_ROOT . '/app/views/home/signup.php';
    }
    public function check_signup($username, $password){
        $userService = new UserService();
        $check_signup = $userService->checkSignUp($username, $password);
        if ($check_signup == 'true'){
            $link = DOMAIN . 'public/index.php?controller=login&action=login';
            header("Location: $link");
            exit;
        }else{
            include APP_ROOT . '/app/views/home/signup.php';
        }
    }
}