<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mcq";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['add_quiz'])) {
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO quiz_questions (question, option1, option2, option3, option4, answer) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer')";

    if ($conn->query($sql) === TRUE) {
        echo "New quiz question added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM quiz_questions WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Quiz question deleted successfully!";
    } else {
        echo "Error deleting question: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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

<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: blue; font-weight: bold;">QUIZ Blast</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index2.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./take_quiz.php">Enter Quiz</a></li>
                <li class="nav-item"><a class="nav-link active" href="./create_quiz.php">Create Quiz</a></li> 
            </ul>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <img src="assets/img/my_logo.jpg" alt="Logo" width="70" height="70">
                </ul>
            </div>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <h2 style="color: violet;">Create a New Quiz Question</h2>
        <form action="create_quiz.php" method="POST">
            <div class="form-group">
                <label for="question">Question:</label>
                <textarea class="form-control" id="question" name="question" required></textarea>
            </div>
            <div class="form-group">
                <label for="option1">Option 1:</label>
                <input type="text" class="form-control" id="option1" name="option1" required>
            </div>
            <div class="form-group">
                <label for="option2">Option 2:</label>
                <input type="text" class="form-control" id="option2" name="option2" required>
            </div>
            <div class="form-group">
                <label for="option3">Option 3:</label>
                <input type="text" class="form-control" id="option3" name="option3" required>
            </div>
            <div class="form-group">
                <label for="option4">Option 4:</label>
                <input type="text" class="form-control" id="option4" name="option4" required>
            </div>
            <div class="form-group">
                <label for="answer">Correct Answer:</label>
                <input type="text" class="form-control" id="answer" name="answer" required>
            </div>
            <button type="submit" name="add_quiz" class="btn btn-primary">Add Quiz</button>
        </form>

        <hr>

        <h2>All Quiz Questions</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
    <th style="color: green;">ID</th>
    <th style="color: green;">Question</th>
    <th style="color: green;">Option 1</th>
    <th style="color: green;">Option 2</th>
    <th style="color: green;">Option 3</th>
    <th style="color: green;">Option 4</th>
    <th style="color: green;">Answer</th>
    <th style="color: green;">Action</th>
</tr>


            </thead>
            <tbody>
            <?php

$sql = "SELECT * FROM quiz_questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='color: white;'>" . $row['id'] . "</td>";
        echo "<td style='color: white;'>" . $row['question'] . "</td>";
        echo "<td style='color: white;'>" . $row['option1'] . "</td>";
        echo "<td style='color: white;'>" . $row['option2'] . "</td>";
        echo "<td style='color: white;'>" . $row['option3'] . "</td>";
        echo "<td style='color: white;'>" . $row['option4'] . "</td>";
        echo "<td style='color: white;'>" . $row['answer'] . "</td>";
        echo "<td><a href='create_quiz.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' style='color: white;'>No quiz questions found.</td></tr>";
}
?>

            </tbody>
        </table>
    </div>

    <?php
   
    $conn->close();
    ?>

</body>
</html>
