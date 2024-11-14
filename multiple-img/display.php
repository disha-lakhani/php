<?php
require 'db.php';

// Fetch user and post data
$sqlUser = "SELECT * FROM users ORDER BY id DESC LIMIT 1"; // Fetch the latest user for demo
$userResult = $conn->query($sqlUser);

if ($userResult->num_rows > 0) {
    $user = $userResult->fetch_assoc();
    $userId = $user['id'];

    // Fetch posts of the user
    $sqlPosts = "SELECT * FROM posts WHERE user_id = $userId";
    $postsResult = $conn->query($sqlPosts);
} else {
    echo "No user found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile and Posts</title>
    <style>
        .profile {
            text-align: center;
            margin: 20px;
        }
        .profile img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .posts {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .post {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .post img {
            max-width: 200px;
            height: auto;
        }
        .btn {
            margin: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="profile">
    <!-- Display user's profile image -->
    <h2><?php echo $user['username']; ?>'s Profile</h2>
    <img src="<?php echo $user['profile_image']; ?>" alt="Profile Image">
</div>

<h3 style="text-align: center;">Posts</h3>

<div class="posts">
    <?php if ($postsResult->num_rows > 0): ?>
        <?php while ($post = $postsResult->fetch_assoc()): ?>
            <div class="post">
                <img src="<?php echo $post['image_url']; ?>" alt="Post Image">
                <p><?php echo htmlspecialchars($post['caption']); ?></p>
                <!-- Delete Button -->
                <form action="delete_post.php" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <input type="submit" class="btn delete" value="Delete">
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<!-- New Post Button -->
<div style="text-align: center;">
    <a href="create_post.php" class="btn">Create New Post</a>
</div>

</body>
</html>
