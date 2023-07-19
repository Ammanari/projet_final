<?php
if (isset($_POST['changePassword'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kidsGames";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Check if the username, first name, and last name exist
        $sql = "SELECT userName FROM player WHERE userName = ? AND fName = ? AND lName = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $firstName, $lastName);
        $stmt->execute();
        $stmt->bind_result($db_username);
        $stmt->fetch();
        $stmt->close();

        if ($db_username) {
            // If the username, first name, and last name exist
            if (strlen($newPassword) < 8) {
                // Password is less than 8 characters long
                echo "Votre nouveau mot de passe doit comporter au moins 8 caractères!";
            } else {
                if ($newPassword == $confirmPassword) {
                    // Hash the password before updating it
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the password
                    $sql = "UPDATE authenticator INNER JOIN player ON player.registrationOrder = authenticator.registrationOrder SET authenticator.passCode = ? WHERE player.userName = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $hashedPassword, $username);
                    $stmt->execute();
                    $stmt->close();

                    header('Location: connectionLogIn.php?password_updated=1');
                    exit;
                } else {
                    // Passwords do not match
                    echo "Les mots de passe ne correspondent pas!";
                }
            }
        } else {
            echo "Nom d'utilisateur, Prénom, ou Nom de famille n'existent pas!";
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Change Password</title>
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
    <audio src="music2.mp3" autoplay loop controls></audio>
    <form id="formpassword" action="changePassword.php" method="post">
        <h2>Changer le mot de passe</h2>
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" required>
        <br>
        <label for="lastName">Nom de famille</label>
        <input type="text" name="lastName" id="lastName" required>
        <br>
        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" name="new_password" id="new_password" required>
        <br>
        <label for="confirm_password">Confirmer nouveau mot de passe</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <br>
        <input id="changepwd" type="submit" value="Changer le mot de passe" name="changePassword">
        <a id="changepwd" href="connectionLogIn.php">Retour page connexion</a>
    </form>
</body>
<script>
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