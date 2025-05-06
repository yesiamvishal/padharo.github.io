<?php
$host = "localhost";
$dbname = "myrestro";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_name = $_POST['username'];
$item_name = $_POST['itemName'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO add_to_cart2 (USER_NAME, ITEM_NAME, QUANTITY) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $user_name, $item_name, $quantity);

if ($stmt->execute()) {
    echo "
    <div style='
        background: linear-gradient(135deg, #d0f8ce, #a5d6a7);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: \"Segoe UI\", sans-serif;
    '>
        <div style='
            background-color: white;
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease;
        '>
            <div style='font-size: 60px;'>🛒✅</div>
            <h1 style='color: #2e7d32;'>Item Added to Cart!</h1>
            <p style='font-size: 18px; color: #555;'>Hey <strong>$user_name</strong>, you've added <strong>$quantity</strong> x <strong>$item_name</strong> to your cart.</p>
            <a href='addtocart.html' style='
                margin-top: 25px;
                display: inline-block;
                padding: 12px 25px;
                background-color: #4caf50;
                color: white;
                font-weight: bold;
                text-decoration: none;
                border-radius: 8px;
                transition: background 0.3s ease;
            ' onmouseover='this.style.backgroundColor=\"#388e3c\"' onmouseout='this.style.backgroundColor=\"#4caf50\"'>
                ➕ Add More
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
        background: linear-gradient(135deg, #ffebee, #ef9a9a);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: \"Segoe UI\", sans-serif;
    '>
        <div style='
            background-color: white;
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: shake 0.4s ease;
        '>
            <div style='font-size: 60px;'>❌</div>
            <h1 style='color: #c62828;'>Error Adding to Cart</h1>
            <p style='font-size: 18px; color: #555;'>Sorry, something went wrong:</p>
            <code style='color: #b71c1c; background: #ffeaea; padding: 5px 10px; border-radius: 5px;'>" . $stmt->error . "</code>
            <br><br>
            <a href='addtocart.html' style='
                display: inline-block;
                padding: 12px 25px;
                background-color: #e53935;
                color: white;
                font-weight: bold;
                text-decoration: none;
                border-radius: 8px;
                transition: background 0.3s ease;
            ' onmouseover='this.style.backgroundColor=\"#b71c1c\"' onmouseout='this.style.backgroundColor=\"#e53935\"'>
                🔁 Try Again
            </a>
        </div>
    </div>
    <style>
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
    ";
}

$stmt->close();
$conn->close();
?>
