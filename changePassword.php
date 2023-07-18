<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kidsGames";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nom'];
    $firstName = $_POST['prenom'];
    $lastName = $_POST['nom_de_famille'];
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
        if($newPassword == $confirmPassword) {
            // update the password
            $sql = "UPDATE authenticator INNER JOIN player ON player.registrationOrder = authenticator.registrationOrder SET authenticator.passCode = ? WHERE player.userName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $newPassword, $username);
            $stmt->execute();
            $stmt->close();

            header('Location: formulaireAccueil.php?password_updated=1');
            exit;
        } else {
            // passwords do not match
            echo "Les mots de passe ne correspondent pas!";
        }
    } else {
        echo "Nom d'utilisateur, Prénom, ou Nom de famille n'existent pas!";
    }
}

$conn->close();
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
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="nom_de_famille">Nom de famille</label>
        <input type="text" name="nom_de_famille" id="nom_de_famille" required>
        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" name="new_password" id="new_password" required>
        <label for="confirm_password">Confirmer le nouveau mot de passe</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <input type="submit" value="Changer le mot de passe">
    </form>
</body>

</html>
