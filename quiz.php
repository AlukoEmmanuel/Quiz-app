<?php
// quiz.php - Page where quiz questions are shown
// Connect to your MySQL database here
include('db_connection.php');

$query = "SELECT * FROM quizzes";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center">Quiz</h2>
                        <form action="submit_score.php" method="post">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="mb-4">
                                    <h5><?php echo $row['question']; ?></h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="A" id="optionA<?php echo $row['id']; ?>">
                                        <label class="form-check-label" for="optionA<?php echo $row['id']; ?>"><?php echo $row['option_a']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="B" id="optionB<?php echo $row['id']; ?>">
                                        <label class="form-check-label" for="optionB<?php echo $row['id']; ?>"><?php echo $row['option_b']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="C" id="optionC<?php echo $row['id']; ?>">
                                        <label class="form-check-label" for="optionC<?php echo $row['id']; ?>"><?php echo $row['option_c']; ?></label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="D" id="optionD<?php echo $row['id']; ?>">
                                        <label class="form-check-label" for="optionD<?php echo $row['id']; ?>"><?php echo $row['option_d']; ?></label>
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-success btn-lg d-block mx-auto">Submit Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
