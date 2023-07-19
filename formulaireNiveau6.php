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

<body id="bodyNiveau3">
    <p>
        Username : <?php echo getUserName(); ?>

        Vie restante : <?php echo getRemainingLives(); ?>
    </p>
    <audio src="music.mp3" autoplay loop></audio>
    <h1 id="h1Jeux"> Niveau 6</h1>
    <p class="rules2">C'est Partis!<br />
        Niveau 6 : : : identifier le plus petit nombre et le plus grand nombre d’un ensemble de
        6 nombres<br />
        L'ensemble de Nombre : 10001 100000001 1999 1888 19999 166666 10000001
    </p>

    <form id="form1" method="post" action="traitements.php">
        <label for="inputNiveau1"> </label>
        <br />
        <input id="inputNiveau1" type="text" name="niveau6" placeholder="Ecrivez votre reponse ici" />

        <br />
        <br />
        <input class="btn" id="submitbutton1" type="submit" name="Niveau6send" value="Send" />
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

    function resetSessionTimeout() {
        clearTimeout(sessionTimeoutTimer);
        sessionTimeoutTimer = setTimeout(function() {
            window.location.href = timeoutRedirectURL;
        }, sessionTimeout);
    }

    document.addEventListener("mousemove", resetSessionTimeout);
    document.addEventListener("keydown", resetSessionTimeout);

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