<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricksy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['email'];

    $stmt = $conn->prepare("SELECT upsw1 FROM register WHERE email = ?");
    $stmt->bind_param("s", $inputUsername);

    $stmt->execute();
    if ($stmt->num_rows > 0) {
        echo "<h1>Welcome! Cricksy.... Login successful..</h1>";
        echo "<h3>Stay Tuned Updated Soon....</h3>";
    } else {
        echo "Login failed. User not found.";
    }
    
    $stmt->close();
}
?>
