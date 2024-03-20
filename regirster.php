<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricksy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputEmail = $_POST['email'];
    $inputPassword1 = $_POST['upsw1'];
    $inputPassword2 = $_POST['upsw2'];

    $stmt = $conn->prepare("INSERT INTO register (username, email, upsw1, upsw2) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $inputUsername, $inputEmail, $inputPassword1, $inputPassword2);
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Registration failed: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
