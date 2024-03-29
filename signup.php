<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/static/img/logo.png">
    <style>
        body, html {
            height:100%
        }
    </style>
</head>
<body >
    <div id="loader" style="position:fixed;width:100%;height:100%;background-color:rgba(106, 17, 203, 1);z-index: 10000;top:0px;display: none;">
        <div class="spinner-border" style="color:#fff;position:fixed;top:48%;left:49%;" role="status">
          <span class="sr-only"></span>
        </div>
    </div>

    <section class="gradient-custom h-100">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 1rem;background-color:#f5f5f5;">
                        <form onsubmit="document.getElementById('loader').style.display='block'" action="/register.php" method="POST" class="card-body p-4 text-center">
                            <h2 class="fw-bold mb-4 text-uppercase text-primary" style="font-weight:800">User Signup</h2>
                            <div class="form-floating mb-3">
                                <select name="center" class="form-control">
                                    <option value="" selected disabled>Select center</option>
                                    <option value="Thanjavur">Thanjavur</option>
                                    <option value="Trichy">Trichy</option>
                                </select>
                                <label for="floatingInput">Center</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input required type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                                <label for="floatingInput">Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required type="number" name="mob" class="form-control" id="floatingInput" placeholder="Mobile No">
                                <label for="floatingInput">Mobile No</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                                <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required type="password" name="password" class="form-control" id="floatingInput" placeholder="password">
                                <label for="floatingInput">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg px-5 mb-2" type="submit">Signup</button>
                            <hr>
                            Do you have an Account? <a href="/">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
        .gradient-custom {
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
    <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
        document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:tomato;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 5000)
    if(urlParams.get('msg')){
        document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:green;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 5000)
</script>
    
    <script src="/static/js/bootstrap.bundle.js"></script>
</body>
</html>