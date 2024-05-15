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
<<<<<<< HEAD
    $mail->Password = 'pihi qnpa tjbv rcnr';
=======
    $mail->Password = '';
>>>>>>> 1d322a52aa2d56295001cfe7354b32fcfda2632e
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587;

    $mail->setFrom('adilradidi212@gmail.com', 'ADMIN');
    $mail->addAddress($_POST['email']);
<<<<<<< HEAD
    $mail->Subject = 'EventHub Admin';
    $mail->Body = '
    I hope this email finds you well. My name is Adil, and I am writing to you regarding the EventHub administration.
I would like to discuss the current status of the EventHub platform and explore any potential areas for improvement or optimization. As the administrator, I am committed to ensuring the smooth and efficient operation of the system, and I welcome the opportunity to collaborate with you on this endeavor.
Please let me know if you have any specific questions or concerns that you would like to address. I am available to schedule a meeting at your convenience to discuss this matter in more detail.
Thank you for your time and consideration. I look forward to hearing from you.
Best regards,
    ';
=======
    $mail->Subject = 'Test Email';
    $mail->Body = 'Hi, I am Adil. How are you?';
>>>>>>> 1d322a52aa2d56295001cfe7354b32fcfda2632e

    if ($mail->send()) {
        echo "<script>alert('Email sent successfully');</script>";
    } else {
        echo "<script>alert('Email could not be sent. Please try again.');</script>";
    }
}
?>

</body>

</html>