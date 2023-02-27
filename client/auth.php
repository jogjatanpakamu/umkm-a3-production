<?php
require_once 'header.php';
require_once 'model/auth.php';


if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $password = $_POST['password'];
    $oke = daftar($nama, $user, $password);
    if ($oke) {
        header('location:index.php');
    }
}
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $oke = auth($user, $password);
    if ($oke) {
        header('location:index.php');
    }
}


if (isset($_GET['log'])) {

    setcookie('log', '');
    header('location:login.php');
}


// var_dump($user);
