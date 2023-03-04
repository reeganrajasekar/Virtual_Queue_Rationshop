<?php
require("./admin/layout/db.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mob = $_POST["mob"];

$sql="INSERT INTO user(name,email,password,mobile) VALUE('$name','$email','$password','$mob')";
$conn->query($sql);

header("Location: /?msg=Signup Successfully!");
die();
?>