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
                            <a class="nav-link active" aria-current="page" href="/user">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/user/products.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="return confirm('Do you want to Logout?')" aria-current="page" href="/">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <main style="width:100%;height:80%;display:flex;justify-content:center;align-items: center;">
        <section id="container" style="background-color:#f0f0f0;min-height:50%;width:40%;color:#2b74e2;display: flex;flex-direction:column;align-items: center;justify-content: center;border-radius: 10px;box-shadow: 0px 2px 6px #fff;">
            <h1 style="color:green;font-size:30px" id="data">Free Queue</h1><br>
            <h3 style="color:gray;font-size:18px">Next : <span id="next">Free Queue</span></h3>
            <br><br><br>
            <?php
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            $uid = $_SESSION["id"];
            $result = $conn->query("SELECT * FROM queue WHERE uid='$uid' AND status='Waiting List'");
            if($result->num_rows > 0){
            ?>
            <h1>Your Token No</h1>
            <?php
                while($row = $result->fetch_assoc()){
                    ?>
                    <div style="margin-top:10px;border:1px solid #2b74e2;padding:10px;font-size:30px;font-weight:900;border-radius:10px">
                        <input type="hidden" id="token" value="<?php echo($row["id"]) ?>">
                        <?php echo($row["id"]) ?>
                    </div>
                    <?php
                }
            }else{
            ?>
                <form action="/user/get.php" method="post">
                    <button style="padding:10px;border:1px solid #aaa;border-radius:10px;background:#2b74e2;color:#fff;font-size:18px">Get You Token</button>
                </form>
            <?php
            }
            ?>
        </section>
    </main>
    <script>
        data = document.getElementById("data")
        next = document.getElementById("next")
        fetch("/user/api.php")
            .then((response) => response.json())
            .then((output) => {
                if(output){
                    if(output[0]){
                        data.innerHTML = output[0]
                        token = document.getElementById("token").value
                        if(token==parseInt(output[0])+1 || token==parseInt(output[0])+2 || token==parseInt(output[0])+3 || token==parseInt(output[0])+4 || token==parseInt(output[0])+5){
                            alert("Prepare You are in near Queue!")
                        }
                    }else{
                        data.innerHTML="Free Queue"
                    }
                    if(output[1]){
                        next.innerHTML = output[1]
                    }else{
                        next.innerHTML = "Free Queue"
                    }
                }else{
                    data.innerHTML = "Free Queue"
                    next.innerHTML = "Free Queue"
                }
            });
        setInterval(() => {
            fetch("/user/api.php")
            .then((response) => response.json())
            .then((output) => {
                if(output){
                    if(output[0]){
                        data.innerHTML = output[0]
                        token = document.getElementById("token").value
                        if(token==output[0]-1){
                            alert(token)
                        }
                    }else{
                        data.innerHTML="Free Queue"
                    }
                    if(output[1]){
                        next.innerHTML = output[1]
                    }else{
                        next.innerHTML = "Free Queue"
                    }
                }else{
                    data.innerHTML = "Free Queue"
                    next.innerHTML = "Free Queue"
                }
            });
        }, 5000);
    </script>
</body>
</html>