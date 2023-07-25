<?php
require_once 'session_handler.php';
session_start();

if (isset($_SESSION['message'])) {
  echo '<p>' . $_SESSION['message'] . '</p>';
  unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>Smart Baby Game Portal</title>
<link rel="stylesheet" href="style.css">
<link rel="script" href="script.js">
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
      </ul>
  </nav>
</header>
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
      <form id="inscription" action="formulaireInscription.php" method="post">
        <div class="form-group">
          <input type="submit" value="S'inscrire" name="inscription">
        </div>

        <?php unset($_SESSION['username']);
        if (isset($_GET['error'])) {
            echo '<p class="error">Le nom d\'utilisateur ou le mot de passe est incorrect</p>
            <a id="changePW" href="changePassword.php">Mot de passe oublié? Modifiez-le.</a>';
          }
        ?>
      </form>
    </div>
</div>
</body>
  <script>
    window.onload = function () {
      changeBackgroundColor();
      startConfettiAnimation();
    };
  </script>
</html>