<?php

require("../layout/db.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$center = $_SESSION["center"];
$name = $_POST["name"];
$rate = $_POST["rate"];
$stock= $_POST["stock"];

$sql="INSERT INTO product(name,rate,stock,center) VALUE('$name','$rate','$stock','$center')";
$conn->query($sql);
header("Location: /admin/product.php?msg=Product added Successfully!");
die();
?>