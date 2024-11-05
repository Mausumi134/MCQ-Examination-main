<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Quiz Platform</title>
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

        .navbar-brand, .nav-link {
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = new mysqli('localhost', 'root', '', 'mcq');

    if ($conn->connect_error) {
        http_response_code(500);
        echo "Database connection failed";
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
        echo "Error in submission";
    }

    $stmt->close();
    $conn->close();
}
?>

<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: blue; font-weight: bold;">QUIZ Blast</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <img src="assets/img/my_logo.jpg" alt="Logo" width="70" height="70">
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Contact Us</h1>
    <form id="contactForm">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-custom">Send Message</button>
    </form>

    <div id="alertPlaceholder" class="mt-3"></div>
</div>

<footer class="text-center mt-4">
    <p>&copy; 2024 QuizBlast. All rights reserved.</p>
    <p><a href="./about.php" class="text-white">About Us</a> | <a href="./contact.php" class="text-white">Contact Us</a></p>
</footer>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#contactForm').submit(function(e) {
            e.preventDefault(); 

            $.ajax({
                type: 'POST',
                url: 'contact.php',
                data: $(this).serialize(),
                success: function(response) {
                    $('#alertPlaceholder').html(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Your message has been sent successfully!' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                    $('#contactForm')[0].reset(); 
                },
                error: function() {
                    $('#alertPlaceholder').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'There was an error submitting your message. Please try again.' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>'
                    );
                }
            });
        });
    });
</script>

</body>

</html>
