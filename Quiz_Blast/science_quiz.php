<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mcq"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, question, option_a, option_b, option_c, option_d, correct_answer FROM sciencequizz"; 
$result = $conn->query($sql);

$questions = [];
if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        $questions[] = [
            'question' => $row['question'],
            'options' => [
                $row['option_a'],
                $row['option_b'],
                $row['option_c'],
                $row['option_d'],
            ],
            'correct_answer' => $row['correct_answer'] 
        ];
    }
} else {
    echo "No questions found";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Quiz</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(-135deg, #00c6ff, #0072ff);
            color: white;
            overflow-y: auto; 
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .timer {
            font-size: 1.5rem;
            color: #00c6ff;
        }

        .question {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #00c6ff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #0072ff;
        }

        .option-button {
            margin: 5px 0;
            width: 100%;
        }

        #answer {
            margin-top: 15px;
            font-weight: bold;
            display: none; 
        }

        #results {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Science Quiz</h1>
        <div class="timer" id="timer">60</div>
        <div class="question" id="question"></div>
        <div id="options"></div>
        <div id="answer"></div>
        <button class="btn btn-custom" id="nextBtn" style="display: none;">Next Question</button>
        <div id="results">
            <h2>Your Results</h2>
            <p id="score"></p>
            <button class="btn btn-custom" id="restartBtn">Go to Home</button>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script>
        const questions = <?php echo json_encode($questions); ?>; 

        let currentQuestionIndex = 0;
        let score = 0; 
        let timerInterval;
        let timeLeft = 60;

        function startTimer() {
            timerInterval = setInterval(() => {
                timeLeft--;
                document.getElementById('timer').textContent = timeLeft;

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    alert("Time's up! Moving to the next question.");
                    showNextQuestion();
                }
            }, 1000);
        }

        function showQuestion() {
            clearInterval(timerInterval);
            timeLeft = 60;
            document.getElementById('timer').textContent = timeLeft;
            document.getElementById('answer').style.display = 'none'; 
            startTimer();

            const currentQuestion = questions[currentQuestionIndex];
            document.getElementById('question').textContent = currentQuestion.question;
            const optionsContainer = document.getElementById('options');
            optionsContainer.innerHTML = '';

            currentQuestion.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.textContent = option;
                button.className = 'btn btn-custom option-button';
                button.onclick = () => selectOption(index, currentQuestion); 
                optionsContainer.appendChild(button);
            });

            document.getElementById('nextBtn').style.display = 'none'; 
        }

        function selectOption(selectedIndex, currentQuestion) {
            const correctAnswer = currentQuestion.correct_answer; 
            clearInterval(timerInterval);

            document.getElementById('answer').textContent = `Correct answer: ${correctAnswer}`;
            document.getElementById('answer').style.display = 'block'; 

            if (String.fromCharCode(65 + selectedIndex) === correctAnswer) {
                score++;
            }

            document.getElementById('nextBtn').style.display = 'block'; 
        }

        function showNextQuestion() {
            currentQuestionIndex++;
            if (currentQuestionIndex < questions.length) {
                showQuestion();
            } else {
                showResults();
            }
        }

        function showResults() {
            clearInterval(timerInterval);
            document.getElementById('question').style.display = 'none';
            document.getElementById('options').style.display = 'none';
            document.getElementById('timer').style.display = 'none';
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('answer').style.display = 'none';
            document.getElementById('results').style.display = 'block';
            document.getElementById('score').textContent = `Your score is ${score} out of ${questions.length}`;
        }

        document.getElementById('nextBtn').addEventListener('click', showNextQuestion);
        document.getElementById('restartBtn').addEventListener('click', function () {
            location.href = 'index.php'; 
        });

        
        showQuestion();
    </script>
</body>

</html>
