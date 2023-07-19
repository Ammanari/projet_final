<?php
session_start();




$mysqli = new mysqli('localhost', 'root', '', 'kidsgames');

$fname = $lname = $username = $password = $cpassword = "";

$fname_err = $lname_err = $username_err = $password_err = $cpassword_err = "";

if ($mysqli->connect_errno) {

  die('Failed to connect to MySQL: ' . $mysqli->connect_error);
} else {

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $input_fname = trim($_POST["firstName"] ?? '');

    if (empty($input_fname)) {

      $fname_err = "Please enter a name.";
    } elseif (!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Z][a-zA-Z]*$/")))) {

      $fname_err = "First name must start with a uppercase letter.";
    } else {

      $fname = $input_fname;
    }

    $input_lname = trim($_POST["lastName"] ?? '');

    if (empty($input_lname)) {

      $lname_err = "Please enter a last name.";
    } elseif (!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[A-Z][a-zA-Z]*$/")))) {

      $lname_err = "Last name must start with a uppercase letter.";
    } else {

      $lname = $input_lname;
    }


    $input_username = trim($_POST["username"] ?? '');

    if (empty($input_username)) {

      $username_err = "Please enter a username.";
    } elseif (!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]{8,}$/")))) {

      $username_err = "Username must be at least 8 characters long and must start with a uppercase letter.";
    } else {

      $username = $input_username;
    }


    $input_password = trim($_POST["password"] ?? '');

    if (empty($input_password)) {

      $password_err = "Please enter a password.";
    } elseif (!filter_var($input_password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]{8,}$/")))) {

      $password_err = "Password must be at least 8 characters long.";
    } else {

      //$password = $input_password;
      $password = password_hash($input_password, PASSWORD_DEFAULT);  // Hash the password here nouvelle ligne


    }

    $input_cpassword = trim($_POST["confirmPassword"] ?? '');

    if (empty($input_cpassword)) {

      $cpassword_err = "Please confirm the password.";
    } elseif (!filter_var($input_cpassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z0-9]{8,}$/")))) {

      $cpassword_err = "Password must be at least 8 characters long.";
    } else {

      $cpassword = $input_cpassword;
    }

    if (trim($input_password) != trim($input_cpassword) || trim($input_cpassword) != trim($input_password)) {

      $cpassword_err = "Passwords do not match.";
    }

    $sql = "SELECT userName FROM player WHERE userName = ?";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {

      mysqli_stmt_bind_param($stmt, "s", $input_username);

      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);

      if (mysqli_stmt_num_rows($stmt) > 0) {

        $username_err = "Sorry, this username is already taken.";
      }

      mysqli_stmt_close($stmt);
    } else {

      echo "Error in preparing the statement: " . mysqli_error($mysqli);
    }


    if (empty($fname_err) && empty($lname_err) && empty($username_err) && empty($password_err) && empty($cpassword_err)) {

      $sql = "INSERT INTO player (fName, lName, userName, registrationTime) VALUES (?, ?, ?, ?)";
      if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $param_fname, $param_lname, $param_username, $param_registrationTime);

        $param_fname = $fname;
        $param_lname = $lname;
        $param_username = $username;
        $param_registrationTime = date("Y-m-d H:i:s");

        if (mysqli_stmt_execute($stmt)) {
          $last_inserted_id = $mysqli->insert_id; // Get the last inserted id
          mysqli_stmt_close($stmt);

          $sql2 = "INSERT INTO authenticator (passCode, registrationOrder) VALUES (?, ?)";
          if ($stmt2 = mysqli_prepare($mysqli, $sql2)) {
            mysqli_stmt_bind_param($stmt2, "si", $password, $last_inserted_id);

            if (mysqli_stmt_execute($stmt2)) {
              $_SESSION['message'] = "Account created successfully. Please log in.";
              header("location: connectionLogIn.php");
              exit();
            } else {
              echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt2);
          }
        } else {
          echo "Something went wrong. Please try again later.";
        }
      }
    }
  }
}

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

    .form-container {
      padding-top: 50px;
      width: 300px;
      margin: 0 auto;
    }

    .form-group {

      margin-bottom: 10px;

    }

    label {

      display: block;
      font-weight: bold;
      border-radius: 5px;

    }

    input[type="text"],

    input[type="password"] {

      width: 100%;
      border-radius: 5px;
      padding: 5px;

    }

    input[type="submit"],

    input[type="button"] {

      margin-top: 10px;
    }

    .error {

      color: red;

    }
  </style>

</head>

<body>
  <audio src="music.mp3" autoplay loop></audio>
  <!DOCTYPE html>
  <html>

  <head>
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
  </head>

  <body id="bodyNiveau1">
    <h2>User Registration</h2>
    <div class="form-container">

      <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">

          <label for="firstName">First Name:</label>

          <input type="text" id="firstName" name="firstName" value="<?php echo $fname ?>">

          <span id="firstNameError" class="error"><?php echo $fname_err ?></span>

        </div>




        <div class="form-group">

          <label for="lastName">Last Name:</label>

          <input type="text" id="lastName" name="lastName" value="<?php echo $lname ?>">

          <span id="lastNameError" class="error"><?php echo $lname_err ?></span>

        </div>




        <div class="form-group">

          <label for="username">Username:</label>

          <input type="text" id="username" name="username" value="<?php echo $username ?>">

          <span id="usernameError" class="error"><?php echo $username_err ?></span>

        </div>




        <div class="form-group">

          <label for="password">Password:</label>

          <input type="password" id="password" name="password" value="<?php echo $password ?>">

          <span id="passwordError" class="error"><?php echo $password_err ?></span>

        </div>




        <div class="form-group">

          <label for="confirmPassword">Confirm Password:</label>

          <input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $cpassword ?>">

          <span id="confirmPasswordError" class="error"><?php echo $cpassword_err ?></span>

        </div>




        <div class="form-group">

          <input id="changepwd" type="submit" name="submit" value="Sign Up">
          <input id="changepwd" type="button" value="Log in" onclick="location.href='connectionLogIn.php';">
        </div>

      </form>

    </div>
  </body>
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

        xmlhttp.open("POST", "formulaireInscription2.php?rqst=" + str, true);

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
  <script src="validation.js"></script>



  </html>