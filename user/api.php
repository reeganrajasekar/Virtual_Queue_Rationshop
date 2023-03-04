<?php

require("../admin/layout/db.php");


$result = $conn->query("SELECT * FROM queue WHERE status='Waiting List' LIMIT 2");
if($result->num_rows > 0){
    $data = [];
    while($row = $result->fetch_assoc()){
        array_push($data,$row["id"]);
    }
    echo(json_encode($data));
}

?>