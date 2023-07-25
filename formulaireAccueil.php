<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Page d'accueil</title>
    <style>
        @keyframes confetti-rise {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-100vh);
            }
        }
    </style>
</head>

<body id="bodyNiveau1">
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="./formulaireAccueil.php">Game</a></li>
            <li><a href="./highscores.php">My Scores</a></li>
            <li><form action="./logout.php" method="post">
            <button type="submit" name="logout-submit">Logout</button></form></li>
        </ul>
    </nav>
</header>

    <h1>Prêt à jouer ?</h1>
    <a class="btn" href="formulaireNiveau1.php">Commencer</a>
    <div class="rules">
        <h2>Règles du jeu</h2>
        <p>Vous devez répondre aux questions le plus rapidement possible!
            Ce jeu a été fait dans le cadre du Projet final. Les étudiants ayant
            travaillé sur ce jeu sont Alexandre Dawood, Alex Gelfant, Martin Aubry et Philippe.
        </p>
    </div>
</body>
</html>