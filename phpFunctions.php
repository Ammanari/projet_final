<?php
// Start the session
session_start();
// connect to database : 
$servername = "localhost"; //replace with your database host
$username = "root"; //replace with your username
$password = ""; //replace with your password
$dbname = "kidsGames"; //replace with your db name
// Create connection object: 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// generic function to execute a query
function executeQuery($sqlString)
{
    global $conn;
    $result = $conn->query($sqlString);
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }
    if (($result === true)) { // if i put == instead of ===, it will not work because the result is an object and not a boolean value.
        return;
    }
    return $result->fetch_assoc(); // get the result from the query and returns it.
    // assoc : associative array (key-value pair)
}

// get the number of lives left
function getRemainingLives()
{
    return $_SESSION['lives'];
}

function setRemainingLives($lives)
{
    $_SESSION['lives'] = $lives;
}

function decreaseRemainingLives()
{
    $_SESSION['lives']--;
}

function gameOver($result)
{
    $livesUsed = 6 - getRemainingLives();
    $registrationOrder = $_SESSION['registrationOrder'];
    executeQuery("INSERT INTO score SET scoreTime = NOW(), result='$result', livesUsed=$livesUsed, registrationOrder = $registrationOrder");
    session_destroy();
    setRemainingLives(6);
}

// get the username for display
function getUserName()
{   
    $registrationOrder = $_SESSION['registrationOrder'];
    $sql = "SELECT userName FROM player WHERE registrationOrder = $registrationOrder LIMIT 1";
    $result = executeQuery($sql);
    return $result['userName'];
}

function getScoreHistory()
{
    global $conn;
    $registrationOrder = $_SESSION['registrationOrder'];
    $sql = "SELECT result, livesUsed, scoreTime FROM score WHERE registrationOrder = $registrationOrder ORDER BY scoreTime DESC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }
    $scores = [];
    while ($row = $result->fetch_assoc()) {
        $score = [
            'result' => $row['result'],
            'livesUsed' => $row['livesUsed'],
            'scoreTime' => $row['scoreTime']
        ];
        $scores[] = $score;
    }
    return $scores;
}
