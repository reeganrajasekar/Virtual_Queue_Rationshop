<?php

require("../admin/layout/db.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$center = $_SESSION["center"];

$result = $conn->query("SELECT * FROM queue WHERE status='Waiting List' AND center='$center' LIMIT 2");
if($result->num_rows > 0){
    $data = [];
    while($row = $result->fetch_assoc()){
        array_push($data,$row["id"]);
    }
    echo(json_encode($data));
}

?>