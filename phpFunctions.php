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
    global $conn;
    $livesUsed = 6 - getRemainingLives();
    $registrationOrder = $_SESSION['registrationOrder'];
    $stmt = $conn->prepare("INSERT INTO score (scoreTime, result, livesUsed, registrationOrder) VALUES (NOW(), ?, ?, ?)");
    $stmt->bind_param("sii", $result, $livesUsed, $registrationOrder);
    $stmt->execute();
    $stmt->close();
    session_destroy();
    setRemainingLives(6);
}

// get the username for display
function getUserName()
{   
    $registrationOrder = $_SESSION['registrationOrder'];
    $sql = "SELECT userName FROM player WHERE registrationOrder = $registrationOrder LIMIT 1";
    $result = executeQuery($sql);
    return $result ? $result['userName'] : '';
}

// time elapsed since the beginning of the game 
function getElapsedTime()
{
    return time() - $_SESSION['startTime'];
}

// stop game when time is up (15 mins) 
function isTimeUp()
{
    return getElapsedTime() > 900;
}

function insertScore($result)
{
    global $conn;
    $livesUsed = 6 - getRemainingLives();
    $registrationOrder = $_SESSION['registrationOrder'];
    
    $sql = "INSERT INTO score (scoreTime, result, livesUsed, registrationOrder) 
            VALUES (NOW(), '$result', $livesUsed, $registrationOrder)";
    
    $success = $conn->query($sql);
    if (!$success) {
        die("Error inserting score: " . $conn->error);
    }
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
