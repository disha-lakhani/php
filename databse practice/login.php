<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];  // No escaping, directly used
    $password = md5($_POST['password']);  // MD5 hash for comparison (not secure)

    // Fetch user from database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Set session variables
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: profile.php');
        exit();
    } else {
        echo "Invalid email or password!";
    }
}

// Close connection
mysqli_close($conn);
?>
