<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/static/img/logo.png">
    <style>
        body, html {
            height:100%
        }
        a.active {
        color: #2b74e2 !important;
        font-weight: 700;
        text-shadow: 1px 1px 1px #aaa;
        }
    </style>
</head>
<body style="background-image:url('/static/bg.jpg');background-position:center center;background-repeat:no-repeat;background-size:cover">
    <nav class="navbar navbar-expand-lg sticky-top" style="background:white;box-shadow:1px 1px 2px #aaa;">
            <div class="container">
                <a class="navbar-brand" style="font-size:22px;font-weight:900;color:#2b74e2" href="">
                    Smart Ration Shop
                </a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin">Admin-TNJ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/admin_trichy">Admin-TRICHY</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
    <div id="loader" style="position:fixed;width:100%;height:100%;background-color:rgba(106, 17, 203, 1);z-index: 10000;top:0px;display: none;">
        <div class="spinner-border" style="color:#fff;position:fixed;top:48%;left:49%;" role="status">
          <span class="sr-only"></span>
        </div>
    </div>

        <div class="container py-1 mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 1rem;">
                        <form onsubmit="document.getElementById('loader').style.display='block'" action="/admin/login.php" method="POST" class="card-body p-4 text-center">
                            <h2 class="fw-bold mb-4 text-uppercase text-primary" style="font-weight:800">Admin-TNJ Login</h2>
                            <div class="form-floating mb-3">
                                <input required type="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                                <label for="floatingInput">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input required type="password" name="password" class="form-control" id="floatingInput" placeholder="password">
                                <label for="floatingInput">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg px-5 mb-2" type="submit">Login</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
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