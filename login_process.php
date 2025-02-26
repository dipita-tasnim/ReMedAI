<?php
session_start();
require_once("DBconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];  // ✅ Store user session

        header("Location: home.php");  // ✅ Redirect to homepage
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>