<!DOCTYPE html>
<html>
<?php
require_once "phpFunctions.php";
setRemainingLives(6);
$sessionTimeout = 900;
?>

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

<body id="bodyNiveau1">

    <!-- <audio src="music.mp3" autoplay loop controls></audio> -->
    <p style="font-size:30px; font-weight:bold; color:aliceblue; text-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); ">
        Username : <?php echo getUserName() ?>

    </p>
    <audio src="music2.mp3" autoplay loop controls></audio>
    <h1>Prêt à jouer ?</h1>
    <a class="btn" href="formulaireNiveau1.php">Commencer</a>
    <div class="rules">
        <h2>Règles du jeu</h2>
        <p>Vous devez répondre aux questions le plus rapidement possible!
            Ce jeu a été fait dans le cadre du Projet final. Les étudiants ayant
            travaillé sur ce jeu sont Alexandre Dawood, Alex Gelfant, Martin Aubry et Philippe.
        </p>
    </div>

    <form id="formArret" method="post" action="traitements.php">
        <input id="formArret" class="btnArret" type="submit" name="deconnection" value="Se Deconnecter" />
    </form>

    <form id="formArret" method="post" action="traitements.php">
        <input id="formArret" class="btnArret" type="submit" name="scores" value="Vos Scores" />
    </form>
    <p style="font-size:30px; font-weight:bold; color:aliceblue;">

    </p>

    <script>
        function changeBackgroundColor() {
            var colors = ["#7ac0e1", "#e694e6", "#a285df"]; // Liste des couleurs de fond
            var index = 0;
            var body = document.getElementsByTagName("body")[0];

            setInterval(function() {
                body.style.backgroundColor = colors[index];
                index = (index + 1) % colors.length;
            }, 3000); // Changer la couleur toutes les 3 secondes (3000 millisecondes)
        }

        function createConfetti() {
            var confetti = document.createElement("div");
            confetti.classList.add("confetti");
            confetti.style.left = Math.random() * 100 + "vw";
            confetti.style.animationDelay = Math.random() * 1 + "s"; // Décalage aléatoire de l'animation
            confetti.style.backgroundColor = getRandomColor(); // Obtenir une couleur aléatoire pour chaque confetti
            document.body.appendChild(confetti);


            setTimeout(function() {
                confetti.remove();
            }, 2000); // Supprimer le confetti après 2 secondes (2000 millisecondes)
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
            changeBackgroundColor();
            startConfettiAnimation();
        };
    </script>


</body>

</html>