<?php
include('db.php');  // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];  // Directly use form inputs (No escaping)
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Use MD5 hashing for the password (Not secure)

    // Check if email already exists
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists!";
    } else {
        // Insert user into the database
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Registration successful! <a href='login.html'>Login here</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>
