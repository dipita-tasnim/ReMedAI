<?php
session_start();
require_once('DBconnect.php');

$user_id = $_SESSION['user_id'];
// $user_id = $_GET['user_id'];

$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "information not found or you do not have permission to edit this info.";
    exit();
}


// Process form submission
if (isset($_POST['oyshi'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $BMI = $_POST['BMI'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];


    // Update profile information
    $sql = "UPDATE user SET 
                username = '$username',
                password = '$password', 
                email = '$email',  
                BMI = '$BMI', 
                height = '$height',
                gender = '$gender'
               
                WHERE user_id = '$user_id'";

    mysqli_query($conn, $sql);
    header("Location: profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #D5E8E3, #F7F3E9);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container */
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #52796F;
            margin-bottom: 20px;
        }

        /* Input Fields */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        /* Label Styling */
        label {
            display: block;
            /* Makes labels appear above the input fields */
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        /* Save Button */
        .save-button {
            background: #52796F;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            border: none;
            font-size: 14px;
            width: 100%;
        }

        .save-button:hover {
            background: #3D6355;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Your Profile</h2>
        <form method="POST">
            <label>username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required placeholder="Username">
            <label>password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required placeholder="Password">
            <label>email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required placeholder="Email">
            <label>BMI:</label>
            <input type="text" name="BMI" value="<?php echo htmlspecialchars($user['BMI']); ?>" required placeholder="BMI">
            <label>height:</label>
            <input type="text" name="height" value="<?php echo htmlspecialchars($user['height']); ?>" required placeholder="Height">
            <label>gender:</label>
            <input type="text" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>" required placeholder="Gender">
            <button type="submit" name="oyshi" class="save-button">Save</button>
        </form>
    </div>
</body>

</html>