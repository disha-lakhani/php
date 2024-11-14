<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_post"])) {
    $userId = $_POST["user_id"];
    $caption = $_POST["caption"];
    $images = $_FILES["images"]; // Multiple images

    $totalFiles = count($images["name"]);
    $allImagesUploaded = true;

    for ($i = 0; $i < $totalFiles; $i++) {
        $imageFile = [
            "name" => $images["name"][$i],
            "tmp_name" => $images["tmp_name"][$i],
            "error" => $images["error"][$i],
            "size" => $images["size"][$i]
        ];

        // Save each post image
        $imagePath = uploadImage($imageFile);
        if ($imagePath) {
            $sql = "INSERT INTO posts (user_id, image_url, caption) VALUES ('$userId', '$imagePath', '$caption')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $allImagesUploaded = false;
            }
        } else {
            $allImagesUploaded = false;
        }
    }

    if ($allImagesUploaded) {
        header(header: "location:display.php");
        exit();
    } else {
        echo "Some images failed to upload.";
    }
}
?>

<!-- Post Form -->
<form action="" method="POST" enctype="multipart/form-data">
    User ID: <input type="text" name="user_id" required><br>
    Caption: <input type="text" name="caption"><br>
    Post Images: <input type="file" name="images[]" multiple required><br>
    <input type="submit" name="create_post" value="Create Post">
</form>
