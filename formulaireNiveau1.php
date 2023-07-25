<?php
require('./phpFunctions.php'); // access my functions

$sessionTimeout = 900;

if (isset($_SESSION['lastActivity']) && time() - $_SESSION['lastActivity'] > $sessionTimeout) {
    session_unset();
    session_destroy();
    header("Location: ./connectionLogIn.php");
    exit;
} else {
    $_SESSION['lastActivity'] = time();
}

// start the counter
$_SESSION['startTime'] = time();
setRemainingLives(6);
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

<body id="bodyNiveau1">
<header class="game-header">
    <div class="user-info">
        Username : <span><?php echo getUserName(); ?></span>
        Vie restante : <span><?php echo getRemainingLives() ?></span>
    </div>
    <!-- <div class="timer" id="timerwrap">Temps restant : <span id="timerElement"></span></div> -->
</header>

    <audio src="music2.mp3" autoplay loop controls></audio>
    <h1 id="h1Jeux"> Niveau 1</h1>
    <p class="rules2">C'est Partis!<br />
        Niveau 1 : Organisez ces 6 lettres en ordre croissant!<br />
        Reorganisez les lettres : FAEDBC
    </p>

    <form id="form1" method="post" action="traitements.php">
        <label for="inputNiveau1"> </label><br />
        <input id="inputNiveau1" type="text" name="niveau1" placeholder="Ecrivez votre reponse ici" /><br /><br />
        <input class="btn" id="submitbutton1" type="submit" name="Niveau1send" value="Send" />
    </form>

    <form id="formArret" method="post" action="traitements.php">
        <input id="formArret" class="btnArret" type="submit" name="arreterJeux" value="Arreter Jeux" />
    </form>

</body>
<script>
    var sessionTimeout = <?php echo $sessionTimeout; ?> * 1000; // Convert seconds to milliseconds
    var timeoutRedirectURL = "connectionLogIn.php";

    var sessionTimeoutTimer = setTimeout(function() {
        window.location.href = timeoutRedirectURL;
    }, sessionTimeout);


    // Add event listeners to reset the session timeout on user activity
    document.addEventListener("mousemove", resetSessionTimeout);
    document.addEventListener("keydown", resetSessionTimeout);

    updateTimeElapsed();
    setInterval(updateTimeElapsed, 1000);

    window.onload = function() {
        startConfettiAnimation();
    };
</script>

</html>