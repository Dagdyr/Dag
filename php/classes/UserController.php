<?php
session_start();
class UserController{
    public static function login(){
        global $mysqli;
        global $content;
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
            header("Location: /profile");
        }else{
            $content="Неверный логин или пароль";
        }
    }
    public static function reg(){
        global $mysqli;
        global $content;
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $result=$mysqli->query("SELECT * FROM users WHERE email='$email'");
        if ($result->num_rows){
            $content = "Такой пользователь уже существует <a href='/reg'> зарегистрировать другого</a>";
        }else{
            $mysqli->query( "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
            header("Location: /login");
        }
    }
    public static function Profile(){
        $img=$_SESSION['img'];
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
        $result=[$img,$name,$email,$id];
        return json_encode($result);
    }
    public static function Avatar(){
        global $mysqli;
        $userId = $_SESSION['id'];
        $userFile = $_FILES['userfile'];
        $arr = explode(".", $userFile['name']);
        $extension = ($arr[count($arr)-1]);
        $goodEX = ["png", "jpg", "jpeg"];
        foreach ($goodEX as $e){
            if($e== $extension);
        }
        $dir = "/php/img/user_avatar/".$userFile['name'];
        $resultDir = "/php/img/user_avatar/".$userFile['name'];
        move_uploaded_file($userFile['tmp_name'], $dir);
        $mysqli = new mysqli("localhost", "root", "", "php1901");
        $mysqli->query("UPDATE `users` SET `img`='$resultDir' WHERE id='$userId'");
        $_SESSION['img'] = $resultDir;
        header("Location: /profile");
    }
}