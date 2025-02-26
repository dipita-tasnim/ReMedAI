<?php
session_start();
require_once("DBconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antibiotic Resistance</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
</head>

<body>
    <header>
        <nav>
            <div class="logo">ReMedAI</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#features">Features</a></li>

                <!-- Show User Profile if logged in, otherwise show Log In -->
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li><a href="profile.php">User Profile</a></li>
                <?php else : ?>
                    <li><a href="user_login.php">Log In</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section id="home" class="hero">
        <h1>Fighting Antibiotic Resistance with Technology</h1>
        <p>Empowering users with knowledge and smart tools</p>
        <!-- <a href="user_login.php" class="btn">Log In</a> -->
    </section>

    <section id="about" class="content-section">
        <div class="content">
            <div class="text">
                <h2>About Us</h2>
                <p>ReMedAI is a pioneering initiative dedicated to combating antibiotic resistance (AR) through
innovative AI-driven solutions. Our team is passionately committed to addressing the growing
global crisis of antibiotic resistance. By leveraging cutting-edge technology, we aim to
revolutionize healthcare practices, promote responsible antibiotic use, and improve health
outcomes for communities in Bangladesh and beyond.</p>
            </div>
            <div class="image">
                <img src="about.jpg" alt="About Us">
            </div>
        </div>
    </section>

    <section id="features" class="content-section reverse">
        <div class="content">
            <div class="text">
                <h2>Our Mission</h2>
                <p>Our mission is to reduce antibiotic resistance by empowering individuals and healthcare
providers with intelligent tools that promote safe and effective antibiotic use. Through
AI-powered systems, we strive to enhance awareness, optimize prescriptions, and ensure
adherence to treatment regimens, ultimately saving lives and alleviating the burden on
healthcare systems.</p>
            </div>
            <div class="image">
                <img src="features.png" alt="Our Features">
            </div>
        </div>
    </section>

    <section id="solutions" class="content-section">
        <div class="content">
            <div class="text">
                <h2>Our Vision</h2>
                <p>We envision a world where antibiotic resistance is no longer a threat to public health. By
integrating AI into healthcare, we aim to create a sustainable solution where patients and
doctors work together to make informed decisions, reduce unnecessary antibiotic consumption,
and improve overall health outcomes.</p>
            </div>
            <div class="image">
                <img src="solutions.png" alt="Our Solutions">
            </div>
        </div>
    </section>

    <section id="impact" class="content-section reverse">
        <div class="content">
            <div class="text">
                <h2>Our Impact</h2>
                <p>ReMedAI is set to make a significant impact by reducing the misuse and overuse of antibiotics
through AI-driven dose monitoring and decision support. We aim to increase public awareness
about antibiotic resistance and its consequences, ensuring patients complete their prescribed
antibiotic courses to minimize the risk of resistance. By providing doctors with data-driven
insights, we enable them to prescribe personalized and accurate treatments. Ultimately,
ReMedAI contributes to global efforts to combat antibiotic resistance, saving millions of lives and
reducing the strain on healthcare systems. Through these efforts, we strive to create a healthier
future for all.</p>
            </div>
            <div class="image">
                <img src="impact.png" alt="Our Impact">
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Antibiotic Resistance Project</p>
    </footer>
</body>
</html>







