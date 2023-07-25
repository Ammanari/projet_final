<?php
require_once "phpFunctions.php";

$sessionTimeout = 900;


if (isset($_SESSION['lastActivity']) && time() - $_SESSION['lastActivity'] > $sessionTimeout) {
    session_unset();
    session_destroy();
    header("Location: connectionLogIn.php");
    exit;
} else {
    $_SESSION['lastActivity'] = time();
}
?>
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
                transform: translateY(-100vh);
            }

            100% {
                transform: translateY(100vh);
            }
        }
    </style>
</head>

<body id="bodyNiveau2">
<header class="game-header">
    <div class="user-info">
        Username : <span><?php echo getUserName(); ?></span>
        Vie restante : <span><?php echo getRemainingLives() ?></span>
    </div>
</header>
    <audio src="music.mp3" autoplay loop controls></audio>
    <h1 id="h1Jeux"> Niveau 5</h1>
    <p class="rules2">C'est Partis!<br />
        Niveau 5 : : identifier la première lettre et la dernière lettre d’un ensemble de 6 lettres<br />
        L'ensemble de Lettre : ADBTHEIOS
    </p>

    <form id="form1" method="post" action="traitements.php">
        <label for="inputNiveau1"> </label>
        <br />
        <input id="inputNiveau1" type="text" name="niveau5" placeholder="Ecrivez votre reponse ici" />

        <br />
        <br />
        <input class="btn" id="submitbutton1" type="submit" name="Niveau5send" value="Send" />
    </form>

    <form id="formArret" method="post" action="traitements.php">
        <input id="formArret" class="btnArret" type="submit" name="arreterJeux" value="arreterJeux" />
    </form>

</body>
<script>
    var sessionTimeout = <?php echo $sessionTimeout; ?> * 1000; // Convert seconds to milliseconds
    var timeoutRedirectURL = "connectionLogIn.php";

    var sessionTimeoutTimer = setTimeout(function() {
        window.location.href = timeoutRedirectURL;
    }, sessionTimeout);

    document.addEventListener("mousemove", resetSessionTimeout);
    document.addEventListener("keydown", resetSessionTimeout);

    window.onload = function() {

        startConfettiAnimation();
    };
</script>

</html>