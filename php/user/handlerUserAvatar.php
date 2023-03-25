<?php
session_start();
/*$userId = $_SESSION['id'];
$userFile = $_FILES['userfile'];
$arr = explode(".", $userFile['name']);
$extension = ($arr[count($arr)-1]);
$goodEX = ["png", "jpg", "jpeg"];
    foreach ($goodEX as $e){
        if($e== $extension);
    }
$dir = "/img/user_avatar/".$userFile['name'];
$resultDir = "/img/user_avatar/".$userFile['name'];
move_uploaded_file($userFile['tmp_name'], $dir);
$mysqli = new mysqli("localhost", "root", "", "php1901");
$mysqli->query("UPDATE `users` SET `img`='$resultDir' WHERE id='$userId'");
$_SESSION['img'] = $resultDir;
header("Location: /profile.php");*/