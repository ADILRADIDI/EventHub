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
<<<<<<< HEAD
    $eventID = $_POST['id'];
=======
<<<<<<< HEAD
    $eventID = $_POST['id'];
=======
<<<<<<< HEAD
    $eventID = $_POST['id'];
=======
>>>>>>> 1d322a52aa2d56295001cfe7354b32fcfda2632e
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $city = $_POST['city'];
    $date = $_POST['date'];
    $picture = $_POST['picture'];

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
    $stmt = $conn->prepare("UPDATE events SET 
    title = ?, description = ?, price = ?, city = ?, date = ?, picture = ? 
    WHERE eventID = ?");
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
    } else {
<<<<<<< HEAD
        $stmt->bind_param("sssssss", $title, $description, $price, $city, 
        $date, $picture,$eventID);
=======
<<<<<<< HEAD
        $stmt->bind_param("sssdsss",$eventID, $title, $description, $price, $city, 
        $date, $picture);
=======
        $stmt->bind_param("sssdsss", $title, $description, $price, $city, $date, $picture, $eventID);
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
        
        if ($stmt->execute()) {
            echo '
            <div id="attention">
                <img id="imgExellent" src="./picture/update.jpg" alt="">
<<<<<<< HEAD
                <h1>Update Event success!</h1>
                <a id="linkHero" href="admin.php">Return to Dashboard</a>
=======
<<<<<<< HEAD
                <h1>Update Event success!</h1>
                <a id="linkHero" href="admin.php">Return to Dashboard</a>
                '.$city.'
=======
=======
    $stmt = $conn->prepare("UPDATE events SET title = ?, description = ?, price = ?, city = ?, date = ?, picture = ? WHERE eventID = ?");
    if (!$stmt) 
        echo "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("ssdsss", $title, $description, $price, $city, $date, $picture);
        if ($stmt->execute()) {
            echo '
            <div id="attention">
                <img id="imgExellent" src="./picture/exellent.jpg" alt="">
>>>>>>> 1d322a52aa2d56295001cfe7354b32fcfda2632e
                <h1>Update Event success!</h1>
                <a id="linkHero" href="admin.php">Return to Dashboard</a>
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
            </div>';
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
    $stmt->close();
    $conn->close();
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 1d322a52aa2d56295001cfe7354b32fcfda2632e
>>>>>>> 03a3bdc56f971ce2e890070e23d9d3b4a9bc1d0b
>>>>>>> 12892cc8e66312b74f9c74716e827a33c38bcf89
?>


</body>
</html>