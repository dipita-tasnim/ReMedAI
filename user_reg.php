<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ReMedAI</title>   
</head>
   
<body> 
    <section class="login">
        <div class="login_box">
            <header>
                <h1 > ReMedAI </h1>
            </header>
            <h2 style="color:BLUE">user_register</h2>
            <?php
            if (isset($_GET['registration']) && $_GET['registration'] == 'success') {
                echo "<p style='color:green;'>Account Created successfully!</p>";
            }
            ?>
            <form class="registration_form" action="registration.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Password:</label><br>
        <input type="password" id="password" name="password"required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="email">BMI:</label><br>
        <input type="BMI" id="BMI" name="BMI" required><br>
        <label for="email">Height:</label><br>
        <input type="height" id="height" name="height" required><br>
        <label for="email">Gender:</label><br>
        <input type="gender" id="gender" name="gender" required><br>

        <button type="submit" value="submit" name='submit'> Submit</button>
        <div class="links">
            <p><a href="bmi.html">Calculate your BMI here!</a></p>
        </div>
        
    </form>
        </div>
    </section>
</body>
</html>