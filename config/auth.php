<?php
session_start();
function is_admin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function is_user() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user';
}

function require_admin() {
    if (!is_admin()) {
        header("Location: ../public/login.php");
        exit;
    }
}

function require_user() {
    if (!is_user()) {
        header("Location: ../public/login.php");
        exit;
    }
}

function require_login(){
    if(is_admin()){
        header("Location: ../admin");
    }
    if(is_user()){
        header("Location: ../user");
    }
}

?>