<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    echo "You are not logged in! <a href='login.html'>Login here</a>";
    exit();
}

// Display user info
echo "Welcome, " . $_SESSION['username'] . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
