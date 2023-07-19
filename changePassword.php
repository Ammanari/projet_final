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
            if(strlen($newPassword) < 8) {
                // Password is less than 8 characters long
                echo "Votre nouveau mot de passe doit comporter au moins 8 caractères!";
            } else {
                if($newPassword == $confirmPassword) {
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
</head>

<body>
    <form action="changePassword.php" method="post">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" required>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" required>
        <label for="lastName">Nom de famille</label>
        <input type="text" name="lastName" id="lastName" required>
        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" name="new_password" id="new_password" required>
        <label for="confirm_password">Confirmer le nouveau mot de passe</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <input type="submit" value="Changer le mot de passe" name= "changePassword">
    </form>
</body>

</html>
