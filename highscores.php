<?php
require_once "phpFunctions.php";

if (!isset($_SESSION['registrationOrder'])) {
    exit("Sorry, there was an error connecting your Account, please contact a customer service agent.");
}

$registrationOrder = $_SESSION['registrationOrder'];

function getScoreHistory()
{
    global $conn;
    $registrationOrder = $_SESSION['registrationOrder'];
    $sql = "SELECT result, livesUsed, scoreTime FROM score WHERE registrationOrder = $registrationOrder ORDER BY scoreTime DESC";
    $result = $conn->query($sql);
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }
    $scores = [];
    while ($row = $result->fetch_assoc()) {
        $score = [
            'result' => $row['result'],
            'livesUsed' => $row['livesUsed'],
            'scoreTime' => $row['scoreTime']
        ];
        $scores[] = $score;
    }
    return $scores;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>High Scores</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="formulaireAccueil.php">Game</a></li>
                <li><a href="highscores.php">My Scores</a></li>
                <li><form action="logout.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button></form></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>Welcome, <?php echo getUserName(); ?></h1>
        <h2>Your Scores:</h2>
        <ul>
        <?php
            $scores = getScoreHistory();
            if ($scores) {
                foreach ($scores as $score) {
                    echo "<li>Score: {$score['result']} | Lives Used: {$score['livesUsed']} | Date: {$score['scoreTime']}</li>";
                }
            } else {
                echo "<li>No scores available.</li>";
            }
        ?>
        </ul>
    </section>
    <footer>
        <p>&copy;2023 babybetter.com LLC</p>
    </footer>
</body>
</html>
