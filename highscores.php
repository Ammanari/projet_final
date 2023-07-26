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

</head>
<style>
    @keyframes confetti-rise {
        0% {
            transform: translateY(-100vh);
        }

        100% {
            transform: translateY(100vh);
        }
    }
</style>

<body id="bodyNiveau2">
    <header>

    </header>
    <section class="hero">
        <h1>Welcome, <?php echo getUserName(); ?></h1>
        <h2 style="color:aliceblue; font-weight: bold;">Your Scores:</h2>
        <div class="scores">
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
        </div>
        <nav>

            <form action="formulaireAccueil.php" method="post">
                <button class="btnArret" type="submit" name="Accueil">Retour a l'Accueil </button>
            </form>
        </nav>
    </section>

</body>
<script>
    function createConfetti() {
        var confetti = document.createElement("div");
        confetti.classList.add("confetti");
        confetti.style.left = Math.random() * 100 + "vw";
        confetti.style.animationDelay = Math.random() * 2 + "s";
        confetti.style.backgroundColor = getRandomColor(); // Obtenir une couleur aléatoire pour chaque confetti
        document.body.appendChild(confetti);

        setTimeout(function() {
            confetti.remove();
        }, 2000);
    }

    function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function startConfettiAnimation() {
        setInterval(createConfetti, 100);
    }

    window.onload = function() {

        startConfettiAnimation();
    };
</script>

</html>