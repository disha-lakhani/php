<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $_POST["username"];
    $profileImage = $_FILES["profile_image"];

    // Save profile image
    $profileImagePath = uploadImage($profileImage);

    if ($profileImagePath) {
        $sql = "INSERT INTO users (username, profile_image) VALUES ('$username', '$profileImagePath')";
        if ($conn->query($sql) === TRUE) {
           header("location:post.php");
           exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Profile image upload failed!";
    }
}
?>

<!-- Registration Form -->
<form action="" method="POST" enctype="multipart/form-data">
    Username: <input type="text" name="username" required><br>
    Profile Image: <input type="file" name="profile_image" required><br>
    <input type="submit" name="register" value="Register">
</form>
