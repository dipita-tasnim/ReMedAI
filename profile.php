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
    <title>Profile - ReMedAI</title>
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

        /* Top Bar */
        .top-bar {
            width: 100%;
            background: linear-gradient(135deg, #52796F, #3D6355);
            color: white;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .top-bar .logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Container */
        .container {
            width: 90%;
            max-width: 700px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 80px;
            /* Push content below fixed bar */
        }

        /* Profile Section */
        .profile-info {
            flex: 1;
            background: #FAFAFA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h1 {
            font-size: 22px;
            color: #445C6E;
            text-align: center;
            margin-bottom: 15px;
        }

        .user-info {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user-info li {
            background: white;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 500;
            color: #555;
            border: 1px solid #ddd;
            width: 100%;
        }

        .user-info li span {
            font-weight: bold;
            color: #52796F;
        }

        /* About Me Section */
        .about-me {
            flex: 1;
            background: #FAFAFA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .about-me textarea {
            width: 100%;
            height: 90px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            resize: none;
            outline: none;
            background: white;
        }

        /* Save Button */
        .save-button {
            background: #52796F;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            border: none;
            font-size: 12px;
            width: auto;
            align-self: flex-end;
            margin-top: 10px;
        }

        .save-button:hover {
            background: #3D6355;
        }

        /* Layout - Make profile and about me side by side */
        .content-wrapper {
            display: flex;
            width: 100%;
            gap: 20px;
        }

        .profile-info,
        .about-me {
            flex: 1;
        }

        /* Logout Button - At the Bottom Right */
        .logout-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .logout-button {
            background: #D9534F;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            border: none;
            font-size: 14px;
            margin-left: auto;
            margin-right: 30px;
            /* Pushes button to the right */
        }

        .logout-button:hover {
            background: #C9302C;
        }

          /* Logout Button - At the Bottom Right */
          .edit-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .edit-button {
            background:rgb(93, 164, 89);
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            border: none;
            font-size: 14px;
        }

        .edit-button:hover {
            background:rgb(76, 123, 73);
        }



        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .content-wrapper {
                flex-direction: column;
            }

            .top-bar {
                display: flex;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="logo">ReMedAI</div>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <div class="content-wrapper">
            <!-- Profile Info -->
            <div class="profile-info">
                <h1>Welcome, <?php echo htmlspecialchars($user["username"]); ?></h1>
                <ul class="user-info">
                    <li><span>Email:</span> <?php echo htmlspecialchars($user["email"]); ?></li>
                    <li><span>BMI:</span> <?php echo htmlspecialchars($user["BMI"]); ?></li>
                    <li><span>Height:</span> <?php echo htmlspecialchars($user["height"]); ?></li>
                    <li><span>Gender:</span> <?php echo htmlspecialchars($user["gender"]); ?></li>
                </ul>
            </div>

            <!-- About Me Section (Right Side) -->
            <div class="about-me">
                <form method="POST">
                    <label for="about_me"><strong>Illness & Allergies:</strong></label>
                    <textarea name="about_me" id="about_me"><?php echo htmlspecialchars($user['about_me'] ?? ''); ?></textarea>
                    <button type="submit" class="save-button">Save</button>
                </form>
            </div>
        </div>

        <!-- edit Button (Bottom Right) -->
        <div class="edit-container">
            <a href="edit.php" class="edit-button">edit</a>
        </div>
    </div>
</body>

</html>