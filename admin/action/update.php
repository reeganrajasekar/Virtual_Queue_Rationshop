<?php
require("../layout/db.php");

$id =$_POST['id'];

$sql = "UPDATE queue SET status='Finished' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: /admin/home.php?page=1&msg=Updated Successfully !");
    die();
} else {
    header("Location: /admin/home.php?page=1&err=Something went Wrong!");
    die();
}


?>