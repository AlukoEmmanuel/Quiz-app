<?php
// submit_score.php - Processes the answers and submits the score securely

// Include database connection
include('db_connection.php');

// Initialize variables
$answers = $_POST['answer'] ?? []; // Safeguard in case no answers are submitted
$username = "User";  // Example: Replace with the logged-in user's name
$score = 0;

// Fetch correct answers from the database
$query = "SELECT * FROM quizzes";
$result = mysqli_query($connection, $query);

// Calculate the score
while ($row = mysqli_fetch_assoc($result)) {
    $questionId = $row['id'];
    $correctOption = $row['correct_option'];

    // Check if the question has an answer and if it matches the correct one
    if (isset($answers[$questionId]) && $answers[$questionId] === $correctOption) {
        $score++;
    }
}

// Insert the score into the database securely using prepared statements
$stmt = $connection->prepare("INSERT INTO scores (user_name, score) VALUES (?, ?)");
$stmt->bind_param("si", $username, $score);
$stmt->execute();

// Display the result
echo "<div class='container'>";
echo "<div class='result-card'>";
echo "<h2 class='score-heading'>Congratulations, $username!</h2>";
echo "<p class='score-message'>Your Score: <span class='score'>$score</span></p>";
echo "<div class='stars'>";
for ($i = 0; $i < $score; $i++) {
    echo "<span class='star'>&#9733;</span>";
}
echo "</div>";
echo "<p class='encouragement'>Keep up the great work! You're amazing!</p>";
echo "<a href='index.php' class='btn'>Go Back to Home</a>";
echo "</div>";
echo "</div>";

// Close the database connection
$stmt->close();
$connection->close();
?>
