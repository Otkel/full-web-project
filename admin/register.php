<?php
$message="";
if(count($_POST)>0) {
    $conn = mysqli_connect("127.0.0.1","root","","web_project");
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $login = $_POST["userName"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $sql = "INSERT INTO `admins` (`id`, `login`, `password`, `name`, `surname`, `email`) VALUES 
    (null, '".$login."', '".$password."','".$name."', '".$surname."', '".$email."');";
    $result = mysqli_query($conn,$sql);
    if(!$result) {
        $message = "Invalid Username or Password!";
    }
    else {
        $message = "You are successfully authenticated!";
    }
}
echo $message;
?>