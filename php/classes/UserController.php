<?php
session_start();
class UserController{
    public static function login(){
        global $mysqli;
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $resultl = $mysqli->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
        $row = $resultl->fetch_assoc();
        if ($resultl->num_rows){
            $_SESSION['name'] = $row['name'] ;
            $_SESSION['lastname'] = $row['lastname'] ;
            $_SESSION['email'] = $row['email'] ;
            $_SESSION['id'] = $row['id'] ;
            $_SESSION['img'] = $row['img'] ;
            return json_encode(['result'=>'success']);
        }else{
            return json_encode(['result'=>'error']);
        }
    }
    public static function reg(){
        global $mysqli;
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $result=$mysqli->query("SELECT * FROM users WHERE email='$email'");
        if ($result->num_rows){
            return json_encode(['result'=>'error']);
        }else{
            $mysqli->query( "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
            return json_encode(['result'=>'success']);
        }
    }
    public static function getAuthUserData(){
        $userData = [
            "name"=>$_SESSION['name'],
            "lastname"=>$_SESSION['lastname'],
            "email"=>$_SESSION['email'],
            "id"=>$_SESSION['id'],
            "img"=>$_SESSION['img']
        ];
        return json_encode($userData);
    }

    public static function getUserDataById($id){

    }
    public static function avatar(){
        global $mysqli;
        $userId = $_SESSION['id'];
        $userFile = $_FILES['userfile'];
        $arr = explode(".", $userFile['name']);
        $extension = ($arr[count($arr)-1]);
        $goodEX = ["png", "jpg", "jpeg"];
        foreach ($goodEX as $e){
            if($e== $extension);
        }
        $dir = "php/img/user_avatar/".$userFile['name'];
        $resultDir = "php/img/user_avatar/".$userFile['name'];
        move_uploaded_file($userFile['tmp_name'], $dir);
        $mysqli->query("UPDATE `users` SET `img`='$resultDir' WHERE id='$userId'");
        $_SESSION['img'] = $resultDir;
        header("Location: /profile");
        exit();
    }
}