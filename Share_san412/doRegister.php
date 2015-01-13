<?php
require_once 'include.php';
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
if ($verify == $verify1) {
    $sql = "select * from san412_user where username='{$username}'";
    if ($password == $password1) {
        if (checkUser($sql)) {
            echo "<script>alert('user name have already exist');</script>";
            echo "<script>window.location='register.php';</script>";
        } else {
            $array = array(
                "username" => $username,
                "password" => $password
            );
            registerUser($array);
            echo "<script>alert('success');</script>";
        }
    } else {
        echo "<script>alert('password is different');</script>";
        echo "<script>window.location='register.php';</script>";
    }
} else {
    echo "<script>alert('verify number is wrong');</script>";
    echo "<script>window.location='register.php';</script>";
}