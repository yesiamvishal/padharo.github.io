<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "myrestro";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $message = $_POST['contactMessage'];

    $stmt = $conn->prepare("INSERT INTO get_in_touch (YOUR_NAME, YOUR_EMAIL, YOUR_MESSAGE) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "
        <div style='
            background: linear-gradient(135deg, #fceabb, #f8b500);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;
        '>
            <div style='
                background-color: white;
                padding: 40px 60px;
                border-radius: 20px;
                text-align: center;
                box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                animation: fadeIn 1s ease-in-out;
            '>
                <div style='font-size: 60px; color: #4caf50;'>✅</div>
                <h1 style='margin-top: 15px; color: #333;'>Thank You, <span style=\"color: #ff9800;\">$name</span>!</h1>
                <p style='font-size: 18px; color: #555;'>We've received your message and will get back to you at <strong>$email</strong> soon.</p>
                <a href='contact.html' style='
                    margin-top: 25px;
                    display: inline-block;
                    background-color: #ff9800;
                    color: white;
                    padding: 12px 25px;
                    text-decoration: none;
                    border-radius: 8px;
                    font-weight: bold;
                    transition: background 0.3s ease;
                ' onmouseover='this.style.backgroundColor=\"#e65100\"' onmouseout='this.style.backgroundColor=\"#ff9800\"'>
                    Send Another Message
                </a>
            </div>
        </div>

        <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        </style>
        ";
    } else {
        echo "
        <div style='
            background: linear-gradient(135deg, #f44336, #e57373);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;
        '>
            <div style='
                background-color: white;
                padding: 40px 60px;
                border-radius: 20px;
                text-align: center;
                box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                animation: fadeIn 1s ease-in-out;
            '>
                <div style='font-size: 60px; color: #e53935;'>❌</div>
                <h1 style='margin-top: 15px; color: #b71c1c;'>Oops! Something Went Wrong</h1>
                <p style='font-size: 18px; color: #555;'>Please try again later or contact us directly at <strong>support@myrestro.com</strong>.</p>
                <code style='color: #d32f2f; display: block; margin: 10px 0;'>".$stmt->error."</code>
                <a href='contact.html' style='
                    margin-top: 25px;
                    display: inline-block;
                    background-color: #c62828;
                    color: white;
                    padding: 12px 25px;
                    text-decoration: none;
                    border-radius: 8px;
                    font-weight: bold;
                    transition: background 0.3s ease;
                ' onmouseover='this.style.backgroundColor=\"#8e0000\"' onmouseout='this.style.backgroundColor=\"#c62828\"'>
                    Try Again
                </a>
            </div>
        </div>
        ";
    }

    $stmt->close();
    $conn->close();
}
?>
