<?php

require("../admin/layout/db.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$uid = $_SESSION["id"];
$center = $_SESSION["center"];

$sql="INSERT INTO queue(uid,status,center) VALUE('$uid','Waiting List','$center')";
$conn->query($sql);
header("Location: /user");
die();
?>