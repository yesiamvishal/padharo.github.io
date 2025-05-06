<?php
// login.php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "myrestro";

// Connect to MySQL
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<div style='font-family: sans-serif; padding: 20px; color: red;'>Connection failed: " . $conn->connect_error . "</div>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM register WHERE USER_NAME = '$username' AND PASSWORD = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login success 🎉
        echo "
        <div style='
            font-family: Poppins, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #fce4ec);
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            max-width: 600px;
            margin: 80px auto;
        '>
            <h1 style='color: #2e7d32;'>✅ Login Successful!</h1>
            <p style='font-size: 18px; color: #444;'>Welcome back, <strong style='color: #00796b;'>$username</strong> 🎉</p>
            <a href='index.html' style='
                display: inline-block;
                margin-top: 20px;
                padding: 10px 25px;
                background-color: #4e342e;
                color: white;
                text-decoration: none;
                border-radius: 25px;
                font-weight: bold;
                transition: all 0.3s ease;
            ' onmouseover=\"this.style.backgroundColor='#795548'\">🏠 Go to Home</a>
        </div>
        ";
    } else {
        // Login failed ❌
        echo "
        <div style='
            font-family: Poppins, sans-serif;
            background: #fff3f3;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 80px auto;
        '>
            <h1 style='color: #c62828;'>❌ Invalid Credentials</h1>
            <p style='font-size: 18px; color: #444;'>Please check your username and password.</p>
            <a href='login.html' style='
                display: inline-block;
                margin-top: 20px;
                padding: 10px 25px;
                background-color: #c62828;
                color: white;
                text-decoration: none;
                border-radius: 25px;
                font-weight: bold;
                transition: all 0.3s ease;
            ' onmouseover=\"this.style.backgroundColor='#b71c1c'\">🔁 Try Again</a>
        </div>
        ";
    }
} else {
    echo "<div style='font-family: sans-serif; padding: 20px; color: #ff5722;'>Invalid request method.</div>";
}

$conn->close();
?>
