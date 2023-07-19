<?php
$field = $_POST['field'];
$value = $_POST['value'];
$password = isset($_POST['password']) ? $_POST['password'] : ''; // Check if 'password' is set before assigning it


$error = '';

// Connect to your database
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your username
$dbpassword = ""; // Replace with your password
$dbname = "kidsGames"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate the input
switch ($field) {
    case 'firstName':
    case 'lastName':
        // First name and last name must start with a capital letter
        if (!preg_match("/^[A-Z][a-zA-Z]*$/", $value)) {
            $error = "Must start with a capital letter.";
        }
        break;
        
    case 'username':
            // Username must be at least 8 characters long and start with a capital letter
            if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $value)) {
                $error = "Must be at least 8 characters long and start with a capital letter.";
            } else {
                // Check if username is unique
                $query = "SELECT * FROM player WHERE userName='$value'"; // Use 'player' table and 'userName' column
                $result = $conn->query($query);
    
                if (!$result) {
                    die('Erreur de requête : ' . mysqli_error($conn));
                }
    
                if ($result->num_rows > 0) {
                    $error = "Username already exists.";
                }
            }
            break;
    
    case 'password':
        // Password must be at least 8 characters long
        if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $value)) {
            $error = "Must be at least 8 characters long.";
        }
        break;
        
    case 'confirmPassword':
            // Confirm password must be the same as password
            if (isset($_POST['password'])) {
                $originalPassword = $_POST['password'];
                if ($value !== $originalPassword) {
                    $error = "Password and Confirm Password do not match.";
                }
            }
            break;
}

$conn->close();

echo $error;
