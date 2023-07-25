
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
<body id="bodyNiveau1">
<div>
  <h2>User Connection</h2>
    <div class="form-container">
      <form id="connectionForm" method="post" action="login.php">
        <div class="form-group">
          <label for="username">Nom d'utilisateur:</label>
          <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? htmlentities($_SESSION['username']) : '' ?>" required >
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" required>
          <input type="submit" value="Se connecter" name="connect">
        </div>
      </form>

      <?php unset($_SESSION['username']); ?>
      <form id="inscription" action= "formulaireInscription.php" method= "post">
        <div class="form-group">
            <input type="submit" value="S'inscrire" name = "inscription">
          </div>
          <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">Le nom d\'utilisateur ou le mot de passe est incorrect</p>';
            }
            ?>
            <a id="changePW" href="changePassword.php">Mot de passe oublié? Modifiez-le.</a>
        </form>
    </div>
</div>

<script>
  window.onload = function () {
    changeBackgroundColor();
    startConfettiAnimation();
  };
</script>
</body>
</html>
