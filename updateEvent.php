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
            height: 400px;
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
    $eventID = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $city = $_POST['city'];
    $date = $_POST['date'];
    $picture = $_POST['picture'];

    $stmt = $conn->prepare("UPDATE events SET 
    title = ?, description = ?, price = ?, city = ?, date = ?, picture = ? 
    WHERE eventID = ?");
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("sssssss", $title, $description, $price, $city, 
        $date, $picture,$eventID);
        
        if ($stmt->execute()) {
            echo '
            <div id="attention">
                <img id="imgExellent" src="./picture/update.jpg" alt="">
                <h1>Update Event success!</h1>
                <a id="linkHero" href="admin.php">Return to Dashboard</a>
            </div>';
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}

?>


</body>
</html>