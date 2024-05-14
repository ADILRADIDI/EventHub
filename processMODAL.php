<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    
<?php
// Include the autoloader
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "db_eventhub";
$conn = new mysqli($servername, $username, $password, $dbname);

// Checked connect
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO customers (fullName, email) VALUES (?, ?)");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("ss", $full_name, $email);
        if ($stmt->execute()) {
            echo '
            <div id="attention">
                <img src="./picture/mail.png" alt="">
                <h1>Check your email</h1>
                <a id="linkHero" href="main.php">Return to homepage</a>
            </div>';
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    }
}

if (isset($_POST['send'])) {
    $mail = new PHPMailer(TRUE);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = TRUE;
    $mail->Username = 'adilradidi212@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587;

    $mail->setFrom('adilradidi212@gmail.com', 'ADMIN');
    $mail->addAddress($_POST['email']);
    $mail->Subject = 'Test Email';
    $mail->Body = 'Hi, I am Adil. How are you?';

    if ($mail->send()) {
        echo "<script>alert('Email sent successfully');</script>";
    } else {
        echo "<script>alert('Email could not be sent. Please try again.');</script>";
    }
}
?>

</body>

</html>