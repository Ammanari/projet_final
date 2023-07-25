<?php
require_once 'session_handler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Smart Baby Game Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="script" href="script.js">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php
                if (isUserLoggedIn()) {
                echo'<li><a href="./formulaireAccueil.php">Game</a></li>
                    <li><form action="./logout.php" method="post"></li>
                    <li><a href="./highscores.php">My Scores</a></li>
                    <li><form action="./logout.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button></form></li>
                    ';
                } else {
                echo '<li><a href="./connectionLogin.php">
                    <button>Login</button></a></li>
                    <li><a href="./formulaireInscription.php">
                    <button>New</button></a></li>';
                }
            ?>
        </ul>
    </nav>
</header>
        
    <section class="hero">
        <div id="frame">
            <div class="content">
                <div>
                    <h1>Games for a Smarter Baby</h1>
                    <p>Our premium games are designed to help your baby develop key literacy, numeracy and problem-solving skills, while also encouraging social development and interaction with peers.</p>
                    <h2>Improve coordination</h2>
                    <p>A lot of science shows that video games are very good for making people smart. Studies prove it works so you should sign up!</p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <p>&copy;2023 babybetter.com LLC</p>
    </footer>
</body>
</html>
