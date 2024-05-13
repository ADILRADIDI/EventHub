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
// method auto increment sql.
// CREATE TABLE customers (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     full_name VARCHAR(255),
//     email VARCHAR(255)
// );

    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "db_eventhub";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // if failed connect print this .
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        echo '
        <div id="attention">
            <img src="./picture/mail.png" alt="">
            <h1>check your email</h1>
            <a id="linkHero" href="main.php">return page home</a>
        </div>
        ';
    }
    $stmt = $conn->prepare("INSERT INTO customers (full_name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $full_name, $email);
    if ($stmt->execute()) {
        // echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    ?>

</body>

</html>