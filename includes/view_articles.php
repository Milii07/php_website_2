<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . htmlspecialchars($row['id']) . "</h3>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<h4>" . htmlspecialchars($row['subtitle']) . "</h4>";
        echo "<p><em>By User ID: " . $row['user_id'] . " on " . $row['created_at'] . "</em></p>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "<hr>";
    }
} else {
    echo "No articles found.";
}

$conn->close();
?>