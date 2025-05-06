<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "myrestro";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO register (USER_NAME, EMAIL, PASSWORD) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $pass);

if ($stmt->execute()) {
    echo "
    <div style='
        background: radial-gradient(circle at top left, #b2ff59, #69f0ae);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;
    '>
        <div style='
            background-color: white;
            padding: 50px 60px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            animation: dropIn 0.8s ease;
        '>
            <div style='font-size: 60px; color: #43a047;'>🎉</div>
            <h1 style='margin: 15px 0; color: #2e7d32;'>Welcome, <span style=\"color: #00c853;\">$user</span>!</h1>
            <p style='font-size: 18px; color: #555;'>Your account has been <strong>registered successfully</strong> using <strong>$email</strong>.</p>
            <a href='login.html' style='
                display: inline-block;
                margin-top: 25px;
                padding: 12px 30px;
                background-color: #00c853;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
                transition: background 0.3s ease;
            ' onmouseover='this.style.backgroundColor=\"#009624\"' onmouseout='this.style.backgroundColor=\"#00c853\"'>
                Login Now
            </a>
        </div>
    </div>

    <style>
    @keyframes dropIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    </style>
    ";
} else {
    echo "
    <div style='
        background: radial-gradient(circle at bottom right, #ff8a80, #ff5252);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;
    '>
        <div style='
            background-color: white;
            padding: 50px 60px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            animation: dropIn 0.8s ease;
        '>
            <div style='font-size: 60px; color: #d32f2f;'>❌</div>
            <h1 style='margin: 15px 0; color: #b71c1c;'>Registration Failed</h1>
            <p style='font-size: 18px; color: #555;'>Something went wrong. Please try again.</p>
            <code style='color: #c62828; display: block; margin: 10px 0;'>".$stmt->error."</code>
            <a href='register.html' style='
                display: inline-block;
                margin-top: 25px;
                padding: 12px 30px;
                background-color: #d32f2f;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: bold;
                transition: background 0.3s ease;
            ' onmouseover='this.style.backgroundColor=\"#8e0000\"' onmouseout='this.style.backgroundColor=\"#d32f2f\"'>
                Try Again
            </a>
        </div>
    </div>

    <style>
    @keyframes dropIn {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    </style>
    ";
}

$stmt->close();
$conn->close();
?>
