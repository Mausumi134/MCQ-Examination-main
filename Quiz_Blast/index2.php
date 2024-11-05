
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quiz Platform</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            color: white;
            overflow-y: auto; 
        }

        .navbar {
            background: rgba(36, 34, 38, 0.8);
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #c850c0;
        }

        .container {
            margin-top: 20px; 
            padding: 20px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .jumbotron {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-weight: 700;
        }

        .btn-custom {
            background-color: #c850c0;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #4158d0;
        }

        .testimonial {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            margin: 10px 0; 
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
        }

        .statistics {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            flex-wrap: wrap; 
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            margin: 0 10px;
            text-align: center;
            min-width: 150px; 
        }

        .featured-quizzes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
            margin-top: 20px; 
        }

        .quiz-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            width: calc(30% - 20px); 
            transition: transform 0.3s;
        }

        .quiz-card:hover {
            transform: scale(1.05);
        }

        .quiz-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .quiz-description {
            margin: 10px 0;
        }
    </style>

</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: blue; font-weight: bold;">QUIZ Blast</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="index2.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">User Login</a></li>
                <li class="nav-item"><a class="nav-link" href="./take_quiz.php">Enter Quiz</a></li>
                <li class="nav-item"><a class="nav-link" href="./create_quiz.php">Create Quiz</a></li> 
                <li class="nav-item"><a class="nav-link" href="./about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./contact.php">Contact Us</a></li>
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <img src="assets/img/my_logo.jpg" alt="Logo" width="70" height="70">
                </ul>
            </div>
        </div>
    </div>
</nav>


    <div class="container jumbotron">
    <h1 id="quiz-title">Welcome to Quiz Game</h1>
    <p>Test your knowledge and skills with our interactive quizzes.</p>
    <a href="./take_quiz.php" class="btn btn-custom">Start Quiz</a>
</div>


    <div class="container">
        <h2>Featured Quizzes</h2>
        <div class="featured-quizzes">
            <div class="quiz-card">
                <div class="quiz-title">Mathematics Basics</div>
                <div class="quiz-description">Test your knowledge on basic mathematics concepts.</div>
                <a href="./math_quiz.php" class="btn btn-custom">Take Quiz</a>
            </div>
            <div class="quiz-card">
                <div class="quiz-title">Science Fundamentals</div>
                <div class="quiz-description">Explore fundamental science questions and concepts.</div>
                <a href="./science_quiz.php" class="btn btn-custom">Take Quiz</a>
            </div>
            <div class="quiz-card">
                <div class="quiz-title">General Knowledge</div>
                <div class="quiz-description">Challenge yourself with general knowledge questions.</div>
                <a href="./general_knowledge_quiz.php" class="btn btn-custom">Take Quiz</a>
            </div>
        </div>

        <h2>User Testimonials</h2>
        <div class="testimonial">
            <p>"MCQ Software helped me prepare for my exams in a fun way. Highly recommended!"</p>
            <small>- John Doe</small>
        </div>
        <div class="testimonial">
            <p>"The quizzes are challenging yet enjoyable. I love this platform!"</p>
            <small>- Jane Smith</small>
        </div>

        <h2>Statistics</h2>
        <div class="statistics">
            <div class="stat-card">
                <h3>100+</h3>
                <p>Quizzes Available</p>
            </div>
            <div class="stat-card">
                <h3>2000+</h3>
                <p>Registered Users</p>
            </div>
            <div class="stat-card">
                <h3>50000+</h3>
                <p>Quizzes Taken</p>
            </div>
        </div>
    </div>

    <footer class="text-center mt-4">
    <p>&copy; 2024 QuizBlast. All rights reserved.</p>
    <p>
        <a href="./about.php" class="text-white">About Us</a> | 
        <a href="./contact.php" class="text-white">Contact Us</a>
    </p>
</footer>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <script src="assets/js/main.js"></script>
    
</body>

</html>
