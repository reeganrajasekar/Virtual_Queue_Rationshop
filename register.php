<?php
require("./admin/layout/db.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$mob = $_POST["mob"];
$center = $_POST["center"];

$sql="INSERT INTO user(name,email,password,mobile,center) VALUE('$name','$email','$password','$mob','$center')";
$conn->query($sql);

header("Location: /?msg=Signup Successfully!");
die();
?>