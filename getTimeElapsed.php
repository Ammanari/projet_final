<?php
session_start();

function getTimeElapsed() {
    if (isset($_SESSION['startTime'])) {
        $startTime = $_SESSION['startTime'];
        $currentTime = time();
        $timeElapsed = $currentTime - $startTime;

        $hours = floor($timeElapsed / 3600);
        $minutes = floor(($timeElapsed % 3600) / 60);
        $seconds = $timeElapsed % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
    } else {
        return '';
    }
}

echo getTimeElapsed();
?>