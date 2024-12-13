<?php
session_start();

if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = rand(1, 10);
    $_SESSION['guess_attempts'] = 0;
}

$feedback_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['player_guess'])) {
        $player_guess = (int)$_POST['player_guess'];
        $_SESSION['guess_attempts']++;

        if ($player_guess < $_SESSION['target_number']) {
            $feedback_message = "Your guess is too low! Try again.";
        } elseif ($player_guess > $_SESSION['target_number']) {
            $feedback_message = "Your guess is too high! Try again.";
        } else {
            $feedback_message = "Congratulations! You guessed the number in {$_SESSION['guess_attempts']} attempts!";
            $_SESSION['guess_attempts'] = 0;
        }
    } 
    elseif (isset($_POST['reset_game'])) {
        session_destroy();
        session_start();
        $_SESSION['target_number'] = rand(1, 10);
        $_SESSION['guess_attempts'] = 0;
        $feedback_message = "Game has been reset. Start guessing!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing Game</title>
</head>
<body>
    <h1>Number Guessing Game</h1>
    <h2>Try to guess the hidden number</h2>
    <p>Hint: the number is only between 1 and 10!</p>

    <?php if ($feedback_message) : ?>
        <p><strong><?php echo htmlspecialchars($feedback_message); ?></strong></p>
    <?php endif; ?>

    <form method="post">
        <label for="player_guess"><strong>Enter your guess:</strong></label>
        <input type="number" id="player_guess" name="player_guess" min="1" max="10" required>
        <button type="submit">Submit Guess</button>
    </form>
    <form method="post" style="margin-top: 20px;">
        <button type="submit" name="reset_game">Reset Game</button>
    </form>
</body>
</html>
