
```markdown
# Quiz Blast

Quiz Blast is an interactive quiz platform that allows users to create quizzes, take quizzes within a set time limit, and view their results. This application is built using PHP, MySQL, and Bootstrap for a responsive user interface.

## Features

- **User Registration and Login**: Users can create accounts and log in to access the platform.
- **Create Quizzes**: Users can design multiple-choice quizzes by adding questions and possible answers.
- **Timed Quizzes**: Users can take quizzes that have a designated time limit, adding a competitive edge.
- **Results Display**: After completing a quiz, users can view their scores, correct answers, and time taken.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Development Environment**: XAMPP (for local development)

## Installation

To set up Quiz Blast on your local machine, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/yourusername/QuizBlast.git
   cd QuizBlast
   ```

2. **Set Up XAMPP**:
   - Ensure that XAMPP is installed on your machine.
   - Start the Apache and MySQL modules using the XAMPP Control Panel.

3. **Create the Database**:
   - Open your web browser and navigate to `http://localhost/phpmyadmin`.
   - Create a new database named `mcq_software`.

4. **Import Database Schema**:
   - Import the SQL file located in the `database` folder to set up the necessary tables.

5. **Configure Database Connection**:
   - Open the `config.php` file and update the database connection details:
     ```php
     $servername = "localhost";
     $username = "your_username"; // Replace with your MySQL username
     $password = "your_password"; // Replace with your MySQL password
     $dbname = "mcq_software"; // The database name
     ```

6. **Access the Application**:
   - Open your web browser and navigate to `http://localhost/QuizBlast`.

## Usage

### Creating a Quiz
- Log in to your account.
- Navigate to the "Create Quiz" page.
- Enter quiz details, including questions and answer options, and save.

### Taking a Quiz
- Go to the "Enter Quiz" section.
- Select a quiz to take and start the timer.
- Complete the quiz within the allotted time.

### Viewing Results
- After finishing the quiz, you'll be redirected to the results page where you can see your score and detailed feedback.

## Contributing

Contributions are welcome! If you would like to contribute to Quiz Blast, please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

or inquiries or feedback, please contact:

- **Name**: Mausumi ghadei
- **Email**: mausumighei@gmail.com
![Screenshot 2024-10-30 132728](https://github.com/user-attachments/assets/39e77850-376c-4c68-a122-3fbcb2d4a150)

```
