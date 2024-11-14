<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_id"])) {
    $postId = $_POST["post_id"];

    // Delete post from the database
    $sql = "DELETE FROM posts WHERE id = $postId";
    
    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . $conn->error;
    }

    // Redirect back to the display page
    header("Location: display.php");
    exit();
}
?>
