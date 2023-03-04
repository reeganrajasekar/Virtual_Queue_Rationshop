<?php

require("../admin/layout/db.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$uid = $_SESSION["id"];

$sql="INSERT INTO queue(uid,status) VALUE('$uid','Waiting List')";
$conn->query($sql);
header("Location: /user");
die();
?>