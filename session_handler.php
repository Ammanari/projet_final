<?php
session_start(); // Start the session to access session variables

function isUserLoggedIn() {
    return isset($_SESSION['registrationOrder']);
}
?>