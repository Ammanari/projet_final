<?php
require_once 'session_handler.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Member's Area</title>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js"></script>
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
            <h1>Welcome to member's area</h1>
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
<script>
  window.onload = function() {

startConfettiAnimation();
};
</script>
</html>

