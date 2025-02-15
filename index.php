<?php
// Include the database connection file
include 'db.php';

// Establish the connection
$conn = get_db_connection();

if (!$conn) {
    die("<h3>Database connection failed!</h3>");
}

// Display a welcome message
echo "<h2>Welcome to the Meetup App!</h2>";

// Fetch users from the database
$sql = "SELECT username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Registered Users:</h3><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row["username"]) . "</strong> - " . htmlspecialchars($row["email"]) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No users found.</p>";
}

// Close the database connection
$conn->close();
?>
