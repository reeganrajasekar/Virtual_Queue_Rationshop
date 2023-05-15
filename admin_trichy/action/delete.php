<?php

require("../layout/db.php");


$id = $_POST["id"];

$sql="DELETE FROM product WHERE id='$id'";
$conn->query($sql);
header("Location: /admin_trichy/product.php?msg=Product Deleted Successfully!");
die();
?>