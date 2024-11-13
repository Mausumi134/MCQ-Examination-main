<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="mcq";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['quiz_questions'])) {
   
    $sql = "SELECT * FROM quiz_questions ORDER BY RAND() LIMIT 5"; 
    $result = $conn->query($sql);

    $questions = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }
    
   
    $_SESSION['quiz_questions'] = $questions; 
    $_SESSION['current_question_index'] = 0; 
    $_SESSION['score'] = 0; 
}


$questions = $_SESSION['quiz_questions'];
$current_question_index = $_SESSION['current_question_index'];


if ($current_question_index >= count($questions)) {
 
    $_SESSION['score'] = $_SESSION['score'];
    header('Location: result.php'); 
    exit;
}



$current_question = $questions[$current_question_index];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
       
        body {
            background-color: #f8f9fa; 
            color: #343a40;
            font-family: Arial, sans-serif; 
        }

        .container {
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1, h2 {
            color: #007bff; 
        }

        .alert {
            font-weight: bold;
        }

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

        footer {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Quiz Time!</h1>
    <h2 class="text-center">Question <?php echo $current_question_index + 1; ?></h2>
    <div class="question mt-4"><?php echo $current_question['question']; ?></div>
    
    <form method="post" class="mt-4">
        <div class="options">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="user_answer" value="<?php echo $current_question['option1']; ?>" id="option_a" required>
                <label class="form-check-label" for="option_a"><?php echo $current_question['option1']; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="user_answer" value="<?php echo $current_question['option2']; ?>" id="option_b" required>
                <label class="form-check-label" for="option_b"><?php echo $current_question['option2']; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="user_answer" value="<?php echo $current_question['option3']; ?>" id="option_c" required>
                <label class="form-check-label" for="option_c"><?php echo $current_question['option3']; ?></label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="user_answer" value="<?php echo $current_question['option4']; ?>" id="option_d" required>
                <label class="form-check-label" for="option_d"><?php echo $current_question['option4']; ?></label>
            </div>
        </div>
        <input type="hidden" name="correct_answer" value="<?php echo $current_question['answer']; ?>"> 
        <button type="submit" class="btn btn-primary mt-3">Submit Answer</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php
        
        $userAnswer = isset($_POST['user_answer']) ? $_POST['user_answer'] : ''; 
        $correctAnswer = $_POST['correct_answer']; 

        
        if ($userAnswer === $correctAnswer) {
            echo "<div class='alert alert-success mt-3'>Correct!</div>";
            $_SESSION['score']++; 
        } else {
            echo "<div class='alert alert-danger mt-3'>Wrong! The correct answer is: " . htmlspecialchars($correctAnswer) . "</div>";
        }

       
        $_SESSION['current_question_index']++;
        ?>
        <a href="take_quiz.php" class="btn btn-secondary mt-3">Next Question</a> 
    <?php endif; ?>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
