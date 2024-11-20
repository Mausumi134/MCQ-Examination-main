<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body, html {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(-135deg, #c850c0, #4158d0);
    }

    .container {
        width: 70%;
        height: 80vh;
        display: flex;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .slider-container {
        width: 97%;
        overflow: hidden;
        position: relative;
    }

    .slider {
        display: flex;
        width: 100%;
        height: 100%;
        transition: transform 1.5s ease-in-out;
    }

    .slides {
        display: flex;
        width: 100%;
    }

    .slides img {
        width: 100%;
        flex-shrink: 0;
        height: 100%;
        object-fit: cover;
    }

    .login-form {
        width: 50%;
        padding: 40px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #0a0d0f;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0cdf61;
        color: rgb(255, 255, 255);
        transition: 1s;
    }

    .signup-link {
        margin-top: 20px;
        font-size: 14px;
        color: #666;
    }

    .signup-link a {
        color: #18b875;
        text-decoration: none;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
    .error {
            color: red;
            margin-bottom: 10px;
        }
  </style>
</head>
<body>
  <div class="container">
    <div class="slider-container">
      <div class="slider">
        <div class="slides">
          <img src="assets/img/quiz1.jpg" alt="Slide 1">
          <img src="assets/img/quiz2.jpg" alt="Slide 2">
          <img src="assets/img/quiz3.jpg" alt="Slide 3">
        </div>
      </div>
    </div>
    <div class="login-form">
        <center><img src="assets/img/my_logo.jpg" alt="" width="70" height="70"></center>
      <h2>Login</h2>
      <form action="logincheck.php" method="post">
        <div class="input-group">
          <label for="username">Username</label>
          <input class="input-box" type="text" placeholder="Username" id="uname" name="uname" required>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input class="input-box" type="password" placeholder="Password" id="pwd" name="pwd" required>
        </div>

        <button type="submit">Login</button>
        <p class="signup-link">Don't have an account? <a href="signup.php">Sign up here</a></p>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
      </form>
    </div>
  </div>
  <script>
    let currentSlide = 0;
    const slides = document.querySelector('.slider');
    const totalSlides = document.querySelectorAll('.slides img').length;

    setInterval(() => {
      currentSlide = (currentSlide + 1) % totalSlides;
      slides.style.transform = `translateX(-${currentSlide * 100}%)`;
    }, 4000);
  </script>
</body>
</html>
