<?php
session_start();
require_once("DBconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReMedAI - Home</title>
    <link rel="stylesheet" href="styles4.css">
    <script defer src="script.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo">ReMedAI</div>
            <ul class="nav-links">
                <li><a href="tracker_page.php">Antibiotic Tracker</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="bmi.html">BMI Calculator</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Welcome to ReMedAI</h1>
        <p>Manage your health with intelligent tools and insights.</p>
    </section>

    <section class="features">
        <div class="feature-card">
            <h2>Antibiotic Tracker</h2>
            <p>Keep track of your antibiotic courses to ensure proper usage and avoid resistance.</p>
            <a href="tracker_page.php" class="btn">Get Started</a>
        </div>

        <div class="feature-card">
            <h2>BMI Calculator</h2>
            <p>Monitor your health with our easy-to-use BMI calculator.</p>
            <a href="bmi.html" class="btn">Calculate Now</a>
        </div>

        <div class="feature-card">
            <h2>Your Profile</h2>
            <p>Access and manage your personal information and health data.</p>
            <a href="profile.php" class="btn">View Profile</a>
        </div>
    </section>
    


    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
    <script src="https://files.bpcontent.cloud/2025/02/26/16/20250226160041-1E617TBD.js"></script>
    
     
    
</body>
</html>