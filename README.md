# ReMedAI

ReMedAI is an AI-driven prototype built to combat antibiotic resistance (AR), a growing global health crisis. The platform helps users practice safe and responsible antibiotic use through awareness, course tracking, and intelligent health tools. It is designed with a focus on communities in Bangladesh and beyond.

## Overview

Antibiotic resistance develops when antibiotics are misused or courses are left incomplete. ReMedAI addresses this by giving users a simple way to track their antibiotic courses, monitor their health, and access guidance through an integrated AI assistant. The goal is to reduce unnecessary antibiotic consumption and encourage patients to complete their prescribed treatments.

## Demo

[Quick view](https://drive.google.com/file/d/1YWV9vy8fPGB4iMOG4vz67Yknrbew-YjL/view?usp=drive_link)

## Features

- **User Accounts:** Registration and session-based login so each user has a personal, secure space.
- **User Profile:** View and manage personal health details such as email, BMI, height, gender, and notes on illnesses and allergies.
- **Antibiotic Course Tracker:** Add an antibiotic with its duration, then mark each day as taken. A progress bar shows how much of the course is complete, encouraging users to finish their treatment.
- **BMI Calculator:** Calculate Body Mass Index using either metric (kg, cm) or imperial (lbs, inches) units, with instant categorization from underweight to obese.
- **AI Chatbot Assistant:** An integrated chatbot is available across the app to answer questions and guide users on responsible antibiotic use.
- **Informational Landing Page:** Sections covering the project's mission, vision, and intended impact to raise awareness about antibiotic resistance.

## Tech Stack

| Layer    | Technology      |
| -------- | --------------- |
| Frontend | HTML, CSS, JavaScript |
| Backend  | PHP             |
| Database | MySQL (MariaDB) |
| Chatbot  | Botpress        |

## Getting Started

### Prerequisites

- A local server environment such as XAMPP, WAMP, or MAMP (Apache, PHP, and MySQL)
- A web browser

### Installation

1. Clone the repository.

   ```bash
   git clone https://github.com/dipita-tasnim/ReMedAI.git
   ```

2. Move the project folder into your server's web root (for example, the `htdocs` directory in XAMPP).

3. Start Apache and MySQL from your server control panel.

4. Create a database named `antibiotic` using phpMyAdmin or the MySQL client.

5. Import the provided SQL files to set up the required tables.

   - `user.sql`
   - `antibiotic.sql`

6. Confirm the database credentials in `DBconnect.php` match your local setup. The defaults are:

   ```php
   $servername = 'localhost';
   $username   = 'root';
   $password   = '';
   $dbname     = 'antibiotic';
   ```

7. Open the project in your browser.

   ```text
   http://localhost/ReMedAI/index.php
   ```

## Usage

1. Open the landing page to learn about the project.
2. Register a new account, then log in.
3. Use the Antibiotic Tracker to add your prescribed antibiotics and mark each day you take a dose.
4. Use the BMI Calculator to check your health status.
5. Update your profile with any illnesses or allergies.
6. Ask the AI chatbot for guidance at any time.

## Project Structure

```text
ReMedAI/
├── index.php             Landing page
├── home.php              User dashboard
├── user_login.php        Login page
├── user_reg.php          Registration page
├── login_process.php     Login handler
├── registration.php      Registration handler
├── profile.php           User profile
├── edit.php              Profile editing
├── tracker_page.php      Antibiotic course tracker
├── bmi.html              BMI calculator
├── DBconnect.php         Database connection
├── user.sql              User table schema
├── antibiotic.sql        Tracker and user schema
└── styles*.css           Stylesheets
```

## Disclaimer

ReMedAI is a prototype created for educational and demonstration purposes. It is not a substitute for professional medical advice. Always consult a qualified healthcare provider regarding antibiotic use and treatment.
