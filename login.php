<?php

require_once "phpFunctions.php";

session_start();

if(isset($_POST['connect'])){
// Start the session



$servername = "localhost"; //replace with your database host
$username = "root"; //replace with your username
$password = ""; //replace with your password
$dbname = "kidsGames"; //replace with your db name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT authenticator.passCode, player.registrationOrder FROM player INNER JOIN authenticator ON player.registrationOrder = authenticator.registrationOrder WHERE player.userName = ? LIMIT 1";
// : define a parameter
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // bind the parameter to the variable
$stmt->execute();
$stmt->bind_result($db_password, $registrationOrder);
$stmt->fetch();

// SESSION

// check if the password matches the one in the database (hash)
if (password_verify($password, $db_password)) { // since the passwords are encrypted, use the password_verify method to verify your password.
    // Password is correct, so start a new session, then save the username to the session
    $_SESSION['registrationOrder'] = $registrationOrder;


    // start the counter
    $_SESSION['startTime'] = time();
    setRemainingLives(6);

    // Password is correct, start the game.
    header('Location: formulaireNiveau1.php');
    exit;
} else {
    // Password is incorrect, redirect back to the login form.
    $_SESSION['username'] = $username; // save the username so it can be displayed again
    header('Location: connectionLogIn.php?error=1');
    exit;
}

$stmt->close();
$conn->close();
}