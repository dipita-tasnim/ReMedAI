<?php
session_start();
require_once('DBconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $BMI = $_POST['BMI'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='error'>Invalid email format</p>";
    } else {

        
        $stmt = $conn->prepare("INSERT INTO user (username, password, email, BMI, height, gender) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $password, $email, $BMI, $height, $gender);
        if ($stmt->execute()) {
            $_SESSION['email'] = $email;
            header("Location: user_login.php?registration=success"); 
            exit; 
        } else {
            echo "<p class='error'>Registration failed: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>