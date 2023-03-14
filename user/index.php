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
    </style>
</head>
<body>
    <main style="width:100%;height:100%;display:flex;justify-content:center;align-items: center;background-color:#2b74e2;">
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