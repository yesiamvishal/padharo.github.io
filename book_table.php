<?php
$host = "localhost";
$dbname = "myrestro"; // ✅ Your actual database name
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect POST data
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

// SQL query (change table name if needed)
$sql = "INSERT INTO book_table (NAME, DATE, TIME, NUMBER_OF_GUESTS) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $name, $date, $time, $guests);

// Execute and show result
if ($stmt->execute()) {
    echo "
    <div style='
        font-family: Poppins, sans-serif;
        background: linear-gradient(to right, #ffe0b2, #ffcc80);
        padding: 30px;
        margin: 50px auto;
        max-width: 500px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    '>
        <h2 style='color: #d2691e;'>🎉 Table Booked Successfully!</h2>
        <p style='font-size: 18px;'>Hi <strong>$name</strong>, your table for <strong>$guests</strong> guest(s) on <strong>$date</strong> at <strong>$time</strong> has been reserved.</p>
        <a href='booking.html' style='
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #ff9800;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        '>Book Another Table</a>
    </div>";
} else {
    echo "
    <div style='
        font-family: Poppins, sans-serif;
        background-color: #ffebee;
        color: #b71c1c;
        padding: 25px;
        margin: 50px auto;
        max-width: 500px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    '>
        <h2>❌ Booking Failed!</h2>
        <p>Something went wrong.</p>
        <code>" . $stmt->error . "</code>
        <br><br>
        <a href='booking.html' style='
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        '>Try Again</a>
    </div>";
}

$stmt->close();
$conn->close();
?>
