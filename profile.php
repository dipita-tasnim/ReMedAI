<?php
session_start();
require_once("DBconnect.php");

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$sql = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: User not found in database.");
}

$user = mysqli_fetch_assoc($result);

// Handle form submission to update "About Me" section
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about_me = mysqli_real_escape_string($conn, $_POST['about_me']);

    // Update database
    $update_sql = "UPDATE user SET about_me = '$about_me' WHERE user_id = '$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        $user['about_me'] = $about_me; 
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    header("Location: profile.php");
}
?>


    


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>antibiotics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 0;
        }

        header {
            position: absolute;
            top: 10px;
            left: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 120px auto;
            padding: 50px;
            background-color: #ECECEC;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .user-info {
            list-style: none;
            padding: 0;
        }

        .user-info li {
            margin: 10px 0;
            padding: 10px;
            background-color: #fafafa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .user-info li span {
            font-weight: bold;
            color: #555;
        }

        .textarea-container {
            margin-top: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
            resize: none;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .save-button,
        .logout-button {
            padding: 10px 20px;
            background-color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: 1px solid #ddd;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        

        .save-button:hover {
            background-color: #28a745;
            color: white;
        }

        .logout-button:hover {
            background-color: rgb(253, 66, 66);
            color: white;
        }

        .button-tracker {
            position: absolute;
            top: 10px;
            right: 40px;
            margin-top: 10px;
            color:#333;
            font-weight: bold;
            background-color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            cursor: pointer;
           
        }

        .button-tracker:hover {
            background-color:rgb(173, 205, 240);
        }
        
        /* .button-update {
            padding: 10px 20px;
            position: absolute;
            right: 150px;
            margin-bottom: auto;
            background-color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: 1px solid #ddd;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-update:hover {
            background-color: #28a745;
            color: white;
        } */
    </style>
</head>

<body>
    <header>ReMedAI</header>
    <div class="container">
        <h1>Welcome, <?php echo $user["username"]; ?></h1>
        <ul class="user-info">
            <li><span>Email:</span> <?php echo $user["email"]; ?></li>
            <li><span>BMI:</span> <?php echo $user["BMI"]; ?></li>
            <li><span>Height:</span> <?php echo $user["height"]; ?></li>
            <li><span>Gender:</span> <?php echo $user["gender"]; ?></li>
        </ul>

        <!-- "About Me" Section -->
        <div class="textarea-container">
            <form method="POST">
                <label for="about_me"><strong>About Me:</strong></label>
                <textarea name="about_me" id="about_me"><?php echo $user['about_me'] ?? ''; ?></textarea>
                <button type="submit" class="save-button">Save</button>
            </form>
        </div>

        <div class="button-container">
            <a href="user_login.php" class="logout-button">Logout</a>
        </div>
        <div class="button-tracker">
            <a href="tracker_page.php" class="button-tracker">Antibiotic Tracker</a>
        </div>
        <!-- <div class="button-update">
            <a href="profile.php" class="button-update">update profile</a>
        </div> -->

    </div>
</body>

</html>