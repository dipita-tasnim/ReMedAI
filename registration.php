<?php require_once("DBconnect.php");
session_start();
if (
    isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])
    && isset($_POST['BMI']) && isset($_POST['height']) && isset($_POST['gender']) 
    && isset($_POST['password'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $BMI = $_POST['BMI'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];

    // Check email already exists
    $sql = "SELECT * FROM user WHERE email = '$email' or username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // Display error message. Should not create acc with same name or email
        echo "<script type='text/javascript'>alert('Name or Email already exists')</script>"; 
        exit();
    }

    $sql = "INSERT INTO user (username, password, email, BMI, height, gender) 
            VALUES('$username', '$password', '$email', '$BMI', '$height', '$gender')";
                       
    $result = mysqli_query($conn, $sql);

    $user_id = mysqli_insert_id($conn); // This function fetch the auto-increment ID of the inserted row.
    
    $_SESSION['user_id'] = $user_id;

    header("Location: profile.php");
}
?>