<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "project1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
    $user_id = $_POST['user_id']; 
    $article_id = $_POST['article_id'];
    $comment_text = trim($_POST['comment_text']);

    if (!empty($comment_text)) {
        $stmt = $conn->prepare("INSERT INTO comments (user_id, article_id, comment_text) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $user_id, $article_id, $comment_text);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Comment added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p style='color: red;'>Comment cannot be empty!</p>";
    }
}

$article_id = 1; 
$result = $conn->query("SELECT * FROM comments WHERE article_id = $article_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment System</title>
</head>
<body>

<h2>Leave a Comment</h2>
<form method="post">
    <input type="hidden" name="user_id" value="1">  
    <input type="hidden" name="article_id" value="1"> 
    <textarea name="comment_text" rows="4" cols="50" required></textarea><br>
    <button type="submit" name="submit_comment">Submit Comment</button>
</form>

<h2>Comments</h2>
<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>User {$row['user_id']}:</strong> {$row['comment_text']} <br><small>Posted on {$row['created_at']}</small></p><hr>";
    }
} else {
    echo "<p>No comments yet.</p>";
}

$conn->close();
?>

</body>
</html>
