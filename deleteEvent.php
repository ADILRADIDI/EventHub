<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'ADMIN'</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
        #imgExellent{
            width: 400px;
            height: 200px;
            border-radius: 20px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <!-- <h1>hi im here </h1> -->
    <?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "db_eventhub";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    //cheange to requette delete where id = $id;
    $stmt = $conn->prepare("DELETE FROM events where eventID = ?");

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo '
            <div id="attention">
                <img id="imgExellent" src="./picture/delete.jpg" alt="">
                <h1>Delete Event success! </h1>
                <a id="linkHero" href="admin.php">Return to Dashboard</a>
            </div>';
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    }
}
?>


</body>
</html>