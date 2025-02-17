<?php
session_start();
require_once( 'DBconnect.php' );

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['user_loggedin'] = true;
        $_SESSION['user_email'] = $email; 
        header('Location: index.php');
        exit;
    } 
    else {
        echo '<div class="alert alert-danger">error</div>';
    }
}
?>