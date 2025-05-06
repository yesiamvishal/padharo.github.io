<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "myrestro";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cardName = $_POST['cardName'];
$cardNumber = $_POST['cardNumber'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];

$sql = "INSERT INTO payment (CARDHOLDER_NAME, CARD_NUMBER, EXPIRY_DATE, CVV) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $cardName, $cardNumber, $expiry, $cvv);

if ($stmt->execute()) {
    echo "
    <html>
    <head>
        <title>Payment Success</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #d4fc79, #96e6a1);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .card {
                background: white;
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: fadeIn 1s ease-in-out;
            }
            .emoji {
                font-size: 50px;
                margin-bottom: 20px;
            }
            h2 {
                margin-bottom: 10px;
                color: #2e7d32;
            }
            p {
                font-size: 18px;
                color: #555;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 25px;
                background-color: #4caf50;
                color: white;
                text-decoration: none;
                border-radius: 10px;
                transition: background-color 0.3s ease;
            }
            a:hover {
                background-color: #388e3c;
            }
            @keyframes fadeIn {
                from {opacity: 0; transform: scale(0.9);}
                to {opacity: 1; transform: scale(1);}
            }
        </style>
    </head>
    <body>
        <div class='card'>
            <div class='emoji'>✅</div>
            <h2>Payment Successful!</h2>
            <p>Thank you, <strong>$cardName</strong>, your transaction is complete. 💳</p>
            <p>We've got your order — it's being processed! 🍽️</p>
            <a href='index.html'>Back to Home</a>
        </div>
    </body>
    </html>";
} else {
    echo "
    <html>
    <head>
        <title>Payment Failed</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #f6d365, #fda085);
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .card {
                background: white;
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
                text-align: center;
                animation: shake 0.3s ease-in-out infinite;
            }
            .emoji {
                font-size: 50px;
                margin-bottom: 20px;
            }
            h2 {
                margin-bottom: 10px;
                color: #d32f2f;
            }
            p {
                font-size: 18px;
                color: #555;
            }
            a {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 25px;
                background-color: #e53935;
                color: white;
                text-decoration: none;
                border-radius: 10px;
                transition: background-color 0.3s ease;
            }
            a:hover {
                background-color: #c62828;
            }
            code {
                background: #ffe5e5;
                padding: 5px 10px;
                display: block;
                margin-top: 10px;
                color: #b71c1c;
                border-radius: 5px;
            }
            @keyframes shake {
                0% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                50% { transform: translateX(5px); }
                75% { transform: translateX(-5px); }
                100% { transform: translateX(0); }
            }
        </style>
    </head>
    <body>
        <div class='card'>
            <div class='emoji'>❌</div>
            <h2>Payment Failed</h2>
            <p>Oops! Something went wrong. Please try again.</p>
            <code>" . $stmt->error . "</code>
            <a href='payment.html'>Retry Payment</a>
        </div>
    </body>
    </html>";
}

$stmt->close();
$conn->close();
?>
