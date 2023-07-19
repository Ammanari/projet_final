<?php
// Ce php permet d'afficher le message Votre compte a été créé avec succès ! après l'inscription d'un utilisateur
// Il est appelé dans le formulairInscription.php
session_start();

if (isset($_SESSION['message'])) {
  echo '<p>' . $_SESSION['message'] . '</p>';
  unset($_SESSION['message']);
}
session_destroy(); // Détruit la session car la vrai session c'est quand l'utilisateur se connecte.
// il y a session_start() dans le login.php
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Page d'accueil</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    @keyframes confetti-rise {
      0% {
        transform: translateY(100vh);
      }

      100% {
        transform: translateY(-100vh);
      }
    }

    body {
      background-color: #7ac0e1;
      overflow: hidden;
    }

    .form-container {
      width: 300px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 10px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 5px;
      border-radius: 5px;
    }

    input[type="submit"],
    input[type="button"] {
      margin-top: 10px;
      padding: 5px 10px;
      border-radius: 10px;
      background-color: #7bd18b;

    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
      background-color: #e4de6a;
      transition: 0.6s;
    }


    .error {
      color: red;
    }
  </style>
</head>

<body>
  <audio src="music.mp3" autoplay loop controls></audio>
  <!DOCTYPE html>
  <html>

  <head>
    <title>User Connection</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>

  <body>
    <h2>User Connection</h2>
    <div class="form-container">
      <form id="connectionForm" method="post" action="login.php">
        <div class="form-group">
          <label for="username">Nom d'utilisateur:</label>
          <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? htmlentities($_SESSION['username']) : '' ?>" required>
        </div>

        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" required>
          <input type="submit" value="Se connecter" name="connect">
        </div>
      </form>
      <?php unset($_SESSION['username']); ?>
      <form id="inscription" action="formulaireInscription.php" method="post">
        <div class="form-group">
          <input type="submit" value="S'inscrire" name="inscription">
        </div>
        <?php
        if (isset($_GET['error'])) {
          echo '<p class="error">Le nom d\'utilisateur ou le mot de passe est incorrect</p>';
          echo '<a id="changepwd" href="changePassword.php">Mot de passe oublié? Modifiez-le.</a>';
        }
        ?>
        <br>
      </form>
    </div>

    <script>
      function checkUser(str) {
        if (str.length == 0) {
          document.getElementById("username").innerHTML = "";
          return;
        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("username").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("POST", "formulaireInscription.php?rqst=" + str, true);
          xmlhttp.send();
        }
      }

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