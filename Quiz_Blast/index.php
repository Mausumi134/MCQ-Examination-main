<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md" style="color: var(--indigo);background: #242226;">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: blue; font-weight: bold;">QUIZ Blast</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="about.php" style="color:aliceblue">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php" style="color:aliceblue">Contact Us</a></li>     
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <img src="assets/img/my_logo.jpg" alt="" width="70" height="70">			
                </ul>		  
            </div>
        </div>
    </div>
</nav>

<div>
    <div class="login-container">
        <div class="login-box">
            <form class="login-form" action="logincheck.php" method="post">
                <span class="login-form-title">User Login</span>

                <div class="input-style" data-validate="Username is required">
                    <input class="input-box" type="text" placeholder="Username" id="uname" name="uname" required>
                    <span class="input-hover"></span>
                    <span class="input-symbol">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="input-style" data-validate="Password is required">
                    <input class="input-box" type="password" placeholder="Password" id="pwd" name="pwd" required>
                    <span class="input-hover"></span>
                    <span class="input-symbol">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <div class="login-container-form-btn">
                    <button class="login-form-btn">Login</button>
                </div>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
