<?php require("../admin/layout/db.php"); ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Home</title>
    <meta http-equiv="refresh" content="20">
    <style>
        *{margin:0;padding:0;}
        html,body{width:100%;height:100%}
        a.active {
        color: #2b74e2 !important;
        font-weight: 700;
        text-shadow: 1px 1px 1px #aaa;
        }
    </style>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background:white;box-shadow:1px 1px 2px #aaa;">
            <div class="container">
                <a class="navbar-brand" style="font-size:22px;font-weight:900;color:#2b74e2" href="">
                    Smart Ration Shop
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/user">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/user/products.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="return confirm('Do you want to Logout?')" aria-current="page" href="/">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <main class="container mt-5">
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Rate</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $center = $_SESSION["center"];
            $result = $conn->query("SELECT * FROM product WHERE center='$center' ORDER BY id DESC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row["name"]) ?></td>
                            <td><?php echo($row["rate"]) ?></td>
                            <td><?php echo($row["stock"]) ?></td>
                        </tr>
                    <?php
                    }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="5">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    </main>
   
</body>
</html>