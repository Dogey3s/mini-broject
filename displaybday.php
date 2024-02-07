<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Birthday Event Information</title>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center; /* Center align the content */
        background-color: #f2f2f2; /* Add background color */
        margin: 0; /* Remove default margin */
        padding: 0; /* Remove default padding */
    }
    form {
        margin: 50px auto; /* Center align the form */
        max-width: 500px; /* Set maximum width for the form */
        background-color: #fff; /* Add background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow */
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .event-info {
        margin: 50px auto; /* Center align the displayed user information */
        max-width: 600px; /* Set maximum width for the displayed user information */
        background-color: #fff; /* Add background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow */
    }
    .event-info h2 {
        margin-top: 0;
    }
    .event-info p {
        margin: 10px 0;
    }
</style>
</head>
<body>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID from the form
    $user_id = $_POST['user_id'];

    // Perform SQL query
    $sql = "SELECT * FROM birthday_events WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();
        $username = $row['name'];
        $event_date = $row['event_date'];
        $event_location = $row['event_location'];
        $cake = $row['cake'];
        $num_guests = $row['num_guests'];
        $food_type = $row['food_type'];
        $dress_type = $row['dress_type'];
        $flower_decoration = $row['flower_decoration'];
        $photovideo = $row['photo_video'];
        $comment = $row['comment'];

        // Display the data
        echo "<div class='event-info'>";
        echo "<h2>User Information</h2>";
        echo "<p><strong>User ID:</strong> $user_id</p>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Event Date:</strong> $event_date</p>";
        echo "<p><strong>Event Location:</strong> $event_location</p>";
        echo "<p><strong>Cake Type:</strong> $cake</p>";
        echo "<p><strong>Num of guests:</strong> $num_guests</p>";
        echo "<p><strong>Food Type:</strong> $food_type</p>";
        echo "<p><strong>Dress Type:</strong> $dress_type</p>";
        echo "<p><strong>Flower Decoration:</strong> $flower_decoration</p>";
        echo "<p><strong>Photo and Videography Type:</strong> $photovideo</p>";
        echo "<p><strong>Additional Comment:</strong> $comment</p>";
        echo "</div>";
    } else {
        echo "User not found";
    }
}

// Close the database connection
$conn->close();
?>

<!-- HTML form to get user ID -->
<form method="post" action="">
    <label for="user_id">Enter User ID:</label>
    <input type="text" id="user_id" name="user_id" required>
    <input type="submit" value="Submit">
</form>

</body>
</html>
