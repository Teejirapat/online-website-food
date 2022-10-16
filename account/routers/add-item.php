<?php
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "";
$dbname = "food";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);

$username = $_POST['username'];
$password = $_POST['password'];


$name = $_POST['name'];
$price = $_POST['price'];
$category = $_POST['category'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$sql = "INSERT INTO items (name, price,category,image) VALUES ('$name', $price,'$category','$image')";
$con->query($sql);
header("location: ../admin-page.php");
?>