<?php
/*    session_start();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $mysqli = new mysqli("localhost", "root",  "","php1901");
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'");
    $row = $result->fetch_assoc();
    if ($result->num_rows){
        $_SESSION['name'] = $row['name'] ;
        $_SESSION['lastname'] = $row['lastname'] ;
        $_SESSION['email'] = $row['email'] ;
        $_SESSION['id'] = $row['id'] ;
        $_SESSION['img'] = $row['img'] ;

        header("Location: /view/profile.html");
    }else{
        echo "Неправильный логин или пароль";
    }*/
