<?php
$servername = "localhost"; // Database host
$username = "root";        // Database username
$password = "";            // Database password
$dbname = "instagram_clone"; // Database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to save the uploaded image
function uploadImage($file, $uploadDir = "uploads/") {
    // Check if the file is valid
    if ($file["error"] == UPLOAD_ERR_OK) {
        $fileName = time() . "_" . basename($file["name"]);  // Time-stamped to avoid conflicts
        $targetFilePath = __DIR__ . '/' . $uploadDir . $fileName;

        // Create the upload directory if it doesn't exist
        if (!is_dir(__DIR__ . '/' . $uploadDir)) {
            mkdir(__DIR__ . '/' . $uploadDir, 0755, true);
        }

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Return relative path for DB storage
            return $uploadDir . $fileName; 
        } else {
            return false; // Return false if the file could not be uploaded
        }
    } else {
        return false; // Return false if there was an error with the file upload
    }
}


?>
