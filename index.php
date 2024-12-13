<?php
session_start();
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