<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Make Baby Smart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="script" href="script.js">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    $loggedIn = true;
                    
                    if ($loggedIn) {
                        echo'<li><a href="formulaireAccueil.php">Game</a></li>
                            <li><form action="logout.php" method="post"></li>
                            <li><a href="highscores.php">My Scores</a></li>
                            <li><form action="logout.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button></form></li>
                            ';
                    } else {
                        echo '<li><form action="login.php" method="post">
                        <input type="text" name="mailuid" placeholder="E-mail">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="login-submit">Login</button></form></li>
                        <li><form action="formulaireInscription.php" method="post">
                        <button type="submit" name="signup">Create New</li>';
                    }
                    ?>
            </ul>
        </nav>
    </header>
        
    <section class="hero">
        <div id="frame">
            <div class="content">
                <div>
                    <h1>Make Baby Smart</h1>
                    <h2>My Baby Smartest</h2>
                </div>
                <div>
                    <div class="parallax">
                        <h1>Special Kid Special Parent</h1>
                        <h2>They are Special</h2>
                        <p>Who wants ipsem?</p>
                    <p></p>
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
