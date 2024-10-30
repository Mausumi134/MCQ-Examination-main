<?php
session_start();

// Check if the score is set in the session
if (!isset($_SESSION['score'])) {
    // Redirect to the quiz page if the score is not set
    header('Location: take_quiz.php');
    exit;
}

// Store score and total questions for display
$score = $_SESSION['score'];
$total_questions = isset($_SESSION['quiz_questions']) ? count($_SESSION['quiz_questions']) : 0;

// Clear session data
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Custom styles -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            color: white;
            overflow-y: auto; /* Enable vertical scrolling */
        }

        .container {
            margin-top: 50px; /* Space from top */
            padding: 20px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        h1, h2 {
            color: #ffffff; /* Set header color */
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
            color: #ffffff; /* Text color for footer */
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Quiz Completed!</h1>
    <h2 class="text-center">Your Score: <span style="color: #c850c0;"><?php echo $score . "/" . $total_questions; ?></span></h2>
    <a href="index.php" class="btn btn-custom mt-3">Start New Quiz</a> <!-- Button to start a new quiz -->
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
