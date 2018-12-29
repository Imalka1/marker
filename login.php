<?php
session_start();
$user = $_POST["email"];
$password = $_POST["pass"];
$connection = mysqli_connect("localhost", "root", "mysql", "marker", "3306");
$login = mysqli_query($connection, "select id from user where username='$user' && password='$password'");
$id = "";
if ($login != null) {
    $id = mysqli_fetch_assoc($login)["id"];
}

if (!empty($id)) {
    $_SESSION["logSession"] = "logged";
    header("Location:map.php");
} else {
    header("Location:index.php?error=error");
}